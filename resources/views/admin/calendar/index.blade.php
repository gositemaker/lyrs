{{-- resources/views/admin/calendar/index.blade.php --}}
@extends('layouts.admin') {{-- or layouts.app if you prefer --}}
@section('title', 'Calendar')

@section('content')
<div class="container py-4">

    <div class="d-flex align-items-center justify-content-between mb-3">
        <h3 class="mb-0">Trainer Calendar</h3>
        <div class="small text-muted">
            <span class="badge" style="background:#7BA388">Availability</span>
            <span class="badge" style="background:#6B4F4F">Booking</span>
        </div>
    </div>

    <div id="calendar"></div>
</div>

{{-- Create/Edit Availability Modal --}}
<div class="modal fade" id="availabilityModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="availabilityForm" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">Set Availability</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        @role('admin')
        <div class="mb-3">
          <label class="form-label">Trainer ID</label>
          <input type="number" name="trainer_id" class="form-control" placeholder="User ID of trainer">
        </div>
        @endrole

        <div class="mb-3">
          <label class="form-label">Start</label>
          <input type="datetime-local" name="start" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">End</label>
          <input type="datetime-local" name="end" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Capacity</label>
          <input type="number" name="capacity" class="form-control" value="1" min="1">
        </div>

        <div class="mb-3">
          <label class="form-label">Notes</label>
          <input type="text" name="notes" class="form-control" placeholder="Optional">
        </div>

        <input type="hidden" name="availability_id" value="">
      </div>
      <div class="modal-footer">
        <button type="button" id="deleteAvailability" class="btn btn-outline-danger me-auto d-none">Delete</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-dark">Save</button>
      </div>
    </form>
  </div>
</div>

@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet">
<style>
    #calendar .fc-toolbar-title { font-size: 1.25rem; }
    #calendar .fc-daygrid-event { border-radius: .5rem; padding: 2px 4px; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const modalEl = document.getElementById('availabilityModal');
    const availabilityModal = new bootstrap.Modal(modalEl);
    const form = document.getElementById('availabilityForm');
    const deleteBtn = document.getElementById('deleteAvailability');

    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 'auto',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        selectable: true,
        editable: true, // drag/resize availability
        eventOverlap: false,
        select: function(info) {
            // open modal with selected slot
            form.reset();
            form.availability_id.value = '';
            form.start.value = info.startStr.replace('Z', '');
            // default 2 hours
            const endISO = new Date(info.start);
            endISO.setHours(endISO.getHours() + 2);
            form.end.value = endISO.toISOString().slice(0,16);
            deleteBtn.classList.add('d-none');
            availabilityModal.show();
        },
        eventDrop: handleMoveResize,
        eventResize: handleMoveResize,
        eventClick: function(info) {
            const ev = info.event;
            if (ev.groupId !== 'availability') {
                // bookings are read-only
                return;
            }
            // populate modal for edit
            form.reset();
            form.availability_id.value = ev.id.replace('availability-','');
            form.start.value = ev.start.toISOString().slice(0,16);
            form.end.value = ev.end?.toISOString().slice(0,16);
            deleteBtn.classList.remove('d-none');
            availabilityModal.show();
        },
        events: {
            url: "{{ route('calendar.events') }}",
            failure: () => alert('Failed to load events')
        }
    });

    calendar.render();

    // Create / update availability
    form.addEventListener('submit', async function (e) {
        e.preventDefault();
        const id = form.availability_id.value;
        const payload = {
            start: form.start.value,
            end: form.end.value,
            capacity: form.capacity.value,
            notes: form.notes.value,
            @role('admin')
            trainer_id: form.trainer_id.value,
            @endrole
        };

        try {
            const res = await fetch(id
                ? `{{ url('/admin/calendar/availability') }}/${id}`
                : `{{ route('calendar.availability.store') }}`, {
                method: id ? 'PUT' : 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(payload)
            });

            const data = await res.json();
            if (!res.ok) throw new Error(data.message || 'Failed');

            availabilityModal.hide();
            calendar.refetchEvents();
        } catch (err) {
            alert(err.message);
        }
    });

    // Delete availability
    deleteBtn.addEventListener('click', async function () {
        const id = form.availability_id.value;
        if (!id) return;
        if (!confirm('Delete this availability?')) return;

        try {
            const res = await fetch(`{{ url('/admin/calendar/availability') }}/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json'
                }
            });
            const data = await res.json();
            if (!res.ok) throw new Error(data.message || 'Failed');

            availabilityModal.hide();
            calendar.refetchEvents();
        } catch (err) {
            alert(err.message);
        }
    });

    async function handleMoveResize(info) {
        // Only allow moving availability blocks
        if (info.event.groupId !== 'availability') {
            info.revert();
            return;
        }
        const id = info.event.id.replace('availability-','');
        try {
            const res = await fetch(`{{ url('/admin/calendar/availability') }}/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    start: info.event.start.toISOString(),
                    end: info.event.end?.toISOString(),
                })
            });
            const data = await res.json();
            if (!res.ok) throw new Error(data.message || 'Failed');
        } catch (err) {
            alert(err.message);
            info.revert();
        }
    }
});
</script>
@endpush
@extends('layouts.admin')
@section('content')
<div class="container py-4">
    <h3>Trainer Availability Calendar</h3>

    {{-- Trainer Filter --}}
    <div class="mb-3">
        <label for="trainer_id" class="form-label">Select Trainer</label>
        <select id="trainer_id" class="form-select">
            <option value="">-- All Trainers --</option>
            @foreach($trainers as $trainer)
                <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
            @endforeach
        </select>
    </div>

    <div id="calendar"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var trainerSelect = document.getElementById('trainer_id');

    function loadCalendar(trainerId = '') {
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            events: {
                url: "{{ route('admin.availability.calendar') }}",
                extraParams: function() {
                    return { trainer_id: trainerSelect.value };
                }
            }
        });
        calendar.render();
    }

    // Load initial calendar
    loadCalendar();

    // Reload calendar when trainer changes
    trainerSelect.addEventListener('change', function() {
        calendarEl.innerHTML = ''; // clear old calendar
        loadCalendar(this.value);
    });
});
</script>
@endsection

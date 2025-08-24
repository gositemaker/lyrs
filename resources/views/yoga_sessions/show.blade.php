
{{-- resources/views/sessions/show.blade.php --}}
@extends('layouts.app')

@section('title', $session->name)
@section('content')
<div class="container py-4">
  <div class="row g-4">
    <div class="col-md-6">
      @if($session->image)
        <img src="{{ asset($session->image) }}" class="img-fluid rounded-4" alt="{{ $session->name }}">
      @endif
    </div>
    <div class="col-md-6">
      <h2 class="mb-1">{{ $session->name }}</h2>
      <p class="text-muted mb-2">by {{ $trainer->name }} • Duration: {{ $session->duration }}</p>
      <p class="mb-3">{{ $session->description }}</p>
      <div class="h5 mb-4">Price: ₹{{ number_format($session->price,2) }}</div>

      <div class="border rounded-3 p-3 bg-white">
        <label class="form-label">Choose a date</label>
        <input type="date" id="booking-date" class="form-control" min="{{ now()->toDateString() }}">

        <div id="slots-wrap" class="mt-3">
          <div class="text-muted">Pick a date to see slots.</div>
        </div>
      </div>

      <form id="book-form" method="POST" action="{{ route('sessions.book', $session) }}" class="d-none mt-3">
        @csrf
        <input type="hidden" name="date" id="book-date">
        <input type="hidden" name="start_time" id="book-start">
        <input type="hidden" name="end_time" id="book-end">

        @guest
          <div class="alert alert-info mt-3">Please login to continue booking.</div>
        @endguest

        <button class="btn btn-dark rounded-pill px-4 mt-2" @guest disabled @endguest>
          Book & Pay (₹{{ number_format($session->price,2) }})
        </button>
      </form>
    </div>
  </div>
</div>

<script>
(function(){
  const dateInput = document.getElementById('booking-date');
  const wrap = document.getElementById('slots-wrap');
  const form = document.getElementById('book-form');

  function renderSlots(slots, date) {
    if (!slots.length) {
      wrap.innerHTML = '<div class="text-danger">No slots available for this date.</div>';
      form.classList.add('d-none');
      return;
    }
    let html = '<div class="d-flex flex-wrap gap-2">';
    slots.forEach(s => {
      html += `<button type="button" class="btn btn-outline-dark rounded-pill slot-btn"
                 data-start="${s.start}" data-end="${s.end}" data-date="${date}">
                 ${s.label}
               </button>`;
    });
    html += '</div>';
    wrap.innerHTML = html;

    document.querySelectorAll('.slot-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.getElementById('book-date').value = btn.dataset.date;
        document.getElementById('book-start').value = btn.dataset.start;
        document.getElementById('book-end').value = btn.dataset.end;
        form.classList.remove('d-none');
      });
    });
  }

  dateInput.addEventListener('change', async () => {
    wrap.innerHTML = 'Loading slots...';
    form.classList.add('d-none');
    const date = dateInput.value;
    if (!date) return;

    const res = await fetch(`{{ route('sessions.slots', $session) }}?date=${date}`);
    const json = await res.json();
    renderSlots(json.slots || [], date);
  });
})();
</script>
@endsection

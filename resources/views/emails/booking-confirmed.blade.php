{{-- resources/views/emails/booking-confirmed.blade.php --}}
<p>Hi {{ $booking->user->name }},</p>
<p>Your booking is confirmed.</p>
<ul>
  <li>Session: {{ $booking->session->name }}</li>
  <li>Trainer: {{ $booking->trainer->name }}</li>
  <li>Date: {{ $booking->date->format('M d, Y') }}</li>
  <li>Time: {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}</li>
  <li>Amount: ₹{{ number_format($booking->amount, 2) }}</li>
</ul>
<p>See you soon!</p>

@extends('layouts.app')

@section('content')
<div class="container py-5">

    @foreach($trainers as $index => $trainer)
        @php
            // Background images
            // Background swirl images
            $bgImage = $index % 2 === 0 
                ? asset('images/bg-swirls-dark.png') 
                : asset('images/bg-swirls-light.png') ;

            // Background color classes
            $bgColor = $index % 2 === 0 ? 'bg-light-custom' : 'bg-dark-custom';

            // Button style
            $btnClass = $index % 2 === 0 ? 'btn-green' : 'btn-brown';
        @endphp

        <div class="trainer-block row align-items-center rounded-4 shadow-sm p-4 mb-5"
             style="background: url('{{ $bgImage }}') no-repeat center center / cover;">
             
            {{-- Left side - Text --}}
            <div class="col-md-7 mb-4 mb-md-0">
                <h3 class=" custom-course-heading mb-3">
                Signature Sessions by {{ $trainer->name }}
                </h3>
                <p class="fw-semibold fst-italic text-dark mb-3">Awaken. Heal. Empower. Teach.</p>
                <p class="text-dark mb-4">
                    {{ $trainer->bio ?? 'Step into a journey of soul growth with curated courses in Tarot, Inner Healing, Divine Feminine Activation, and Spiritual Mastery.' }}
                </p>
                <a href="{{ route('yoga_sessions.by_trainer', ['trainer' => $trainer->name]) }}" 
                   class="btn {{ $btnClass }} px-4 py-2 rounded-pill">
                    Book Session
                </a>
            </div>

            {{-- Right side - Image --}}
            <div class="col-md-5 text-center">
                <div class="trainer-img-wrapper">
                    <img src="{{ asset('storage/' . $trainer->photo) }}" 
                         alt="{{ $trainer->name }}" 
                         class="img-fluid  shadow-sm trainer-img">
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

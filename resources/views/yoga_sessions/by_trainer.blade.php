@extends('layouts.app')

@section('content')

{{-- Hero Section --}}
<div class="w-100 py-5" style="background: linear-gradient(to bottom, #647E6500 0%, #647E644D 30%);">
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="col-md-7">
            <h1 class="mb-3" style="font-family: 'Marge', serif; font-size: 52px; line-height: 58px; letter-spacing: 4%; text-transform: capitalize;">
                Signature Yoga Sessions<br>By {{ $trainer->name }}
            </h1>
            <a href="#" class="btn btn-outline-dark mt-2">
                Explore {{ $ysessions->count() }} sessions
            </a>
        </div>
        <div class="col-md-4 text-center">
            <div class="trainer-image-wrapper mx-auto position-relative">
                <img src="{{ asset('storage/' . $trainer->photo) }}" 
                     alt="{{ $trainer->name }}" 
                     class="trainer-photo rounded-circle shadow-sm" 
                     style="width: 250px; height: 250px; object-fit: cover;">
                <img src="{{ asset('images/flower.svg') }}" 
                     alt="decorative flower" 
                     style="position: absolute; bottom: -10px; left: -10px; width: 300px; opacity: 0.2; z-index: 0;">
            </div>
        </div>
    </div>
</div>

{{-- Grouped Sessions --}}
@php
    $groupedSessions = $ysessions->groupBy('category.name');
    $sectionImages = [
        'Beginner Yoga' => 'images/yoga_beginner.jpg',
        'Advanced Yoga' => 'images/yoga_advanced.jpg',
        'Meditation & Breathwork' => 'images/yoga_meditation.jpg',
    ];
@endphp

<div class="container py-5">
    @foreach ($groupedSessions as $category => $sessionGroup)
    <div class="mb-5">
        <h3 class="mb-4 custom-course-heading">{{ $category }}</h3>

        <div class="d-flex flex-column flex-md-row gap-4">
            {{-- Left Category Image --}}
            <div class="flex-shrink-0 w-100 w-md-40" style="min-height: 100%;">
                <img src="{{ asset($sectionImages[$category] ?? 'images/default_yoga.jpg') }}" 
                     alt="{{ $category }}" 
                     class="w-100 h-100 rounded shadow-sm" 
                     style="object-fit: cover; min-height: 100%;">
            </div>

            {{-- Session Cards --}}
            <div class="flex-grow-1">
                @foreach ($sessionGroup as $session)
                <div class="card mb-3 border-0 shadow-sm rounded-3 course-card transition">
                    <div class="card-body d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="fw-semibold">{{ $session->title }}</h5>
                            <p class="mb-1 text-muted">
                                ₹{{ number_format($session->price_inr, 0) }} / 
                                ${{ number_format($session->price_usd, 0) }} USD
                                @if($session->duration)
                                    – {{ $session->duration }}
                                @endif
                            </p>
                            <p class="text-muted" style="font-size: 14px;">
                                {{ \Illuminate\Support\Str::limit($session->description, 150) }}
                            </p>
                        </div>

                        {{-- Book Button --}}
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="session_id" value="{{ $session->id }}">
                            <button class="btn btn-outline-success" type="submit">
                                Book Session
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- Optional Styling --}}
<style>
    @media (min-width: 768px) {
        .w-md-40 {
            width: 40% !important;
        }
    }

    .course-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .course-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
</style>

@endsection

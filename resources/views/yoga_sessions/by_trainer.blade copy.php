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
    $groupedSessions = $ysessions->groupBy('category');
@endphp

<div class="container py-5">
    @foreach ($groupedSessions as $category => $sessionGroup)
        <div class="mb-5">
            <h3 class="mb-4 custom-course-heading" style="font-family: 'Marge', serif; font-size: 52px; line-height: 58px; letter-spacing: 4%; text-transform: capitalize;">{{ $category }}</h3>

            <div class="session-group">
                @foreach ($sessionGroup as $session)
                <div class="session-card mb-4">
                    <div class="row g-0 align-items-center">
                        
                        {{-- Left Image --}}
                        <div class="col-md-5" style="padding : 20px;">
                            <img src="{{ $session->image ? asset('storage/'.$session->image) : asset('images/default_yoga.jpg') }}" 
                                 alt="{{ $session->name }}" 
                                 class="img-fluid session-img">
                        </div>

                        {{-- Right Content --}}
                        <div class="col-md-7">
                            <div class="p-4">
                                <h5 class="fw-semibold mb-2" style="Color:#8C5737;font-size: 28px; font-family: 'Inter'; ">{{ $session->name }}</h5>
                                <p class="mb-1 text-muted small">
                                    ₹{{ number_format($session->price, 0) }} / 
                                    ${{ number_format(($session->price)/80, 0) }} USD
                                    @if($session->duration)
                                        – {{ $session->duration }} mins
                                    @endif
                                </p>
                                <p class="text-muted small">
                                    {{ \Illuminate\Support\Str::limit($session->description, 120) }}
                                </p>
                                <a href="{{ route('yoga_sessions.show', $session) }}" 
                                   class="btn btn-dark rounded-pill btn-sm px-4" style="background-color:#8C5737">
                                   Book Session
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

{{-- Styling --}}
<style>
    .session-card {
        background-color: #f7efec;
        border: 1px solid #e5c7b8;
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .session-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    }

    .session-img {
        width: 100%;
        height: 80%;
        object-fit: fit;
        border-right: 1px solid #e5c7b8;
        border-radius : 10px;

    }

    .session-group {
        padding: 0;
    }
</style>



@endsection
@extends('layouts.app')

@section('content')

{{-- Hero Section --}}
@php
    $bgstyle =  $trainer->name == 'Mahesh Sir'
                ? asset('images/mahesh-bg.png') 
                : asset('images/anesha-bg.png');

    $bgcardcolor =  $trainer->name == 'Mahesh Sir'
        ? '#DBB9A7'
        : '#f8f8f2';    
        // Button style
    
    $btnClass = $trainer->name == 'Mahesh Sir' ? 'btn-brown' : 'btn-green';    
@endphp
<div class="w-100 py-5" style="background: url('{{ $bgstyle }}') no-repeat center center / cover; color: white; height:300px" >
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="col-md-7">
            <h1 class="mb-3 text-marge-session">
                Signature Yoga Sessions<br>By {{ $trainer->name }}
            </h1>
            <a href="#" class="btn {{$btnClass}} mt-2">
                Explore {{ $ysessions->count() }} sessions
            </a>
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
            {{-- Category Heading --}}
            <h3 class="mb-4" style="font-family: 'Marge', serif; font-size: 32px; color:#2C3E34;">
                {{ $category }}
            </h3>

            <div class="session-group">
                @foreach ($sessionGroup as $session)
                <div class="session-card d-flex flex-column flex-md-row align-items-stretch mb-4 p-3 rounded-4 ">
                    
                    {{-- Left Image --}}
                    <div class="col-md-4 pe-md-3 mb-3 mb-md-0">
                        <img src="{{ $session->image ? asset('storage/'.$session->image) : asset('images/default_yoga.jpg') }}" 
                             alt="{{ $session->name }}" 
                             class="img-fluid rounded-3 session-img">
                    </div>

                    {{-- Right Content --}}
                    <div class="col-md-8 d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="fw-semibold mb-2" style="color:#8C5737;font-size: 20px; font-family: 'Inter';">
                                {{ $session->name }}
                            </h5>
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="fw-bold">₹{{ number_format($session->price, 0) }} / ${{ number_format(($session->price)/80, 0) }} USD</span>
                                @if($session->duration)
                                    <span class="badge rounded-pill text-dark border px-3 py-1">{{ $session->duration }} minutes</span>
                                @endif
                            </div>
                            <p class="text-muted small mb-3">
                                {{ $session->description }}
                            </p>
                             <a href="{{ route('yoga_sessions.show', $session) }}" 
                           class="btn {{$btnClass }} px-4 py-2 align-self-start">
                            Book Now
                        </a>
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
        background-color: {{$bgcardcolor}};
        border: 1px solid #e6e4da;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .session-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }

    .session-img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    .hero-banner {
        position: relative;
        color: white;
        display: flex;
        align-items: flex-end;
        padding: 40px 0;
    }
    .bg-light-custom-mahesh{
        background: linear-gradient(to bottom, #8C573766 0%, #8C573766 30%);
       
    }
    .bg-light-custom-anesha{
        background: linear-gradient(to bottom, #647E6500 0%, #647E644D 30%);
    }
</style>

@endsection

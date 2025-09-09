@extends('layouts.app')

@section('content')

{{-- Hero Section --}}
@php
    $bgstyle =  $trainer->name == 'Mahesh Sir'
        ? 'bg-light-custom-mahesh'
        : 'bg-light-custom-anesha';

    $bgcardcolor =  $trainer->name == 'Mahesh Sir'
        ? '#DBB9A7'
        : '#f8f8f2'; 

    $btnClass = $trainer->name == 'Mahesh Sir' ? 'btn-brown' : 'btn-green'; 
    
@endphp

<!--@php-->
<!--    $bgstyle =  $trainer->name == 'Mahesh Sir'-->
<!--                ? asset('images/mahesh-bg-c.png') -->
<!--                : asset('images/anesha-bg-c.png');-->

<!--    $bgcardcolor =  $trainer->name == 'Mahesh Sir'-->
<!--        ? '#DBB9A7'-->
<!--        : '#f8f8f2';    -->
<!--        // Button style-->
    
<!--    $btnClass = $trainer->name == 'Mahesh Sir' ? 'btn-brown' : 'btn-green';    -->
<!--@endphp-->
<!--<div class="w-100 py-5" style="background: url('{{ $bgstyle }}') no-repeat center center / cover; color: white; height:300px" >-->
<!--    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">-->
<!--        <div class="col-md-7">-->
<!--            <h1 class="mb-3 text-marge-session">-->
<!--                Spiritual Course Catalog<br>By {{ $trainer->name }}-->
<!--            </h1>-->
<!--            <a href="#" class="btn btn-outline-dark mt-2">-->
<!--                   Explore {{ $courses->count() }} Courses-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div class="w-100 py-5 {{ $bgstyle }} " >
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="col-md-7">
            <h1 class="mb-3 text-marge-session">
            Spiritual Course Catalog<br>By {{ $trainer->name }}
            </h1>
            <a href="#" class="btn {{$btnClass}} mt-2">
                Explore {{ $courses->count() }} Courses
            </a>
        </div>
        <div class="col-md-4 text-center">
            <div class="trainer-image-wrapper mx-auto position-relative">
                <img src="{{ asset('storage/' . $trainer->photo) }}" 
                     alt="{{ $trainer->name }}" 
                     class=" " 
                     style="width: 300px; height: 300px; object-fit: contain;">
            </div>
        </div>
    </div>
</div>
{{-- Grouped Sessions --}}
@php
    $groupedCourses = $courses->groupBy('type');
@endphp

<div class="container py-5">
    @foreach ($groupedCourses as $type => $courseGroup)
        <div class="mb-5">
            {{-- Category Heading --}}
            <h3 class="mb-4" style="font-family: 'Marge', serif; font-size: 32px; color:#2C3E34;">
                {{ $type }}
            </h3>

            <div class="session-group">
                @foreach ($courseGroup as $course)
                <div class="session-card d-flex flex-column flex-md-row align -items-stretch mb-4 p-3 rounded-4 shadow-sm">
                    
                    {{-- Left Image --}}
                    <div class="col-md-4 pe-md-3 mb-3 mb-md-0">
                        <img src="{{ $course->image ? asset('storage/'.$course->image) : asset('images/default_yoga.jpg') }}" 
                             alt="{{ $course->name }}" 
                             class="img-fluid rounded-3 session-img">
                    </div>

                    {{-- Right Content --}}
                    <div class="col-md-8 d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="fw-semibold mb-2" style="color:#8C5737;font-size: 20px; font-family: 'Inter';">
                                {{ $course->name }}
                            </h5>
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="fw-bold">₹{{ number_format($course->price, 0) }} / ${{ number_format(($course->price)/80, 0) }} USD</span>
                                @if($course->duration)
                                    <span class="badge rounded-pill text-dark border px-3 py-1">{{ $course->duration }}</span>
                                @endif
                                @if($course->certification == 1)
                                    <span class="badge rounded-pill text-dark border px-3 py-1">Available</span>
                                @endif
                            </div>
                            <p class="text-muted small mb-3">
                                 {{ \Illuminate\Support\Str::limit($course->description, 500) }}
                            </p>
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <button class="btn {{$btnClass}}" type="submit">Add to cart</button>
                            </form>
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


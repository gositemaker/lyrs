@extends('layouts.app')

@section('content')

{{-- Hero Section --}}
<div class="w-100 py-5" style="background: linear-gradient(to bottom, #647E6500 0%, #647E644D 30%);">
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="col-md-7">
            <h1 class="mb-3" style="font-family: 'Marge', serif; font-size: 52px; line-height: 58px; letter-spacing: 4%; text-transform: capitalize;">
                Spiritual Course Catalog<br>By {{ $trainer->name }}
            </h1>
            <a href="#" class="btn btn-outline-dark mt-2">
                Explore {{ $courses->count() }} courses
            </a>
        </div>
        <div class="col-md-4 text-center">
            <div class="trainer-image-wrapper mx-auto position-relative">
                <img src="{{ asset('storage/' . $trainer->photo) }}" 
                     alt="{{ $trainer->name }}" 
                     class="trainer-photo">
                <img src="{{ asset('images/flower.svg') }}" 
                     alt="decorative leaves" 
                     style="position: absolute; bottom: -10px; left: -10px; width: 300px; opacity: 0.2; z-index: 0;">
            </div>
        </div>
    </div>
</div>

{{-- Grouped Courses --}}
@php
    $groupedCourses = $courses->groupBy('type');
    $sectionImages = [
        'Tarot & Healing Offerings' => 'images/tarot.jpg',
        'Inner Healing & Psychology Courses' => 'images/healing.jpg',
        'Yoga Nidra' => 'images/healing.jpg',
    ];
@endphp

<div class="container py-5">
    @foreach ($groupedCourses as $type => $courseGroup)
    <div class="mb-5">
        <h3 class="mb-4 custom-couse-heading" >{{ $type }}</h3>

        {{-- Responsive Flex Layout --}}
        <div class="d-flex flex-column flex-md-row gap-4">
            {{-- Left Image --}}
            <div class="flex-shrink-0 w-100 w-md-40" >
                <img src="{{ asset($sectionImages[$type] ?? 'images/default.jpg') }}" 
                     alt="{{ $type }}" 
                     class="w-100 h-100 rounded shadow-sm" 
                     style="object-fit: cover;">
            </div>

            {{-- Course Cards --}}
            <div class="flex-grow-1">
                @foreach ($courseGroup as $course)
                <div class="card mb-3 border-0 shadow-sm rounded-3 course-card transition" style="background-color:#DBB9A7">
                    <div class="card-body d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="fw-semibold">{{ $course->name }}</h5>
                            <p class="mb-1 text-muted">₹{{ number_format($course->price, 0) }} / ${{ number_format($course->price / 55, 0) }} USD</p>
                            <p class="text-muted" style="font-size: 14px;">
                                {{ \Illuminate\Support\Str::limit($course->description, 150) }}
                            </p>
                        </div>
                       
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <button class="btn btn-outline-success" type="submit">Add to cart</button>
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

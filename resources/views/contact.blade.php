{{-- resources/views/contact.blade.php --}}
@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container py-5">
    <div class="row align-items-center">
        {{-- Left Side Image --}}
        <div class="col-md-5 mb-4 mb-md-0">
            <div class="rounded-4 overflow-hidden shadow-sm">
                <img src="{{ asset('images/contact.jpg') }}" class="img-fluid w-100" alt="Contact Us">
            </div>
        </div>

        {{-- Right Side Content --}}
        <div class="col-md-7 p-5">
            <h2 class=" mb-4" style="color:#2c3e34; font-family:'Marge', serif;">Let’s Talk With Us</h2>

            {{-- Annesha Contact --}}
            <div class="mb-4">
                <h5 class="fw-semibold mb-2">Annesha Bera</h5>
                <p class="mb-1">
                    <i class="bi bi-envelope-fill me-2 text-success"></i>
                    <a href="mailto:contact@energyworkbyannesha.org" class="text-decoration-none text-dark">
                        contact@energyworkbyannesha.org
                    </a>
                </p>
            </div>

            {{-- Mahesh Contact --}}
            <div>
                <h5 class="fw-semibold mb-2">Yog with Mahesh</h5>
                <p class="mb-1">
                    <i class="bi bi-telephone-fill me-2 text-success"></i>
                    <a href="tel:+919711505605" class="text-decoration-none text-dark">
                        +91 9711 505 605
                    </a>
                </p>
                <p class="mb-1">
                    <i class="bi bi-envelope-fill me-2 text-success"></i>
                    <a href="mailto:contact@energyworkbyannesha.org" class="text-decoration-none text-dark">
                        contact@energyworkbyannesha.org
                    </a>
                </p>
                <p class="mb-0">
                    <i class="bi bi-youtube me-2 text-danger"></i>
                    <a href="https://www.youtube.com/@YogawithMahesh" target="_blank" class="text-decoration-none text-dark">
                        youtube.com/@YogawithMahesh
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

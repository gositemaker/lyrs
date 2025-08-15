@extends('layouts.app')

@section('content')
<div class="container py-5">

    @foreach($trainers as $index => $trainer)
        @php
            $bgImage = $index % 2 === 0 
                ? asset('images/bg-swirls-light.png') 
                : asset('images/bg-swirls-dark.png');
        @endphp

        <div class="trainer-block row align-items-center shadow-sm p-4 mb-5"
             style="background-image: url('{{ $bgImage }}'); ">
             
            <div class="col-md-7">
                <h3 class="custom-couse-heading">
                    Session Catalog By {{ $trainer->name }}
                </h3>
                <p class="fw-semibold fst-italic text-dark">Awaken. Heal. Empower. Teach.</p>
                <p class="text-dark">
                    {{ $trainer->bio ?? 'Step into a journey of soul growth with curated courses in Tarot, Inner Healing, Divine Feminine Activation, and Spiritual Mastery.' }}
                </p>
                <a href="{{ route('yoga_sessions.by_trainer', ['trainer' => $trainer->name]) }}" 
                   class="btn {{ $index % 2 === 0 ? 'btn-success' : 'btn-secondary' }}">
                    Explore Sessions
                </a>
            </div>

            <div class="col-md-5 text-center">
                <img src="{{ asset('storage/' . $trainer->photo) }}" 
                     alt="{{ $trainer->name }}" 
                     class="img-fluid rounded shadow-sm" 
                     style="max-height: 390px;max-width: 512px;">
            </div>
        </div>
    @endforeach
</div>
@endsection

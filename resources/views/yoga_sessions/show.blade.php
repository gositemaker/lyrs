@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-3xl mb-4">Signature Sessions By {{ $trainer->name }}</h1>
    <p class="mb-6 text-gray-700">Explore {{ $trainer->sessionCategories->sum(fn($cat) => $cat->sessions->count()) }} courses</p>

    @foreach($trainer->sessionCategories as $category)
        <h2 class="text-2xl font-semibold mt-10 mb-4">{{ $category->title }}</h2>
        <div class="space-y-6">
            @foreach($category->sessions as $session)
                <div class="flex p-4 bg-green-50 rounded-xl shadow justify-between items-center">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('storage/'.$session->image) }}" class="w-40 h-28 rounded-md object-cover">
                        <div>
                            <h3 class="text-lg font-semibold">{{ $session->title }}</h3>
                            <p class="text-sm text-gray-600">₹{{ $session->price_inr }} / ${{ $session->price_usd }} {{ $session->duration ? '– ' . $session->duration : '' }}</p>
                            <p class="mt-1 text-gray-700">{{ $session->description }}</p>
                        </div>
                    </div>
                    <button class="px-4 py-2 bg-green-800 text-white rounded">Add to cart</button>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection

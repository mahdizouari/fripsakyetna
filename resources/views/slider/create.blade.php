@extends('crud.admin')

@section('content')
    <div class="container mt-4 mx-auto w-full max-w-3xl">
        <h1 class="text-2xl font-bold mb-6 text-center">{{ isset($slider) ? 'Modifier le Slider' : 'Créer un Slider' }}</h1>

    <form action="{{ isset($slider) ? route('slider.update', $slider->id) : route('slider.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if(isset($slider))
            @method('PUT')
        @endif

        @foreach(['image1', 'image2', 'image3', 'image4'] as $index => $imageField)
            <div class="space-y-2">
                <label for="{{ $imageField }}" class="block text-sm font-medium text-gray-700 capitalize">Image {{ $index + 1 }}</label>
                <input type="file" name="{{ $imageField }}" id="{{ $imageField }}" class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-yellow-500 file:text-white hover:file:bg-yellow-600 rounded">
                @if(isset($slider) && $slider->$imageField)
                    <img src="{{ asset('/' . $slider->$imageField) }}" width="100" class="mt-2 rounded shadow border" alt="Image {{ $index + 1 }}">
                @endif
            </div>
        @endforeach

        <div class="space-y-2">
            <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
            <input type="text" name="title" id="title" class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" value="{{ $slider->title ?? '' }}">
        </div>

        <div class="space-y-2">
            <label for="subtitle" class="block text-sm font-medium text-gray-700">Sous-titre</label>
            <input type="text" name="subtitle" id="subtitle" class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" value="{{ $slider->subtitle ?? '' }}">
        </div>

        <div>
            <button type="submit" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200 shadow">
                {{ isset($slider) ? 'Mettre à jour' : 'Créer' }}
            </button>
        </div>
    </form>
    </div>
@endsection

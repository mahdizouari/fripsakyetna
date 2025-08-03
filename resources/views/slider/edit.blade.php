@extends('crud.admin')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-6 mb-6">
    {{-- Title --}}
    <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">
        {{ isset($slider) ? 'Modifier le Slider' : 'Créer un Slider' }}
    </h1>

    <form action="{{ isset($slider) ? route('slider.update', $slider->id) : route('slider.store') }}"
          method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if(isset($slider))
            @method('PUT')
        @endif

        {{-- Image Inputs --}}
        @foreach(['image1', 'image2', 'image3', 'image4'] as $image)
        <div>
            <label for="{{ $image }}" class="block text-sm font-medium text-gray-700 capitalize">
                {{ str_replace('image', 'Image ', $image) }}
            </label>
            <input type="file" name="{{ $image }}" id="{{ $image }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500">

            @if(isset($slider) && $slider->$image)
                <div class="mt-2">
                    <img src="{{ asset('/' . $slider->$image) }}" alt="{{ $image }}"
                         class="h-24 rounded shadow border">
                </div>
            @endif
        </div>
        @endforeach

        {{-- Title --}}
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
            <input type="text" name="title" id="title"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500"
                   value="{{ $slider->title ?? '' }}">
        </div>

        {{-- Subtitle --}}
        <div>
            <label for="subtitle" class="block text-sm font-medium text-gray-700">Sous-titre</label>
            <input type="text" name="subtitle" id="subtitle"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500"
                   value="{{ $slider->subtitle ?? '' }}">
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between items-center pt-4">
            <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded shadow-md transition">
                {{ isset($slider) ? 'Modifier' : 'Créer' }}
            </button>
            <a href="/slider"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded shadow-md transition">
                Retour
            </a>
        </div>
    </form>
</div>
@endsection

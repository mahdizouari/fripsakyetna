@extends('crud.admin')

@section('content')
<div class="container mx-auto px-4 mt-4">
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-4xl mx-auto">
             <div class="text-center mb-4">
                <h1 class="text-2xl md:text-3xl font-bold">Sliders</h1>
            </div>
            <div class="flex justify-center items-center">
             <a href="{{ route('slider.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded transition">Add New Slider</a>
            </div>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Image 1</th>
                <th>Image 2</th>
                <th>Image 3</th>
                <th>Image 4</th>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $slider)
                <tr>
                    <td>
                        @if ($slider->image1)
                            <img src="{{ asset('/' . $slider->image1) }}" width="100" alt="Image 1">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        @if ($slider->image2)
                            <img src="{{ asset('/' . $slider->image2) }}" width="100" alt="Image 2">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        @if ($slider->image3)
                            <img src="{{ asset('/' . $slider->image3) }}" width="100" alt="Image 3">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        @if ($slider->image4)
                            <img src="{{ asset('/' . $slider->image4) }}" width="100" alt="Image 3">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->subtitle }}</td>
                    <td>
                        <a href="{{ route('slider.edit', $slider->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded transition">Edit</a>
                        <form action="{{ route('slider.destroy', $slider->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
@endsection

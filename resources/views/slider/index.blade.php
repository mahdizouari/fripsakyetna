@extends('crud.admin')

@section('content')
    <h1>Sliders</h1>
    <a href="{{ route('slider.create') }}" class="btn btn-primary">Add New Slider</a>
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
                        <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('slider.destroy', $slider->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

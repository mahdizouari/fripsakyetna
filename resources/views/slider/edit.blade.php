@extends('crud.admin')

@section('content')
    <h1>{{ isset($slider) ? 'Edit Slider' : 'Create Slider' }}</h1>
    <form action="{{ isset($slider) ? route('slider.update', $slider->id) : route('slider.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($slider))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="image1">Image 1</label>
            <input type="file" name="image1" id="image1" class="form-control">
            @if(isset($slider) && $slider->image1)
                <img src="{{ asset('/' . $slider->image1) }}" width="100" class="mt-2" alt="Image 1">
            @endif
        </div>

        <div class="form-group">
            <label for="image2">Image 2</label>
            <input type="file" name="image2" id="image2" class="form-control">
            @if(isset($slider) && $slider->image2)
                <img src="{{ asset('/' . $slider->image2) }}" width="100" class="mt-2" alt="Image 2">
            @endif
        </div>

        <div class="form-group">
            <label for="image3">Image 3</label>
            <input type="file" name="image3" id="image3" class="form-control">
            @if(isset($slider) && $slider->image3)
                <img src="{{ asset('/' . $slider->image3) }}" width="100" class="mt-2" alt="Image 3">
            @endif
        </div>
        <div class="form-group">
            <label for="image4">Image 4</label>
            <input type="file" name="image4" id="image4" class="form-control">
            @if(isset($slider) && $slider->image4)
                <img src="{{ asset('/' . $slider->image4) }}" width="100" class="mt-2" alt="Image 4">
            @endif
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $slider->title ?? '' }}">
        </div>

        <div class="form-group">
            <label for="subtitle">Subtitle</label>
            <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ $slider->subtitle ?? '' }}">
        </div>

        

        <button type="submit" class="btn btn-success">{{ isset($slider) ? 'Update' : 'Create' }}</button>
    </form>
@endsection

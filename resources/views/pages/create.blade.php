<!-- resources/views/child.blade.php -->

@extends('layouts.app')
@section('title', 'Create Post')
@section('content')
    <x-container>
    @include("partials.__links")
    @include('partials._title', ["title" => "CREATE POST"])


    <img src="#" id="imagePreview" alt="Image Preview" style="display: none; width:100px; margin-bottom:10px;">
  
    <form  id="Product__create" method="post" enctype="multipart/form-data" >
    @csrf

    <div>
        <label for="product_name">Title:</label>
        <input type="text" id="product_name" name="product_name" value="{{ old('title') }}" required>
        @error('title')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" cols="50" required>{{ old('description') }}</textarea>
        @error('description')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="image">Upload Image:</label>
        <input type="file" id="image"  name="image" accept="image/*" required>
        @error('image')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <button type="submit">Submit</button>
    </div>
</form>

    <a href="/dashboard" style="margin-top:30px;">RETURN</a>
  </div>
  
  
</x-container>
 
@endsection

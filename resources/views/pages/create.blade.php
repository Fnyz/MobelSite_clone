@extends('layouts.app')
@section('title', 'Create Product')
@section('content')
    <x-container>
    @include("partials.__links")
    @include('partials._title', ["title" => "CREATE PRODUCT"])


    <img src="#" id="imagePreview" alt="Image Preview" style="display: none; width:100px; margin-bottom:10px;">
  
    <form  id="Product__create" enctype="multipart/form-data" >

    <div>
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" value="{{ old('title') }}" >
        <div style="color:red" id="product_name-error"></div> <!-- Error display -->
    </div>

    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" cols="50" style="padding: 10px;" >{{ old('description') }}</textarea>
        <div style="color:red" id="description-error"></div> <!-- Error display -->
    </div>

    <div>
        <label for="image">Upload Image:</label>
        <input type="file" id="image"  name="image" accept="image/*" required>
        <div style="color:red" id="image-error"></div> <!-- Error display -->
    </div>

    <div>
        <button type="submit" style="margin-bottom:20px;">Submit</button>
    </div>
</form>

    <a href="/dashboard" >RETURN</a>
  </div>
  
  
</x-container>
 
@endsection

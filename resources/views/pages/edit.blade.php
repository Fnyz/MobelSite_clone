@extends('layouts.app')
@section('title', 'Update Product')
@section('content')
    <x-container>
    @include("partials.__links")
    @include('partials._title', ["title" => "UPDATE PRODUCT"])


    @if($product->image)
    <img src="{{ asset('storage/' . $product->image) }}" id="imagePreview" alt="Image Preview" 
    @style([
        'width: 100px',
        'margin-bottom: 10px',
        'display: none' =>!$product->image,
    ])
    >
@else
    <div>No image available</div>
@endif



    <form  id="Product__update" enctype="multipart/form-data" method="POST" action="{{route("update_product", ["product" => $product->id])}}" >
        @csrf
        @method("PUT")
    <div>
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" value="{{$product->product_name}}" />
        <div style="color:red" id="product_name-error"></div> <!-- Error display -->
    </div>

    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" cols="50" style="padding: 10px;">{{ $product->description }}</textarea>
        <div style="color:red" id="description-error"></div> <!-- Error display -->
    </div>

    <div>
        <label for="image">Upload Image:</label>
        <input type="file" id="image"  name="image" accept="image/*" >
        <div style="color:red" id="image-error"></div> <!-- Error display -->
    </div>

    <div>
        <button type="submit">Submit</button>
    </div>
</form>

    <a href="/dashboard" style="margin-top:30px;">RETURN</a>
  </div>
  
  
</x-container>
 
@endsection

@extends('layouts.app')
@section('title', 'ADD SUPPLIER')
@section('content')
    <x-container>
    @include("partials.__links")
    @include('partials._title', ["title" => "EDIT SUPPLIER"])

  
    @if($supplier->supp_image)
    <img src="{{ asset('storage/' . $supplier->supp_image) }}" id="supplier_image_show" alt="Image Preview" 
    @style([
        'width: 100px',
        'margin-bottom: 10px',
        'display: none' =>!$supplier->supp_image,
    ])
    >
    @else
        <div>No image available</div>
    @endif


    <form  id="Supplier__update" enctype="multipart/form-data" method="POST" action="{{route("update_supplier", ["supplier"=> $supplier->id])}}" >
        @csrf
        @method("PUT")
        
        <div>
            <label for="supp_company">Company name:</label>
            <input type="text" id="supp_company" name="supp_company" value="{{$supplier->supp_company}}" >
            <div style="color:red" id="supp_company-error"></div> 
        </div>
        <div>
            <label for="supp_address">Address:</label>
            <input type="text" id="supp_address" name="supp_address" value="{{$supplier->supp_address}}" style="padding: 10px;" >
            <div style="color:red" id="supp_address-error"></div> 
        </div>
        <div>
            <label for="supp_phone">Phone#:</label>
            <input type="text" id="supp_phone" name="supp_phone" value="{{$supplier->supp_phone}}"  style="padding: 10px;">
            <div style="color:red" id="supp_phone-error"></div> 
        </div>
            
        <div>
            <label for="supp_image">Upload Image:</label>
            <input type="file" id="supp_image"  name="supp_image" accept="image/*" required>
            <div style="color:red" id="supp_image-error"></div> <!-- Error display -->
        </div>

        <div>
            <button type="submit" style="margin-bottom:10px;">Submit</button>
        </div>
        
    </form>

    <a href="{{route("pages.supplier")}}" >RETURN</a>
  </div>
  
  
</x-container>
 
@endsection

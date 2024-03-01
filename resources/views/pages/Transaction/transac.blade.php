<!-- resources/views/child.blade.php -->

@extends('layouts.app')
@section('title', 'Transaction')
@section('content')


    <x-container>
      @include("partials.__links")


    @include('partials._title', ["title" => "ADD TRANSACTION"])

    <div>
      <a href="{{route("pages.transaction")}}" style="margin-top:20px; font-weight:bold;">GO BACK TO TRANSACTION HISTORY</a>
    </div>

   
    <select class="form-select" id="supplier"  style="margin-top: 20px;">
    </select>


    <table class=" table table-bordered mb-5" style="width:100%; margin-top:10px;">
      <thead>
          <tr>
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>

          <tr>
              <td>
                <select class="form-select" id="product" >
                </select>
              </td>
              <td><input type="number" class="form-control"   id="price" name="price" min="0" step="0.25" value="0.00"></td>
              <td><input type="number" class="form-control"  id="quantity" name="quantity" value="0"></td>
              <td>
                  <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                      <button type="button" class="btn btn-success" id="submit"><i class="fa-solid fa-plus"></i></button>
                  </div>
              </td>
          </tr>


      </tbody>
  </table>









  
  </x-container>
   

 
@endsection

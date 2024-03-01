<!-- resources/views/child.blade.php -->

@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')


    <x-container>
      @include("partials.__links")


    @include('partials._title', ["title" => "COMPUTER-FY.CO"])

    <div style="margin-top:20px;">
      <a href="{{route("pages.create")}}" style="margin-top:20px; font-weight:bold;">ADD PRODUCT</a>
      <span>/</span>
      <a href="{{route("pages.supplier")}}" style="margin-top:20px; font-weight:bold;">SUPPLIER</a>
      <span>/</span>
      <a href="{{route("pages.transaction")}}" style="margin-top:20px; font-weight:bold;">TRANSACTION</a>
    </div>

    <form id="searchForm" action="{{route("search")}}" method="GET" style="margin-top:10px;">
     @csrf

        <input  type="text" id="query" placeholder="Search products..." >
        <button  type="submit" class="btn btn-danger">SEARCH</button>

    </form>

    <table class="table" style="margin-top: 10px;">
      <thead>
        <tr>
   
          <th scope="col">IMAGE</th>
          <th scope="col">PRODUCT</th>
          <th scope="col">PRICE</th>
          <th scope="col">QUANTITY</th>
          <th scope="col">DESCRIPTION</th>
          <th scope="col">DATE</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody class="table-group-divider" id="table__result">


      </tbody>
    </table>


    <div id="paginationContainer" >
    </div>

  
  </x-container>
   

 
@endsection

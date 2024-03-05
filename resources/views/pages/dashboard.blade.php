<!-- resources/views/child.blade.php -->

@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')


    <x-container>
      @include("partials.__links")


    @include('partials._title', ["title" =>  $position ==="Staff" ? "LIST OF REQUEST": "COMPUTER-FY.CO"])

    <div style="margin-top:20px;">
     @switch($position)
       @case("Employee")
       <a href="{{route("pages.create")}}" style="margin-top:20px; font-weight:bold;">ADD PRODUCT</a>
       <span>/</span>
       <a href="{{route("pages.request")}}" style="margin-top:20px; font-weight:bold;">REQUEST PRODUCT</a>
         @break
      @case("Staff")
      <a href="{{route("pages.supplier")}}" style="margin-top:20px; font-weight:bold;">SUPPLIER</a>
      <span>/</span>
      <a href="{{route("pages.transaction")}}" style="margin-top:20px; font-weight:bold;">TRANSACTION</a>
         @break
       @default
       <a href="{{route("pages.position")}}" style="margin-top:20px; font-weight:bold;">SET POSITION</a>
     @endswitch
 

    </div>

    <form id="searchForm" action="{{route("search")}}" method="GET" style="margin-top:10px;">
     @csrf

        <input  type="text" id="query" placeholder="Search products..." >
        <button  type="submit" class="btn btn-danger">SEARCH</button>

    </form>


     @switch($position)
       @case("Admin")     
    <table class="table" style="margin-top: 10px;">
      <thead>
        <tr>
          <th scope="col">Email</th>
          <th scope="col">Position</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody class="table-group-divider" id="table__result">
      </tbody>
    </table>
      @break

      @case("Employee")     
      <table class="table" style="margin-top: 10px;">
        <thead>
          <tr>
     
            <th scope="col">IMAGE</th>
            <th scope="col">PRODUCT</th>
            <th scope="col">PRICE</th>
            <th scope="col">QUANTITY</th>
            <th scope="col">DESCRIPTION</th>
            <th scope="col">REMARKS</th>
            <th scope="col">DATE</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody class="table-group-divider" id="table__result">
        </tbody>
      </table>
        @break

        @case("Staff")
        
   
      <table class="table" style="margin-top: 10px;">
        <thead>
          <tr>
     
            <th scope="col">IMAGE</th>
            <th scope="col">PRODUCT</th>
            <th scope="col">QUANTITY</th>
            <th scope="col">DATE</th>
            <th scope="col">REMARKS</th>

          </tr>
        </thead>
        <tbody class="table-group-divider" id="table__result">
        </tbody>
      </table>
        @break
     
       @default
         
     @endswitch

  
    <div id="paginationContainer" >
    </div>

  
  </x-container>
   

 
@endsection

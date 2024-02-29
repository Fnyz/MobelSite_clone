<!-- resources/views/child.blade.php -->

@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')


    <x-container>
      @include("partials.__links")


    @include('partials._title', ["title" => "LIST OF SUPPLIER"])

    <div>
      <a href="{{route("pages.dashboard")}}" style="margin-top:20px; font-weight:bold;">GO BACK TO DASHBOARD</a>
      <span>/</span>
      <a href="{{route("pages.create")}}" style="margin-top:20px; font-weight:bold;">ADD SUPPLIER</a>
    </div>

    <form id="searchForm" action="{{route("search")}}" method="GET">
     @csrf

        <input  type="text" id="query" placeholder="Search products..." >
        <button  type="submit" class="btn btn-danger">SEARCH</button>

    </form>

    <table class="table" style="margin-top: 10px;">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">IMAGE</th>
          <th scope="col">PRODUCT</th>
          <th scope="col">DESCRIPTION</th>
          <th scope="col">CREATE_AT</th>
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

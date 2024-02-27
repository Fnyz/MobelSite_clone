<!-- resources/views/child.blade.php -->

@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')


    <x-container>
      @include("partials.__links")

    @include('partials._title', ["title" => "WELCOME TO DASHBOARD"])
    <a href="{{route("pages.create")}}" style="margin-top:20px; font-weight:bold;">CREATE POST</a>
    <table class="table" style="margin-top: 10px;">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">IMAGE</th>
          <th scope="col">PRODUCT NAME</th>
          <th scope="col">DESCRIPTION</th>
          <th scope="col">CREATE_AT</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">

        @if ($product->count() > 0)
        @foreach ($product as $p )
        <tr>
          <td scope="row">{{$p->id}}</td>
          <td>
            <img src="{{ asset('storage/' . $p->image) }}" alt="Post Image" width="70px">
          </td>
          <td>{{$p->product_name}}</td>
          <td>{{$p->description}}</td>
          <td>{{$p->created_at}}</td>
        </tr>
        @endforeach 
        @else
            <tr>
              <td colspan="5">No posts found!</td>
            </tr>
        @endif

      </tbody>
    </table>
    {{$product->links()}}
  </x-container>
   

 
@endsection

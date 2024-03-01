<!-- resources/views/child.blade.php -->

@extends('layouts.app')
@section('title', 'Transaction')
@section('content')


    <x-container>
      @include("partials.__links")


    @include('partials._title', ["title" => "TRANSACTION HISTORY"])

    <div>
      <a href="{{route("pages.dashboard")}}" style="margin-top:20px; font-weight:bold;">GO BACK TO DASHBOARD</a>
      <span>/</span>
      <a href="{{route("pages.transaction.transac")}}" style="margin-top:20px; font-weight:bold;">ADD TRANSACTION</a>
    </div>


  
  </x-container>
   

 
@endsection

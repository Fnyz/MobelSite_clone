<!-- resources/views/child.blade.php -->

@extends('layouts.app')
@section('title', 'Homepage')



    @section('content')
    <x-container>
    @include("partials.__links")
    <form action="{{route("pages.Auth.login")}}" method="post">
        @csrf
        @method("POST")
        <h2>Login</h2>
        <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" >
        @error('email')
            <span class="error">{{ $message }}</span>
        @enderror
        <input type="password" name="password" placeholder="Password" >
        @error('password')
            <span class="error">{{ $message }}</span>
        @enderror
        <input type="submit" value="Login">
        </form>
    </x-container>

        
    @endsection



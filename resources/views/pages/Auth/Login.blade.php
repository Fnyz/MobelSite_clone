<!-- resources/views/child.blade.php -->

@extends('layouts.app')
@section('title', 'Homepage')
@section('content')

@include("partials.__links")

<form action="{{route("pages.Auth.login")}}" method="post">
    @csrf
    @method("POST")
    <h2>Login</h2>
    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" required>
    @error('email')
        <span class="error">{{ $message }}</span>
    @enderror
    <input type="password" name="password" placeholder="Password" required>
    @error('password')
        <span class="error">{{ $message }}</span>
    @enderror
    <input type="submit" value="Login">
</form>


@endsection

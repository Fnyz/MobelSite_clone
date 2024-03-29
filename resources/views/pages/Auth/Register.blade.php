<!-- resources/views/child.blade.php -->

@extends('layouts.app')
@section('title', 'Homepage')
@section('content')
<x-container>
    @include("partials.__links")
<form method="POST" action="{{ route("pages.Auth.register") }}">
    @csrf
    @method("POST")

    {{-- <select id="position" name="position" class="form-select" aria-label="Default select example" style="margin-top:10px;">
        <option selected>Select Position</option>
        <option value="Admin">Admin</option>
        <option value="Employee">Employee</option>
        <option value="Staff">Staff</option>
    </select> --}}

    <div>
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    </div>
    @error('name')
        <span class="error">{{ $message }}</span>
    @enderror

    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
    </div>

    @error('email')
        <span class="error">{{ $message }}</span>
    @enderror


    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required >
    </div>

    @error('password')
        <span class="error">{{ $message }}</span>
    @enderror
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required >
    </div>

    @error('password_confirmation')
        <span class="error">{{ $message }}</span>
    @enderror


    <button type="submit">Register</button>
</form>

</x-container>

@endsection

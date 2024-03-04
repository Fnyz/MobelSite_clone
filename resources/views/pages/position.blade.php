@extends('layouts.app')
@section('title', 'Create Product')
@section('content')
    <x-container>
    @include("partials.__links")
    @include('partials._title', ["title" => "SET USER POSITION"])

  
  
    <form  id="Set_position" action="/position/create" method="POST"  >
   @csrf

        <select id="employee_position" class="form-select" name="employee_position" aria-label="Default select example" style="margin-top:10px;">
            
            <option selected>Select Position</option>
            @if (!$isAdminSet)
            <option value="Admin">Admin</option>
            @endif
          
            <option value="Employee">Employee</option>
            <option value="Staff">Staff</option>
        </select>
         
        <select id="user_id" class="form-select" name="user_id"  aria-label="Default select example" style="margin-top:10px;">
            <option selected>Select User</option>
            @forelse ( $user as $users)
              
              
               <option value="{{$users->id}}" @style(
                [
                    'display:none' => $email == $users->email
                ]
               )>{{$users->email}}</option>     
               
            @empty
            <option>No users found!</option>
            @endforelse
        </select>

  
    <div>
        <button type="submit" style="margin-bottom:20px;">Submit</button>
    </div>
</form>

    <a href="/dashboard" >RETURN</a>
  </div>
  
  
</x-container>
 
@endsection

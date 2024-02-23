<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RegisterController extends Controller
{
    //
     /**
     * Show the login form.
     */
    public function showRegistrationForm()
    {

        $routeName = Route::currentRouteName();       
        return view("pages.Auth.register", compact("routeName"));
    }

    /**
     * Handle the login form submission.
     */
    public function register(Request $request)
    {
        // Handle login logic

       $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users|max:255',
        'password' => 'required|string|min:8|confirmed',
      ]);


      $user =  User::create([
        'name'=> $request->name,
        'email'=> $request->email,
        'password'=>Hash::make($request->password),
      ]);

      Auth::login($user);

    // Redirect the user to a specific page
       return redirect(route("pages.dashboard"));
    
      
 
    }
}

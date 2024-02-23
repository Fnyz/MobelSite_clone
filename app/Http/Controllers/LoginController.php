<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    //
     /**
     * Show the login form.
     */
    public function showLoginForm(Request $request)
    {
        $routeName = Route::currentRouteName();       
        return view("pages.Auth.login", compact('routeName'));
    }

    /**
     * Handle the login form submission.
     */
    public function login(Request $request)
    {
        // Handle login logic
    }
}

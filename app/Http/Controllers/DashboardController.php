<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class DashboardController extends Controller
{
    //

    public function dashboard()
    {

         $product = Product::where("user_id", Auth::user()->id)->simplePaginate(2);
         return view("pages.dashboard", compact("product"));
    }

    public function logout(Request $request)
    {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect(route("pages.Auth.login"));
    }

    
}

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
        return view('pages.dashboard');
    }


    
    public function showProduct()
    {
  
         $user = Auth::user();
     
         $products = $user->products()->where("user_id", $user->id)->orderBy('created_at', 'DESC')->simplePaginate(5);
         return response()->json([
            'products' => $products,
            'pagination' => $products->links()->toHtml(),
        ]);

   
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route("pages.Auth.login"));
    }

    
}

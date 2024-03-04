<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    //

    public function dashboard()
    {
        $user = User::select('positions.employee_position as positions')
        ->from('users as s')
        ->rightJoin('positions', 's.id', '=', 'positions.user_id')
        ->where('positions.user_id', Auth::user()->id)
        ->get();
        
        $position = $user[0]->positions;

        return view('pages.dashboard', compact("position"));
    }


    
    public function showProduct()
    {

       
        $products = Product::select("*")
        ->from("products as p")
        ->selectRaw("
        Case when p.price is null then 'UNAVAILABLE'
        ELSE 'AVAILABLE'
        END AS Remarks
        ")
        ->where("user_id", Auth::user()->id)
        ->simplePaginate(5);

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

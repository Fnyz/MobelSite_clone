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
        
        $position = $user[0]->positions ?? null;

        return view('pages.dashboard', compact("position"));
    }


    
    public function showProduct()
    {


        
        


        $user = User::select('positions.employee_position as positions')
        ->from('users as s')
        ->rightJoin('positions', 's.id', '=', 'positions.user_id')
        ->where('positions.user_id', Auth::user()->id)
        ->get();
        
        $position = $user[0]->positions;

       
        $products = Product::selectRaw("
        p.*, 
        CASE 
            WHEN p.price IS NULL THEN 'UNAVAILABLE'
            ELSE 'AVAILABLE'
        END AS Remarks
        ")
        ->from("products as p")
        ->where("user_id", Auth::user()->id)
        ->orderByDesc('id') // Assuming 'id' is the column to sort by
        ->simplePaginate(5);

        $requestProd = Product::selectRaw("
        p.image AS image, 
        p.product_name AS prod_name, 
        r.quantity as quantity,
        p.created_at as created_at,
        CASE WHEN p.quantity IS NULL or p.price is null THEN 'PENDING'
             ELSE 'ACTIVE'
        END AS Remarks
        ")
        ->from("products as p")
        ->leftJoin("product_requests as r", "p.id", "r.product_id")
        ->orderByDesc("p.id")
        ->where("r.user_id", Auth::user()->id)
        ->get();

    

         return response()->json([
            'requestProduct' => $requestProd,
            'products' => $products,
            'positions' => $position,
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

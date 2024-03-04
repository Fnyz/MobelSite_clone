<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;


class RequestController extends Controller
{
    //
  
    public function showRequest(){

        $user = User::select("s.email as email", "p.employee_position as position" , "p.user_id as user_id")
        ->from("users as s")
        ->join("positions as p", "s.id", "p.user_id")
        ->where("p.employee_position", "Staff")
        ->get();

        $product = Product::select("p.id as prod_id", "p.product_name as prod_name")
        ->from("products as p")
        ->where("p.user_id", Auth::user()->id)
        ->get();

        return view("pages.request", compact("user", "product"));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductRequest;
use Illuminate\Support\Facades\DB;

class ProductRequestController extends Controller
{
    //

    public function showRequest(){

        $user = User::select("s.email as email", "p.employee_position as position" , "p.user_id as user_id")
        ->from("users as s")
        ->join("positions as p", "s.id", "p.user_id")
        ->where("p.employee_position", "Staff")
        ->get();

        $product = DB::table(DB::raw('
            (SELECT p.id as prod_id, p.product_name as prod_name,
                CASE 
                    WHEN r.product_id IS NULL THEN "NOT REQUEST"
                    ELSE "REQUESTED"
                END as Status
            FROM products as p
            LEFT JOIN product_requests as r ON p.id = r.product_id
            WHERE p.user_id = ' . Auth::user()->id . ') as subquery
        '))
        ->where('Status', 'NOT REQUEST')
        ->get();

        return view("pages.request", compact("user", "product"));
    }

    public function store(Request $request){

        $formDataArray = $request->formDataArray;
   

        foreach ($formDataArray as $formData) {

            $pairs = explode('&', $formData);
            $data = [];

            foreach ($pairs as $pair) {
                list($key, $value) = explode('=', $pair);
                $data[urldecode($key)] = urldecode($value);
            }
            ProductRequest::create($data);
        }

        return response()->json([
            "message" => "Product request is successfully send!"
        ], 200);

    }
}

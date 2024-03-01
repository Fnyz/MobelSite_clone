<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    //

    public function showTransaction(){
        return view("pages.transaction");
    }

    
    public function showAddTransac(){
        return view("pages.transaction.transac");
    }


    public function getProductandSupplier(){

        $supplier = Supplier::select("id as supplier_id", "supp_company as supplier_name")->get();
        $product = Product::select("id as product_id", "product_name as product_name", "quantity as product_quan", "price as product_price")->where("user_id", Auth::user()->id)->get();

        $data = [
            "supplier" => $supplier,
            "product" => $product
        ];
        return response()->json($data,200);
        
    }
}

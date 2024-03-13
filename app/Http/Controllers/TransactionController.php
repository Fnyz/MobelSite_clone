<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\ProductRequest;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    //

    public function showTransaction(){

      

        $transactions = DB::table(DB::raw("
        (SELECT t.trans_code AS trans_code,
                s.supp_company AS supp_company,
                t.created_at AS date_ordered,
                CASE
                    WHEN t.trans_price IS NOT NULL THEN 'ORDERED'
                    ELSE 'SOME_OTHER_VALUE' 
                END AS remarks
        FROM transactions AS t
        JOIN suppliers AS s ON t.supplier_id = s.id
        GROUP BY t.trans_code, s.supp_company, t.created_at, t.trans_price) as subquery
        "))
        ->orderBy('trans_code', 'desc')
        ->simplePaginate(5);
        return view("pages.transaction", compact("transactions"));
    }

    public function showAddTransac(){
        return view("pages.Transaction.transac");
    }


    public function getProductandSupplier(){


        $supplier = Supplier::all();

        $transcode = ProductRequest::select("p.request_code as request_code")
        ->from("product_requests as p")
        ->where("p.user_id", Auth::user()->id)
        ->get();

        
        return response()->json([
            "supplier" => $supplier,
            "transcode" => $transcode,           
        ], 200);
    }

    public function search(Request $request){
        $trans = $request->input("query");

        $product = ProductRequest::selectRaw("
        r.product_id as id, p.product_name as prod_name, r.quantity as quantity, p.price as price
        ")
        ->from("product_requests as r")
        ->rightJoin("products as p", "r.product_id", "=", "p.id")
        ->where(function($query) use ($trans) {
            $query->where("r.user_id", Auth::user()->id)
                   ->whereNull("p.price")
                  ->where("r.request_code", $trans);
        })->get();

        
        return response()->json([
            "product"=> $product 
        ], 200);
    }


    public function store(Request $request){

       
        $formDataArray = $request->formDataArray;
        $trans_payment = $request->trans_payment;
    
        foreach ($formDataArray as $formData) {

            $pairs = explode('&', $formData);
       
            $data = [];

            foreach ($pairs as $pair) {
                list($key, $value) = explode('=', $pair);
                $data[urldecode($key)] = urldecode($value);
            }

         
            $product = Product::find($data["product_id"]);
            $product->price = $data["trans_price"];
            $product->quantity = $data["trans_quantity"];
            $product->save();

            Transaction::create([
                "user_id" => Auth::user()->id,
                "supplier_id" => $data["supplier_id"],
                "product_id" => $data["product_id"],
                "trans_code" => $data["trans_code"],
                "trans_quantity" => $data["trans_quantity"],
                "trans_price" => $data["trans_price"],
                "trans_payment" => $trans_payment,
            ]);

        }
        
        return response()->json([
            "message"=> "Transaction is being made!"
        ], 200);
    }


    public function records(Request $request){


        $trans = $request->input("transaction");

        $transactions = DB::table(DB::raw("
        (
            SELECT 
            s.supp_image AS image,
            s.supp_company AS supp_company, 
            s.supp_phone AS supp_phone, 
            t.trans_code AS trans_code,
            u.email AS email, 
            p.product_name AS prod_name, 
            t.trans_quantity AS quantity, 
            t.trans_price AS price,
            t.user_id AS user_id, 
            t.trans_price * t.trans_quantity AS subtotal,
            t.trans_payment AS payment,
            t.created_at AS trans_date
            FROM transactions AS t 
            inner join suppliers AS s ON t.supplier_id = s.id
            JOIN products AS p ON t.product_id = p.id
            JOIN users AS u ON t.user_id = u.id
            WHERE trans_code = '$trans'
        ) AS outer_query
        "))
        ->select("*", DB::raw("payment - subtotal as Total_change, SUM(subtotal) as Total"))
        ->get();


        return view("pages.Transaction.record", compact("transactions"));
    }


}

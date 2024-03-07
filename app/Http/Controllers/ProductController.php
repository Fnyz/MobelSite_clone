<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function showCreate(){
        return view("pages.create");
    }

    public function create(Request $request, Product $product){


        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'numeric',
            'price' => 'numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('Images', 'public');
       
        $user = Auth::user();
        $user->products()->create([
            'product_name' => $validatedData['product_name'],
            'description' => $validatedData['description'],
            'quantity' => null,
            'price' => null,
            'image' => $imagePath,
            'user_id' => Auth::user()->id,
        ]);


        return response()->json(['success' => 'Product created successfully.']);
        
    }

    public function showEdit(Product $product){
        return view('pages.edit', compact('product'));
    }

    public function edit(Request $request ,Product $product){

        $request->validate([
            'product_name' =>'string|max:255',
            'description' =>'string',
            'image' =>'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $user = Auth::user();
      
        $product = $user->products()->find($request->product->id);
    
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        $product->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
        ]);
      
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
        
   
            $imagePath = $request->file('image')->store('Images', 'public');
            $product->update([
                'image' => $imagePath,
               
            ]);
          
        }
        
        return response()->json(['success' => 'Product is updated successfully.']);
        
    }


    public function search(Request $request)
    {

              $query = $request->input('query');
        
            $user = User::select('positions.employee_position as positions')
            ->from('users as s')
            ->rightJoin('positions', 's.id', '=', 'positions.user_id')
            ->where('positions.user_id', Auth::user()->id)
            ->get();
            
            $position = $user[0]->positions;



            
    
            $products = Product::selectRaw("*, 
            CASE 
                WHEN p.quantity IS NULL OR p.price IS NULL THEN 'UNAVAILABLE'
                ELSE 'AVAILABLE'
            END AS Remarks
        ")
        ->from("products as p")
        ->where(function($a) use ($query) {
            $a->where("p.product_name", 'like', "%$query%")
                ->orWhere("p.description", 'like', "%$query%");
        })
        ->orderByDesc("p.id")
        ->simplePaginate(5);

          
            $productRequestPaginated = DB::table(DB::raw('(
                SELECT 
                    r.user_id as userId,
                    p.image AS image, 
                    p.product_name AS prod_name,
                    p.description, 
                    r.quantity as quantity,
                    p.created_at as created_at,
                    CASE 
                        WHEN p.quantity IS NULL OR p.price IS NULL THEN "PENDING"
                        ELSE "ACTIVE"
                    END AS Remarks
                FROM products p
                LEFT JOIN product_requests r ON p.id = r.product_id
                WHERE p.product_name LIKE "%'.$query.'%"
                OR p.description LIKE "%'.$query.'%"
            ) as result'))
            ->where('userId', Auth::user()->id)
            ->simplePaginate(5);

      
        

        return response()->json([
            'requestProduct' => $productRequestPaginated,
            'products' => $products,
            'positions' => $position,
            'pagination' =>  $position === "Employee" ? $products->links()->toHtml() : $productRequestPaginated->links()->toHtml(),
        ]);
      
      
    }


    public function delete(Product $product)
    {
        return $product->delete();
      
    }


}





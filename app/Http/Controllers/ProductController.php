<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

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

        $products = Product::where('product_name', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%")
                    ->simplePaginate(5);
    
       
        return response()->json([
            'products' => $products,
            'pagination' => $products->links()->toHtml(),
        ]);
    }


    public function delete(Product $product)
    {
        return $product->delete();
      
    }


}





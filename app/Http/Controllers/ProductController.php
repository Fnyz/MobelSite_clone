<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function showCreate(){
        return view("pages.create");
    }

    public function create(Request $request){

        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the image file
        $imagePath = $request->file('image')->store('Images', 'public');

        // Create a new post record
        Product::create([
            'product_name' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $imagePath,
            'user_id' => Auth::user()->id,
        ]);

        // Redirect with success message
        return redirect()->route("pages.dashboard")->with('success', 'Post created successfully');
        
    }
}





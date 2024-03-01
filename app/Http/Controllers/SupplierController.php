<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    //
    public function showSupplier(){
        return view("pages.supplier");
    }

    public function create(){
        return view("pages.supplier.create");
    }

    public function storeSupplier(Request $request) {

        $supp = $request->validate([
            'supp_company' => "required|string|max:225",
            "supp_address" => "required|string",
            "supp_phone" => "required|string|nullable",
            "supp_image" => "required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);
        
        $pathName = $request->file("supp_image")->store("Images", "public");

      $supp["supp_image"] = $pathName;

    
      Supplier::create($supp);


      return response()->json([
       "success"=>"Supplier is created successfully",
      ], 200);

    }

    public function getAllSupplier(Supplier $supplier){

        $supp = $supplier->orderBy("created_at", "DESC")->simplePaginate(5);
 
        return response()->json([
            "supp" => $supp,
            "pagination" => $supp->links()->toHTML()
        ], 200);
    }

    public function search(Request $request)
    {

 
        $query = $request->input('query');

        $result = Supplier::where("supp_company", "like", "%$query%")
        ->orWhere("supp_address", "like", "%$query%")->orderBy("created_at", "desc")->simplePaginate(5);

        $data = [
            "supp" => $result,
            "pagination" => $result->links()->toHTML(),
        ];

        $headers = [
            "content-type" => "application/json",
        ];

        return response()->json($data, 200, $headers);

    }

    public function delete(Supplier $supplier){
        return $supplier->delete();
    }


    public function showEdit(Supplier $supplier){
     
        return view("pages.supplier.edit", compact('supplier'));
    }


    public function edit(Request $request ,Supplier $supplier){

     

        $request->validate([
            'supp_company' => "required|string|max:225",
            "supp_address" => "required|string",
            "supp_phone" => "required|string|nullable",
            "supp_image" => "required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);
        
        $supplier->update([
            'supp_company' => $request->supp_company,
            'supp_address' => $request->supp_address,
            'supp_phone' => $request->supp_phone,
        ]);
      
        if ($request->hasFile('supp_image')) {
            if ($supplier->supp_image) {
                Storage::disk('public')->delete($supplier->supp_image);
            }
        
   

            $imagePath = $request->file('supp_image')->store('Images', 'public');

            $supplier->update([
                'supp_image' => $imagePath,
            ]);
          
        }
        
        return response()->json(['success' => 'Product is updated successfully.']);
        
    }

 

}

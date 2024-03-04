<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Position;

class PositionController extends Controller
{
    //

    public function showPosition () {
      
        $email;

        $user = User::select("s.email as email")
        ->selectRaw("
        case when p.employee_position is null then 'NO POSITION' 
        else p.employee_position
        end as employee_positions 
        ")
        ->from("users as s")
        ->leftJoin("positions as p","s.id","=","p.user_id")
        ->get()
        ->where("employee_positions", "NO POSITION");

        
        $positions = Position::select("employee_position", "s.email as email")
        ->from("positions as p")
        ->join("users as s", "s.id", "=", "p.user_id")
        ->where("employee_position", "Admin")
        ->get();

        foreach($positions as $position){
            $email = $position->email;
        }

    

        $isAdminSet = $positions->contains('employee_position', 'Admin',);
     
        return view("pages.position", compact("user", "isAdminSet", "email"));
    }

    public function create(Request $request) {

        $positionVal = $request->validate([
            "employee_position" => "required|string"
        ]);
       
        Position::create([
            "user_id" => $request->user_id,
            "employee_position" => $positionVal["employee_position"],
        ]);
        return response()->json([
            "message" => "Position is created successfully."
        ], 200);
    }
}

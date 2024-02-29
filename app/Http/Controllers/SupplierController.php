<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //

    public function showSupplier() {
        return view("pages.supplier");
    }

    public function create() {
        return view("pages.supplier.create");
    }
}

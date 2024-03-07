<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "supplier_id",
        "product_id" ,
        "trans_code" ,
        "trans_quantity",
        "trans_price",
        "trans_payment" ,
    ];
}

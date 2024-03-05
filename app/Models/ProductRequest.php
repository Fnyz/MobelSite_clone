<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "product_id",
        "quantity",
        "request_code"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function products(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'id');
    }

}

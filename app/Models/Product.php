<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

     protected $fillable = [
        'product_name', 'description', 'quantity', 'price', 'image', 'user_id'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }


}

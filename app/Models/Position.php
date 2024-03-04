<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        "employee_position",
        "user_id"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }
 
}

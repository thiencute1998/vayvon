<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'position', 'business','interest_in', 'message'];

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}

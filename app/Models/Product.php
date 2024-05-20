<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ["name", "slug", "status", "content", "type", "title", "keywords", "description", "image"];

    public $timestamps = true;

    public function productDetails() {
        return $this->hasMany(ProductDetail::class, 'product_id', 'id');
    }
}

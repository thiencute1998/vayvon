<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{

    protected $fillable = ["product_id", "name", "image", "link"];

    use HasFactory;

    public $timestamps = false;
}

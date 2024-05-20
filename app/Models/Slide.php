<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = ["image", "status", "name","content"];

    use HasFactory;

    public $timestamps = true;
}

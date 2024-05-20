<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = ["image", "status","link"];
    use HasFactory;

    public $timestamps = true;
}

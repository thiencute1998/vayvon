<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'about_us';
    protected $fillable = ['about',	'contact', 'quoteimg', 'quote', 'map',	'products',	'applications'];

    public $timestamps = false;
}

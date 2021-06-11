<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
     protected $fillable = [
        'name', 'address', 'email', 'tel', 'img'
    ];
}

<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
   //  use HasFactory;

     protected $fillable = [
        'name', 'num_s', 'price', 'qte', 'img','category_id', 'location_id', 'provider_id'
    ];
     
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
     protected $fillable = [
        'Name', 'Price', 'Image','category_id'
    ];
}

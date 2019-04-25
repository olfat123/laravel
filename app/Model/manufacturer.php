<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class manufacturer extends Model
{
    protected $table  = 'manufacturers';
    protected $fillable = [
    	'manufacturer_name',    	   	
    ];
}

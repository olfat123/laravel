<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    protected $table  = 'vendors';
    protected $fillable = [
    	'vendor_name',    	   	
    ];
}

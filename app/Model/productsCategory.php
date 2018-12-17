<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class productsCategory extends Model
{
    protected $table  = 'productsCategories';
    protected $fillable = [
    	'name_ar',
    	'name_en',
    	'icon',
    	'description',
    	'keyword',
    	'parent_id'  	
    ];

    public function parents(){
    	return $this->hasMany('productsCategory', 'id', 'parent_id');
    }
    
}

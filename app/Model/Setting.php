<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table  = 'setting';
    protected $fillable = [
    	'sitename_ar',
    	'sitename_en',
    	'logo',
    	'icon',
    	'email',
    	'description',
    	'keywords',
    	'status',
    	'message_maintenance',
    	'main_lang'
    ];
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Upload extends Controller
{
   public function upload($request, $path, $new_name = null){
   	$new_name = $new_name === null ?time():$new_name;
   }
}

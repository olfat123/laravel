<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
class Upload extends Controller
{
	
   public static function upload($data = []){
   	$new_name = $data['new_name']  === null?time():$data['new_name'];
   	if (request()->hasFile($data['file']) && $data['upload_type'] == 'single') {
   		!empty($data['delete_file'])?Storage::delete($data['delete_file']):'';
   		return request()->file($data['file'])->store($data['path']);
   	}
   }
}

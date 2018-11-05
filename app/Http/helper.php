<?php

if(!function_exists('setting')){
	function setting(){
		return \App\Setting::orderBy('id', 'desc')->first();
	}
}

if (!function_exists('lang')) {
	function lang(){
		if(session()->has('lang')){
			return session('lang');
		}else{
			return setting()->main_lang;
		}
	}
}

/////////////validate functions///////
if (!function_exists('validate_image')) {
	function validate_image($ext = null){
		if($ext === null){
			return 'image|mimes:jpg,jpeg,png,gif';
		}else{
			return 'image|mimes:'.$ext;
		}
		
	}
}

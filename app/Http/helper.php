<?php

if(!function_exists('setting')){
	function setting(){
		return \App\Setting::orderBy('id', 'desc')->first();
	}
}

if(!function_exists('load_cat')){
	function load_cat($select = null){
		$cats = \App\productsCategory::selectRaw('name_'.session('lang').' as text')->selectRaw('id as id')->selectRaw('parent as parent')->get(['text','parent','id']);
		$cat_arr = [];
		foreach ($cats as $cat) {
			$list = [];
			if ($select !=null and $select == $cat->id) {
				
				$list['icon'] = '';
				$list['li_attr'] = '';
				$list['a_attr'] = '';
				$list['children'] = [];
				$list['state'] = [
					'opened' =>true,
					'selected' =>true,
				];
			}	

			$list['id'] = $cat->id;
			$list['parent'] = $cat->parent !== null? $cat->paent : '#';
			$list['text'] = $cat->text	;
			array_push($cat_arr, $list_arr);

		}
		return json_encode($cat_arr, JSON_UNESCAPED_UNICODE);
	}
}
if(!function_exists('country')){
	function country(){
		return \App\Country::orderBy('id', 'desc')->first();
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

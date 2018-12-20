<?php

if(!function_exists('setting')){
	function setting(){
		return \App\Model\Setting::orderBy('id', 'desc')->first();
	}
}

if(!function_exists('load_cat')){
	function load_cat($select = null){
		$cats = \App\Model\productsCategory::selectRaw('name_'.session('lang').' as text')
		->selectRaw('id as id')
		->selectRaw('parent as parent')
		->get(['text','parent','id']);
		$cat_arr = [];
		foreach ($cats as $cat) {
			$list_arr = [];
			if ($select !== null and $select == $cat->id) {
				
				$list_arr['icon']    = '';
				$list_arr['li_attr'] = '';
				$list_arr['a_attr']  = '';
				$list_arr['children'] = [];
				$list_arr['state']   = [
					'opened'   =>true,
					'selected' =>true,
				];
			}	

			$list_arr['id'] = $cat->id;
			$list_arr['parent'] = $cat->parent > 0?$cat->parent:'#';
			$list_arr['text'] = $cat->text	;
			array_push($cat_arr, $list_arr);

		}
		return json_encode($cat_arr, JSON_UNESCAPED_UNICODE);
	}
}
if(!function_exists('country')){
	function country(){
		return \App\Model\Country::orderBy('id', 'desc')->first();
	}
}

if (!function_exists('lang')) {
	function lang(){
		if(session()->has('lang')){
			return session('lang');
		}else{
			session()->put('lang',setting()->main_lang);
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

<?php 



Route::group(['namespace'=>'Admin'],function(){
	Route::get('/admin/login', 'AdminAuth@login');
	Config::set('auth.defines', 'admin');
	

		//Route::group(['middleware'=>'admin'], function(){
			
			Route::get('/admin', function () {
		   	 return view('admin.home');
			});

			Route::resource('/admin/users', 'UserController');
			Route::resource('/admin/products', 'ProductController');
			Route::resource('/admin/orders', 'OrderController');
			Route::resource('/admin/cities', 'CityController');
			Route::resource('/admin/states', 'StateController');
			Route::resource('/admin/countries', 'CountryController');			
			Route::get('/admin/settings','Settings@setting');
			Route::post('/admin/settings','Settings@save_setting');
			Route::get('/admin/lang/{lang}', function($lang){
				if(session()->has('lang')){
					session()->forget('lang');
				}
				if($lang == 'ar'){
					session()->put('lang','ar');
				}else{
					session()->put('lang','en');
				}
				return back();
			});
		//});

});
	
	

?>
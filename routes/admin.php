<?php 



Route::group(['namespace'=>'Admin'],function(){
	Route::get('/admin/login', 'AdminAuth@login');
	Config::set('auth.defines', 'admin');
	

		//Route::group(['middleware'=>'admin'], function(){
			
			Route::get('/admin', function () {
		   	 return view('admin.home');
			});

			Route::resource('/admin/users', 'UserController');
			Route::delete('users/destroy/all', 'UserController@multi_delete');

			Route::resource('/admin/products', 'ProductController');
			Route::delete('users/destroy/all', 'ProductController@multi_delete');

			Route::resource('/admin/orders', 'OrderController');
			Route::delete('users/destroy/all', 'OrderController@multi_delete');

			Route::resource('/admin/cities', 'CityController');
			Route::delete('users/destroy/all', 'CityController@multi_delete');

			Route::resource('/admin/states', 'StateController');
			Route::delete('users/destroy/all', 'StateController@multi_delete');

			Route::resource('/admin/productsCategory', 'ProductsCategoryController');
			Route::delete('users/destroy/all', 'ProductsCategoryController@multi_delete');

			Route::resource('/admin/countries', 'CountryController');
			Route::delete('users/destroy/all', 'CountryController@multi_delete');

			Route::resource('/admin/colors', 'ColorController');
			Route::delete('users/destroy/all', 'ColorController@multi_delete');

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
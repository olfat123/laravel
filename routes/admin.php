<?php 



Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){

	Config::set('auth.defines', 'admin');
	

		Route::group(['middleware'=>'admin'], function(){
			
			Route::get('/', function () {
		   	 return view('admin.home');
			});

			

		});

});
	
	

?>
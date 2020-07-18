<?php
/*
Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], 
function()
{ 

	Route::prefix('dashboard')->name('dashboard.')->group(function() {

  
		Route::get('/index','DashboardController@index')->name('index');


		});//end of dashboard routes

}); //... end function
*/
Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function() {

 
		//Route::get('/index','DashboardController@index')->name('index');
		Route::get('/', 'WelcomeController@index')->name('welcome');

		//user route
		Route::resource('users','UserController')->except('show');
		//category routes
        Route::resource('categories', 'CategoryController')->except(['show']);
        //product routes
        Route::resource('products', 'ProductController')->except(['show']);
        Route::get('/percent', 'ProductController@percent')->name('products.percent');

        //client routes
        Route::resource('clients', 'ClientController')->except(['show']);
        Route::resource('clients.orders', 'Client\OrderController')->except(['show']);
        //order routes
        Route::resource('orders', 'OrderController');
        Route::get('/orders/{order}/products', 'OrderController@products')->name('orders.products');
        //reports routes
        Route::resource('reports', 'RepoerController');
        Route::get('logout','Auth\LoginController@userLogout')->name('user.logout');

 
});//end of dashboard routes
 
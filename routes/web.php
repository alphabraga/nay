<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


Auth::routes();

Route::middleware('auth')->group(function ()
{
	Route::get('/', 'HomeController@index')->name('home');

	Route::get('/pagina', 'HomeController@pagina');

	Route::resource('configuration', 'ConfigurationController');

	Route::resource('carrinho', 'CartController');

	Route::post('checkout', 'CartController@checkout');	
	Route::get('carrinhoTotal', 'CartController@total');
	Route::get('carrinhoSubTotal', 'CartController@subtotal');
	Route::get('carrinhoClear', 'CartController@clear');
	Route::get('carrinhoQuantity', 'CartController@totalquantity');
	Route::get('carrinhoIsEmpty', 'CartController@isempty');

	Route::resource('clients', 'ClientsController');
	Route::get('clientsSearch', 'ClientsController@search');


	Route::resource('products', 'ProductsController');
	Route::get('productsSearch', 'ProductsController@search');
	Route::get('productsSearchCart', 'ProductsController@searchCart');

	Route::resource('brands', 'BrandsController');
	Route::get('brandsSearch', 'BrandsController@search');

	Route::resource('categories', 'CategoriesController');
	Route::get('categoriesSearch', 'CategoriesController@search');

	Route::resource('providers', 'ProvidersController');
	Route::get('providersSearch', 'ProvidersController@search');

	Route::resource('shippingcompany', 'ShippingCompanyController');
	Route::get('shippingcompanySearch', 'ShippingCompanyController@search');

	Route::resource('orders', 'OrdersController');
	Route::get('ordersSearch', 'OrdersController@search');

	Route::resource('users', 'UsersController');
	Route::get('usersSearch', 'UsersController@search');

	Route::get('/system', 'ConfigurationController@system');

	Route::get('perfil', 'UsersController@profile');

	Route::get('/sobre', 'ConfigurationController@about');

	Route::post('updateAnotherPassword', 'UsuarioController@updateAnotherPassword');

	Route::post('uploadImage', 'CategoriesController@uploadImage');

	Route::get('/backup', 'ConfigurationController@backupPage');

	Route::get('/backupList', 'ConfigurationController@backupList');
	Route::get('/backupMonitor', 'ConfigurationController@backupMonitor');
	Route::get('/backupClean', 'ConfigurationController@backupClean');
	Route::get('/backupRun', 'ConfigurationController@backupRun');
	Route::get('/showBackups', 'ConfigurationController@showBackups');
	Route::get('/downloadBackup/{fileName}', 'ConfigurationController@downloadBackup');
	

});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
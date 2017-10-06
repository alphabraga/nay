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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/pagina', 'HomeController@pagina');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('configuration', 'ConfigurationController');

Route::resource('carrinho', 'CartController');
Route::get('carrinhoTotal', 'CartController@total');
Route::get('carrinhoSubTotal', 'CartController@subtotal');
Route::get('carrinhoClear', 'CartController@clear');
Route::get('carrinhoQuantity', 'CartController@totalquantity');
Route::get('carrinhoIsEmpty', 'CartController@isempty');


Route::resource('products', 'ProductsController');
Route::get('productsSearch', 'ProductsController@search');

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

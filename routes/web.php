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
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Admin Panel Routes
Route::get('/salesReport', 'SellController@salesReport');
Route::get('/transactionDetails/{id}','SellOperationController@transactionDetails');
Route::resource('/expense', 'ExpenseController');
Route::get('/assets', 'ProductController@assets');
Route::resource('/employees', 'EmployeeController');
Route::get('/addEmployee', 'EmployeeController@create');
Route::get('/contacts', 'EmployeeController@contacts');
Route::resource('/revenue', 'RevenueController');
Route::resource('/orders', 'OrderController');
Route::get('/allOrders', 'OrderController@allOrders');
Route::resource('/balance', 'BalanceController');

// User Operation Routes
Route::get('/deleteUser/{id}','UserOperationController@destroy');
Route::get('/addUser','UserOperationController@index');
Route::get('/editUser/{id}','UserUpdateController@show');
Route::post('/editUser/{id}','UserUpdateController@edit');


// Seller Routes
Route::get('/category', 'CategoryController@index')->name('category');
Route::post('/addCategory', 'CategoryController@store')->name('addCategory');
Route::get('/deleteCategory/{id}','CategoryController@destroy')->name('deleteCategory/{id}');
Route::get('/editCategory/{id}','CategoryController@show')->name('editCategory/{id}');
Route::post('/editCategory/{id}','CategoryController@edit')->name('editCategory/{id}');


Route::get('/product', 'ProductController@index')->name('product');
Route::get('/addProduct', 'ProductController@create')->name('addProduct');
Route::post('/saveProduct', 'ProductController@store')->name('saveProduct');
Route::get('/deleteProduct/{id}','ProductController@destroy')->name('deleteProduct/{id}');
Route::get('/product/{id}','ProductController@info')->name('product/{id}');
Route::get('/editProduct/{id}','ProductController@show')->name('editProduct/{id}');
Route::post('/editProduct/{id}','ProductController@edit')->name('editProduct/{id}');
Route::post('/search', 'SearchController@search')->name('search');

Route::get('/customer', 'CustomerController@index')->name('customer');
Route::post('/addCustomer', 'CustomerController@store')->name('addCustomer');
Route::get('/deleteCustomer/{id}','CustomerController@destroy')->name('deleteCustomer/{id}');
Route::get('/editCustomer/{id}','CustomerController@show')->name('editCustomer/{id}');
Route::post('/editCustomer/{id}','CustomerController@edit')->name('editCustomer/{id}');



// Seller Panele Routes
Route::get('/sales', 'SellController@index')->name('sales');
Route::post('/newSell', 'SellController@store')->name('newSell');
Route::get('/salesList', 'SellController@salesList')->name('salesList');
Route::get('/salesDetails', 'salesItemController@index')->name('salesDetails');
Route::post('/saveSell', 'salesItemController@store')->name('saveSell');
Route::get('/addDiscount', 'SellController@addDiscount')->name('addDiscount');
Route::get('/delete/{id}','SellController@destroy')->name('delete/{id}');
Route::get('/edit/{id}','SellOperationController@show')->name('edit/{id}');
Route::post('/edit/{id}','SellOperationController@edit')->name('edit/{id}');
Route::get('/print','SellOperationController@print')->name('print');
Route::get('/printInvioce/{id}','SellOperationController@printInvioce')->name('printInvioce/{id}');

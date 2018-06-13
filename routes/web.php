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

Auth::routes();
//stock
Route::get('/home', 'HomeController@index');

Route::get('create/stock','StockController@create')->name('create.stock');
Route::post('post/stock','StockController@store')->name('post.stock');


Route::get('viewstock','StockController@show')->name('view.stock');
Route::post('shift/to/cleaning','StockController@shiftCleaning')->name('shift.cleaning');
//color

Route::get('get/color','ColorController@create')->name('create.color');
Route::post('post/color','ColorController@store')->name('store.color');
Route::post('edit/color','ColorController@edit')->name('edit.color');
//token

Route::get('get/token','TokenController@create')->name('create.token');
Route::post('post/token','TokenController@store')->name('store.token');
Route::post('edit/token','TokenController@edit')->name('edit.token');
//serial
Route::get('serial/create','SerialController@create')->name('create.serial');
Route::post('serial/store','SerialController@store')->name('store.serial');
Route::post('serial/edit','SerialController@edit')->name('edit.serial');
Route::get('serial/delete/{id}','SerialController@delete')->name('delete.serial');

//cleaning depart

Route::get('get/unclean/stock','CleaningController@unClean')->name('get.unclean');
Route::get('get/clean/stock','CleaningController@clean')->name('get.clean');
Route::post('get/clean/edit','CleaningController@shiftCoating')->name('shift.coating');


//coated
Route::get('get/coated/stock','CoatController@uncoat')->name('get.uncoat');
Route::get('get/coat/stock','CoatController@coat')->name('get.coat');
Route::post('get/coat/finish','CoatController@shiftFinish')->name('shift.finish');

//invoice

Route::get('create/invoice/{id}','InvoiceController@create')->name('create.invoice');
Route::get('get/store/invoice/{id}','InvoiceController@getStore')->name('getstore.invoice');
Route::post('post/store/invoice/','InvoiceController@postStore')->name('poststore.invoice');
//generate invoices
Route::get('get/customer/invoice','InvoiceController@getCustomerInvoice')->name('get.customer.invoice');
Route::post('post/customer/invoice','InvoiceController@postCustomerInvoice')->name('post.customer.invoice');



//get price for stock entry

Route::get('get/price','StockController@getPrice')->name('get.price');
//add items using price controller.
Route::get('/get/product','PriceController@getProduct')->name('get.product');
Route::post('/post/product','PriceController@postProduct')->name('store.product');
Route::post('/edit/product','PriceController@edit')->name('edit.product');
Route::get('/del/product/{id}','PriceController@delete')->name('delete.product');



//add size
Route::get('/get/size','SizeController@getSize')->name('get.size');
Route::post('/post/size','SizeController@postSize')->name('store.size');
Route::post('/edit/size','SizeController@edit')->name('edit.size');
Route::get('/del/size/{id}','SizeController@delete')->name('delete.size');
//setting price using price contoller
Route::get('/get/product/price','PriceController@getProductPrice')->name('get.product.price');
Route::post('/post/product/price','PriceController@postProductPrice')->name('post.product.price');
Route::get('/delete/product/price/{id}','PriceController@deleteProductPrice')->name('delete.product.price');
Route::post('/edit/product/prices','PriceController@editProductPrice')->name('edit.product.price');

//due list

Route::get('due/customer','CustomerController@getCustomer')->name('get.customer');

Route::get('all/invoices/{id}','CustomerController@allInvoice')->name('all.invoice');
Route::get('due/it/invoices','DueController@create')->name('due.list');
Route::get('/it/invoices/bill/{id}','DueController@recieve')->name('recieve.it');
Route::post('post/it/invoices/bill','DueController@postRecieve')->name('post.recieve.it');
Route::get('get/payment/detail/{id}','DueController@recieveDetail')->name('recieve.detail');


//auto search

Route::get('get/customer/search','CustomerController@search')->name('autosearch');



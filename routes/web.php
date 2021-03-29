<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\Controloflinen_controller;

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

// membuat registrasi user
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
     return redirect('dashboard');
});

Route::group(['middleware'=>'auth'],function() 
{

	Route::get('dashboard','Dashboard_controller@index');

	// laundry package
	Route::get('laundry-package','Paket_controller@index');

	Route::get('laundry-package/add','Paket_controller@add');
	Route::post('laundry-package/add','Paket_controller@store');

	Route::get('laundry-package/{id}','Paket_controller@edit');
	Route::put('laundry-package/{id}','Paket_controller@update');

	Route::delete('laundry-package/{id}','Paket_controller@delete');

	// customer 
	Route::get('customer','Customer_controller@index');
	Route::get('customer/add','Customer_controller@add');
	Route::post('customer/add','Customer_controller@store');

	Route::get('customer/{id}','Customer_controller@edit');
	Route::put('customer/{id}','Customer_controller@update');

	Route::delete('customer/{id}','Customer_controller@delete');

	// master order status
	Route::get('order-status','Status_pesanan_controller@index');

	Route::get('order-status/add','Status_pesanan_controller@add');
	Route::post('order-status/add','Status_pesanan_controller@store');

	Route::get('order-status/{id}','Status_pesanan_controller@edit');
	Route::put('order-status/{id}','Status_pesanan_controller@update');

	Route::delete('order-status/{id}','Status_pesanan_controller@delete');

	// master payment_status
	Route::get('payment-status','Status_pembayaran_controller@index');

	Route::get('payment-status/add','Status_pembayaran_controller@add');
	Route::post('payment-status/add','Status_pembayaran_controller@store');

	Route::get('payment-status/{id}','Status_pembayaran_controller@edit');
	Route::put('payment-status/{id}','Status_pembayaran_controller@update');

	Route::delete('payment-status/{id}','Status_pembayaran_controller@delete');

	// modul transaction orders
	Route::get('transaction-orders','T_pesanan_controller@index');
	Route::get('transaction-orders/periode','T_pesanan_controller@periode');

	Route::get('transaction-orders/add','T_pesanan_controller@add');
	Route::post('transaction-orders/add','T_pesanan_controller@store');

	Route::get('transaction-orders/{id}','T_pesanan_controller@edit');
	Route::put('transaction-orders/{id}','T_pesanan_controller@update');

	Route::delete('transaction-orders/{id}','T_pesanan_controller@delete');

	Route::get('transaction-orders/naikkan-status/{id}','T_pesanan_controller@naikkan_status');
	Route::get('transaction-orders/naikkan-status-pembayaran/{id}','T_pesanan_controller@naikkan_status_pembayaran');

	Route::get('transaction-orders/print/{id}','T_pesanan_controller@export');
	Route::get('laporant_pesanan','T_pesanan_controller@cetakLaporan')->name('data-laporan');

	// route nama usaha
	Route::get('nama-usaha','Profile_controller@index');
	Route::put('nama-usaha','Profile_controller@update');

	// manage employee
	Route::get('employee','Karyawan_controller@index');

	Route::get('employee/add','Karyawan_controller@add');
	Route::post('employee/add','Karyawan_controller@store');

	Route::get('employee/{id}','Karyawan_controller@edit');
	Route::put('employee/{id}','Karyawan_controller@update');

	Route::delete('employee/{id}','Karyawan_controller@delete');

	// controloflinen
	Route::get('controloflinen','Controloflinen_controller@index');

	Route::get('controloflinen/add','Controloflinen_controller@add');
	Route::post('/submitData','Controloflinen_controller@submitData')->name('submitData');
	Route::post('controloflinen/add','Controloflinen_controller@store');

	Route::get('controloflinen/edit{id}','Controloflinen_controller@edit');
	Route::put('controloflinen/edit{id}','Controloflinen_controller@update');

	Route::delete('controloflinen/{id}','Controloflinen_controller@delete');

	Route::get('controloflinen/print/{id}','Controloflinen_controller@export');
	Route::get('laporan','Controloflinen_controller@cetakLaporan')->name('data-laporan');

	Route::get('controloflinen/{id}','Controloflinen_controller@show')->name('show-ctr');

	// linenstock
	Route::get('linenstock','Linenstock_controller@index');

	Route::get('linenstock/add','Linenstock_controller@add');
	Route::post('/submitData','Linenstock_controller@submitData')->name('submitData');
	Route::post('linenstock/add','Linenstock_controller@store');

	Route::get('linenstock/{id}','Linenstock_controller@edit');
	Route::put('linenstock/{id}','Linenstock_controller@update');

	Route::delete('linenstock/{id}','Linenstock_controller@delete');

	Route::get('linenstock/print/{id}','Linenstock_controller@export');
	Route::get('laporanlinenstock','Linenstock_controller@cetakLaporan')->name('data-laporan');

	Route::get('linenstock/{id}','Linenstock_controller@show')->name('show-linen');

	// menu
	Route::get('minibar-menu','Menu_controller@index');

	Route::get('minibar-menu/add','Menu_controller@add');
	Route::post('minibar-menu/add','Menu_controller@store');

	Route::get('minibar-menu/{id}','Menu_controller@edit');
	Route::put('minibar-menu/{id}','Menu_controller@update');

	Route::delete('minibar-menu/{id}','Menu_controller@delete');

	// minibardaily
	Route::get('minibardaily','Minibardaily_controller@index');
	Route::get('minibardaily/periode','Minibardaily_controller@periode');
	Route::post('/cetak-data-pertanggal','Minibardaily_controller@cetakPegawaiPertanggal')->name('cetak-data-pertanggal');

	Route::get('minibardaily/add','Minibardaily_controller@add');
	Route::post('minibardaily/add','Minibardaily_controller@store');

	Route::get('minibardaily/{id}','Minibardaily_controller@edit');
	Route::put('minibardaily/{id}','Minibardaily_controller@update');

	Route::delete('minibardaily/{id}','Minibardaily_controller@delete');

	Route::get('minibardaily/print/{id}','Minibardaily_controller@export');
	Route::get('/cetak','Minibardaily_controller@cetakLaporan')->name('data-laporan');

	// floorreports
	Route::get('floorreports','Floorreport_controller@index');

	Route::get('floorreports/add','Floorreport_controller@add');
	Route::post('floorreports/add','Floorreport_controller@store');

	Route::get('floorreports/{id}','Floorreport_controller@edit');
	Route::put('floorreports/{id}','Floorreport_controller@update');

	Route::delete('floorreports/{id}','Floorreport_controller@delete');

	Route::get('/cetak-laporan','Floorreport_controller@cetakLaporan')->name('data-laporan');

	Route::get('floorreports/print/{id}','Floorreport_controller@export');

	// drycleaning
	Route::get('drycleaning','Drycleaning_controller@index');

	Route::get('drycleaning/add','Drycleaning_controller@add');
	Route::post('drycleaning/add','Drycleaning_controller@store');

	Route::get('drycleaning/{id}','Drycleaning_controller@edit');
	Route::put('drycleaning/{id}','Drycleaning_controller@update');

	Route::delete('drycleaning/{id}','Drycleaning_controller@delete');

	Route::get('drycleaning/print/{id}','Drycleaning_controller@export');
	Route::get('laporandrycleaning','Drycleaning_controller@cetakLaporan')->name('data-laporan');

	// minibar
	// Route::get('minibar','MinibarController@home');
	// Route::post('/orders','OrderController@store');

	// Route::get('/orders','OrderController@index');
	// Route::get('/items/{id}','OrderController@items');
//
	Route::get('orders','OrderController@index');

	Route::get('orders/add','OrderController@add');
	Route::post('/orders','OrderController@store');

	Route::get('items/{id}','OrderController@items');
	Route::put('drycleaning/{id}','Drycleaning_controller@update');

	Route::delete('items/{id}','OrderController@delete');

	//product
	Route::get('/product','ProductController@index');

	Route::get('/product/create','ProductController@create');
	Route::post('/product/create','ProductController@store');

	Route::get('/product/{id}','ProductController@edit');
	Route::put('/product/{id}','ProductController@update');

	Route::delete('product/{id}','ProductController@delete');

	//orderrs
	Route::get('orderrs','OrderrController@index');

	Route::get('orderrs/periode','OrderrController@periode');
	Route::post('orderrs/laporan','OrderrController@pertanggal')->name('orderrs.pertanggal');

	Route::get('orderrs/add','OrderrController@add');
	Route::post('orderrs/add','OrderrController@store');

	Route::get('orderrs/edit{id}','OrderrController@edit')->name('order.edit');
	Route::put('orderrs/edit{id}','OrderrController@update')->name('order.update');

	Route::delete('orderrs/delete{id}','OrderrController@delete');
	Route::delete('orderrs/destroy{id}','OrderrController@destroy');

	Route::get('orderrs/hapus','OrderrController@hapus')->name('orderrs.hapus');
	
	Route::get('orderrs/detail/{id}', 'OrderrController@show')->name('orderrs.detail');

	Route::get('orderrs/print/{id}','OrderrController@export');
	
	Route::get('orderrs/laporan/{id}','OrderrController@laporan')->name('orderrs.laporan');

	Route::resource('/product', 'ProductController');
	Route::resource('/category', 'CategoryController');
	Route::resource('/orderrs', 'OrderrController');
	Route::resource('/sales', 'SaleController');
	Route::resource('/settings', 'SettingController');
	Route::get('/shop', function()
	{
		return view('shop.index');
	});

	// room
	Route::get('room','RoomController@index');

	Route::get('room/add','RoomController@add');
	Route::post('room/add','RoomController@store');

	Route::get('room/{id}','RoomController@edit');
	Route::put('room/{id}','RoomController@update');

	Route::delete('room/{id}','RoomController@delete');

	Route::get('floor_report','RoomController@laporan')->name('room.laporan');

	// controls
	Route::get('controls','ControlController@index');

	Route::get('controls/add','ControlController@add');
	Route::post('controls/add','ControlController@store');

	Route::get('controls/edit{id}','ControlController@edit');
	Route::put('controls/edit{id}','ControlController@update');

	Route::delete('controls/delete{id}','ControlController@delete');
	Route::delete('controls/destroy{id}','ControlController@destroy');

	Route::get('controls/hapus','ControlController@hapus')->name('controls.hapus');

	Route::get('controls/detail/{id}', 'ControlController@show')->name('controls.detail');

	Route::get('controls/laporan/{id}','ControlController@laporan')->name('controls.laporan');

	// damages
	Route::get('damages','DamageController@index');

	Route::get('damages/add','DamageController@add');
	Route::post('damages/add','DamageController@store');

	Route::get('damages/edit{id}','DamageController@edit');
	Route::put('damages/edit{id}','DamageController@update');

	Route::delete('damages/delete{id}','DamageController@delete');
	Route::delete('damages/destroy{id}','DamageController@destroy');

	Route::get('damages/hapus','DamageController@hapus')->name('damages.hapus');

	Route::get('damages/detail/{id}', 'DamageController@show')->name('damages.detail');

	Route::get('damages/laporan/{id}','DamageController@laporan')->name('damages.laporan');

	//packages
	Route::get('/packages','PackageController@index');

	Route::get('/packages/create','PackageController@create');
	Route::post('/packages/create','PackageController@store');

	Route::get('/packages/{id}','PackageController@edit');
	Route::put('/packages/{id}','PackageController@update');

	Route::delete('packages/{id}','PackageController@delete');

	//drycleanings
	Route::get('drycleanings','DrycleaningController@index');

	Route::get('drycleanings/add','DrycleaningController@add');
	Route::post('drycleanings/add','DrycleaningController@store');

	Route::get('drycleanings/edit{id}','DrycleaningController@edit')->name('drycleanings.edit');
	Route::put('drycleanings/edit{id}','DrycleaningController@update')->name('drycleanings.update');

	Route::delete('drycleanings/delete{id}','DrycleaningController@delete');
	Route::delete('drycleanings/destroy{id}','DrycleaningController@destroy');

	Route::get('drycleanings/hapus','DrycleaningController@hapus')->name('drycleanings.hapus');
	
	Route::get('drycleanings/detail/{id}', 'DrycleaningController@show')->name('drycleanings.detail');

	Route::get('drycleanings/print/{id}','DrycleaningController@export');
	
	Route::get('drycleanings/laporan/{id}','DrycleaningController@laporan')->name('drycleanings.laporan');

	// customers 
	Route::get('customers','CustomerController@index');
	Route::get('customers/add','CustomerController@add');
	Route::post('customers/add','CustomerController@store');

	Route::get('customers/{id}','CustomerController@edit');
	Route::put('customers/{id}','CustomerController@update');

	Route::delete('customers/{id}','CustomerController@delete');

	//transactions
	Route::get('transactions','TransactionController@index');

	Route::get('transactions/add','TransactionController@add');
	Route::post('transactions/add','TransactionController@store');

	Route::get('transactions/edit{id}','TransactionController@edit')->name('transactions.edit');
	Route::put('transactions/edit{id}','TransactionController@update')->name('transactions.update');

	Route::delete('transactions/delete{id}','TransactionController@delete');
	Route::delete('transactions/destroy{id}','TransactionController@destroy');

	Route::get('transactions/hapus','TransactionController@hapus')->name('transactions.hapus');
	
	Route::get('transactions/detail/{id}', 'TransactionController@show')->name('transactions.detail');

	Route::get('transactions/print/{id}','TransactionController@export');
	
	Route::get('transactions/laporan/{id}','TransactionController@laporan')->name('transactions.laporan');

});

Auth::routes();

Route::get('/home', function(){
	return redirect('dashboard');
});

Route::get('keluar',function(){
	\Auth::logout();
	return redirect('login');
});

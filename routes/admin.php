<?php

use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\OriginController;
use App\Http\Controllers\admin\PaymentTypeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\admin\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\PurchaseController;
use App\Http\Controllers\admin\SaleController;
use App\Http\Controllers\admin\CustomerController;

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard','\App\Http\Controllers\admin\DashboardController@index');
    Route::resource('/category',CategoryController::class,['as'=>'admin']);
    Route::resource('/brand',BrandController::class,['as'=>'admin']);
    Route::resource('/origin',OriginController::class,['as'=>'admin']);
    Route::resource('/size',SizeController::class,['as'=>'admin']);
    Route::resource('/color',ColorController::class,['as'=>'admin']);
    Route::resource('/paymentType',PaymentTypeController::class,['as'=>'admin']);
    Route::group(['prefix'=>'products','as'=>'admin.'], function(){
        Route::resource('/product',ProductController::class,['name'=>'product']);
        Route::get('/product/manage/{id}','\App\Http\Controllers\admin\ProductController@manageProduct')->name('product.manage');
    });
    Route::group(['prefix'=>'supplier','as'=>'admin.'], function(){
        Route::resource('/supplier',SupplierController::class,['name'=>'supplier']);
    });
    Route::group(['prefix'=>'purchase','as'=>'admin.'], function(){
        Route::resource('/purchase',PurchaseController::class,['name'=>'purchase']);
    });
    Route::group(['prefix'=>'sale','as'=>'admin.'], function(){
        Route::get('invoice/{id}','\App\Http\Controllers\admin\SaleController@invoice')->name('sale.invoice');
        Route::post('product','\App\Http\Controllers\admin\SaleController@addSale')->name('add-product');
        Route::resource('/sale',SaleController::class,['name'=>'sale']);
    });
    Route::group(['prefix'=>'customer','as'=>'admin.'], function(){
        Route::resource('/customer',CustomerController::class,['name'=>'customer']);
    });
});

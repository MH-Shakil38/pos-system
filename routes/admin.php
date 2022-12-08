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
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\PdfController;
use App\Http\Controllers\admin\EmployeeController;

Auth::routes();
Route::name('admin.')->middleware(['auth'])->group(function () {
    Route::get('category_update',[ProductController::class,'category_update']);
    Route::get('/dashboard','\App\Http\Controllers\admin\DashboardController@index');


    /*configuration route start*/
    Route::resource('/category',CategoryController::class);
    Route::resource('/brand',BrandController::class);
    Route::resource('/origin',OriginController::class);
    Route::resource('/size',SizeController::class);
    Route::resource('/color',ColorController::class);
    Route::resource('/paymentType',PaymentTypeController::class);


    /*product route start*/
    Route::group(['prefix'=>'products'], function(){
        Route::resource('/product',ProductController::class,['name'=>'product']);
        Route::get('/product/manage/{id}','\App\Http\Controllers\admin\ProductController@manageProduct')->name('product.manage');
    });


    /*user,supplier, customer route start*/

    /*supplier route*/
    Route::group(['prefix'=>'supplier'], function(){
        Route::resource('/supplier',SupplierController::class,['name'=>'supplier']);
    });

    /*customer route*/
    Route::group(['prefix'=>'customer'], function(){
        Route::resource('/customer',CustomerController::class,['name'=>'customer']);
    });

    /*all purchase route*/
    Route::group(['prefix'=>'purchase'], function(){
        Route::resource('/purchase',PurchaseController::class,['name'=>'purchase']);
        Route::post('/purchase-card',[PurchaseController::class,'purchase_card'])->name('add-purchase-card');
        Route::get('/purchase-details/{id}','\App\Http\Controllers\admin\PurchaseController@purchase_details')->name('purchase.details');
        Route::get('/invoice/{id}','\App\Http\Controllers\admin\PdfController@purchase_invoice')->name('purchase.invoice');
    });

    /*all sale route*/
    Route::group(['prefix'=>'sale'], function(){
        Route::get('/details/{id}',[SaleController::class,'sale_details'])->name('sale.details');
        Route::post('/product','\App\Http\Controllers\admin\SaleController@addSale')->name('add-product');
        Route::get('/invoice/{id}','\App\Http\Controllers\admin\PdfController@sale_invoice')->name('sale.invoice');
        Route::resource('/sale',SaleController::class,['name'=>'sale']);
    });

    /*Report Route*/
    //Route::group(['prefix'=>'report'], function(){
    Route::prefix("report")->group(function(){

        /*customer report route*/
        Route::get('/customer-report',[ReportController::class,'customer_report'])->name('report.customer');
        Route::get('/customer-order-details/{sale_id}',[ReportController::class,'customer_order_details'])->name('report.customer.order.details');
        Route::get('/customer-due-list/{customer_id}',[ReportController::class,'customer_due_list'])->name('report.customer.due.list');
        Route::get('/customer-report-details/{id}',[ReportController::class,'customer_report_order_list'])->name('report.customer.order.list');
        Route::get('/customer-due-payment/sale_id/{id?}/customer_id/{customer_id?}','\App\Http\Controllers\admin\ReportController@customer_due_payment')->name('customer.due.payment');
        Route::post('/customer-due-payment-update/{id}','\App\Http\Controllers\admin\ReportController@customer_due_payment_update')->name('customer.payment.update');

       /*suppliers report route*/
       Route::get('/admin-report-suppliers-purchases',[ReportController::class,'suppliers_purchase_list'])->name('report.suppliers.purchases');
       Route::get('admin_report_supplier_purchase_list/{supplier_id}',[ReportController::class,'supplier_purchases_list'])->name('report.supplier.purchase.list');
       Route::get('admin_report_supplier_purchase_details/{purchase_id}',[ReportController::class,'supplier_purchases_details'])->name('report.supplier.purchase.details');
       Route::get('/supplier-report',[ReportController::class,'supplier_report'])->name('report.supplier');


       /** sale report search */
        Route::get('/sale/report',[ReportController::class,"sale_report"])->name('xyz');

        /** purchase report */
        Route::get('admin_report_purchases',[ReportController::class,'report_purchases'])->name('report.purchases');

    });

    /*report pdf route*/
    Route::group(['prefix'=>'pdf'],function (){
        Route::get('report-pdf-all-customer-sale',[PdfController::class,'total_customer_sale'])->name('report.pdf.all.customer.sale');
        Route::get('report_pdf_single_customer_order_list/{customer_id}',[PdfController::class,'single_customer_order_list'])->name('report.pdf.single.customer.order.list');
    });


    /** employee route */
    Route::prefix('employee')->group(function (){
        Route::resource('employee',EmployeeController::class);
    });

});

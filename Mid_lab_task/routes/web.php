<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalesController;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('auth/login', [LoginController::class,'login'])->name('login.custom');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/admin',[LoginController::class,'superAdminDashboard'])->name('superadmin.dashboard');
        Route::get('/customer',[LoginController::class,'customerDashboard'])->name('admin.dashboard');
        Route::get('/accountant',[LoginController::class,'accountantDashboard'])->name('author.dashboard');
        Route::get('/salesman',[LoginController::class,'salesmanDashboard'])->name('user.salesman');
        Route::get('/businesspartner',[LoginController::class,'businesspartnerDashboard'])->name('businesspartner.dashboard');
        Route::get('/vendor',[LoginController::class,'vendorDashboard'])->name('vendor.dashboard');
    });

    Route::group(['prefix' => 'system/sales'], function () {

        Route::get('/physical_store', [SalesController::class,'physicalStore'])->name('SalesController.physicalStore');

        Route::get('physical_store/sales_log', [SalesController::class,'salesLogDetails'])->name('salesLogDetails');
        Route::get('physical_store/upload_data', [SalesController::class,'uploadData'])->name('Sales.excel.upload');

        

        Route::get('physical_store/productsales', [SalesController::class,'salesLog'])->name('SalesController.salesLog');
        Route::post('physical_store/productsales', [SalesController::class,'salesLogData'])->name('SalesController.salesLog');

        Route::get('/social_media', [SalesController::class,'mediaLog'])->name('SalesController.mediaLog');

        Route::get('/ecommerce', [SalesController::class,'ecommerceLog'])->name('SalesController.ecommerceLog');
        
        //export

        Route::get('/physical_store/sold_log', [SalesController::class, 'soldlog'])->name('Sales.sold.log');
        Route::get('/physical_store/pending_log', [SalesController::class, 'loggs'])->name('Sales.pending.log');
        Route::get('/physical_store/pdfdownload', [SalesController::class, 'download'])->name('Sales.pdf.download');
        Route::get('/physical_store/sold/pdfdownload', [SalesController::class, 'downloadSoldProduct'])->name('Sales.sold.download');
        Route::get('/physical_store/pending/pdfdownload', [SalesController::class, 'downloadPendingProduct'])->name('Sales.pdf.pending.download');
    });

    Route::group(['prefix' => 'system/product_management'], function () {

        Route::get('/physical_store', [SalesController::class,'physicalStore'])->name('SalesController.physicalStore');
        
    });

});


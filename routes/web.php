<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AccessDeniedController;
use App\Http\Controllers\LoginAuditController;
use App\Http\Controllers\ManageuserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ExportImportController;
use App\Http\Controllers\SummaryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class,'index'])->name('index');

Auth::routes(['register'=>false]);
// Auth::routes();

Route::get('export/products/to-excel',[ExportImportController::class,'export'])->name('export.products');
Route::get('download/sample-excel-file/{filename}',[ExportImportController::class,'downloadsample'])->name('downloadsample');
Route::post('import-record/from-excel',[ExportImportController::class,'import'])->name('import-excel');


Route::group(['prefix' => 'dashboard','middleware' => ['auth','preventbackbutton']], function() {
    Route::get('/',[HomeController::class,'index'])->name('dashboard');
    //getting and updating user profile
    Route::get('/update/profile',[ProfileController::class,'updateprofile'])->name('update.profile');
    Route::put('/update/profile/{id}',[ProfileController::class,'profileupdated'])->name('profile.updated');
    
    Route::get('/user/profile',[ProfileController::class,'userprofile'])->name('userprofile');
    Route::post('/upload/user/profile-image/{id}',[ProfileController::class,'uploadprofileimage'])->name('uploadprofileimage');
    Route::get('/staff/profile/{id}',[ProfileController::class,'staffprofile'])->name('staffprofile');

    Route::resource('roles',RoleController::class);
    Route::resource('staffs',StaffController::class);
    Route::post('staff/{id}/activate', [StaffController::class,'activate'])->name('staffs.activate');
    Route::post('staff/{id}/deactivate', [StaffController::class,'deactivate'])->name('staffs.deactivate');
    
    Route::resource('customers',CustomerController::class);

    Route::resource('suppliers',SupplierController::class);
    Route::resource('stocks',StockController::class);
    Route::get('/replenishable/stocks',[StockController::class,'replenishable'])->name('replenishable');
    Route::post('replenish/stock/{id}',[StockController::class,'replenishstock'])->name('replenishstock');

    Route::get('import/product/record/from-excel-file',[ExportImportController::class,'importfilepage'])->name('importfilepage');
    
    Route::resource('products', ProductController::class);
    Route::get('replenish/stock/{id}', [ProductController::class,'replenish'])->name('products.replenish');    
    Route::put('replenish-stock/{id}', [ProductController::class,'updatestock'])->name('products.updatestock');

    Route::put('edit-stock-qty/{id}', [StockController::class,'editstockqty'])->name('products.editstockqty');
    Route::put('edit-stock-price/{id}', [StockController::class,'editstockprice'])->name('products.editstockprice');

    Route::resource('orders', OrderController::class);
    Route::resource('branches', BranchController::class);
    Route::get('transactions',[TransactionController::class,'index'])->name('transaction.index');


    Route::resource('manageusers', ManageuserController::class,['except'=>['show','create','store']]);
    Route::get('/login/trails',[LoginAuditController::class,'index'])->name('login.details');
    
    //printing section
    Route::get('/print/stocks',[PrintController::class,'allstocks'])->name('print.stock');
    Route::get('/print/transactions',[PrintController::class,'transactions'])->name('print.transaction');

    //change password
    Route::post('/change-password',[PasswordController::class,'store'])->name('password.change');

    //reports
    
    Route::group(['prefix' => 'report'], function() {
        Route::get('/daily',[ReportController::class,'daily'])->name('daily');
        Route::get('/weekly',[ReportController::class,'weekly'])->name('weekly');
        Route::get('/monthly',[ReportController::class,'monthly'])->name('monthly');
        Route::get('/yearly',[ReportController::class,'yearly'])->name('yearly');
        Route::get('/specific',[ReportController::class,'specific'])->name('specific');
        Route::post('/specific/result',[ReportController::class,'specificresult'])->name('specific.result');
        Route::get('/range',[ReportController::class,'range'])->name('range');
        Route::post('/get-date-in/range/between/dates',[ReportController::class,'fetchrecordinrange'])->name('fetchrecordinrange');
    });

    Route::get('/export/csv/{type}',[ExportImportController::class,'export'])->name('exportcsv');
   

    Route::get('/purchase/summary',[SummaryController::class,'purchasesummary'])->name('purchase.summary');
    Route::get('/sales/summary',[SummaryController::class,'salesummary'])->name('sales.summary');

    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('pharmacy',CompanyController::class);
    
    // access denied
    Route::get('access-denied',[AccessDeniedController::class,'index'])->name('access.denied');
});

Route::get('/logout', [LoginController::class,'userLogout'])->name('user.logout');

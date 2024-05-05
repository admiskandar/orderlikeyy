<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomUserController;
use App\Http\Controllers\KioskController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});



// MANAGE PROFILE
Route::controller(App\Http\Controllers\CustomUserController::class)->group(function () {
    //ALL USER
    Route::get('/user/list', 'user_list')->name('user.list')->middleware('userType:KESUKOMP');
    Route::get('/user/edit/{id}', 'user_edit')->name('user.edit')->middleware('userType:KESUKOMP');
    Route::post('/user/update/{id}', 'user_update')->name('user.update')->middleware('userType:KESUKOMP');
    Route::get('/user/destroy/{id}', 'user_destroy')->name('user.destroy')->middleware('userType:KESUKOMP');

    //KESUKOMP
    Route::get('/kesukomp/list', 'kesukomp_list')->name('kesukomp.list');
    Route::get('/kesukomp/add', 'kesukomp_add')->name('kesukomp.add');
    Route::post('/kesukomp/store', 'kesukomp_store')->name('kesukomp.store');
    Route::get('/kesukomp/edit/{id}', 'kesukomp_edit')->name('kesukomp.edit');
    Route::post('/kesukomp/update/{id}', 'kesukomp_update')->name('kesukomp.update');

    //kiosk-staff
    Route::get('/kiosk-staff/list', 'kiosk_staff_list')->name('kiosk-staff.list');
    Route::get('/kiosk-staff/add', 'kiosk_staff_add')->name('kiosk-staff.add');
    Route::post('/kiosk-staff/store', 'kiosk_staff_store')->name('kiosk-staff.store');
    Route::get('/kiosk-staff/edit/{id}', 'kiosk_staff_edit')->name('kiosk-staff.edit');
    Route::post('/kiosk-staff/update/{id}', 'kiosk_staff_update')->name('kiosk-staff.update');

    //Customer
    Route::get('/customer/list', 'customer_list')->name('customer.list');
    Route::get('/customer/edit', 'customer_edit')->name('customer.edit');

    //MY PROFILE
    Route::get('/my-profile', 'my_profile_show')->name('my.profile.show');
    Route::get('/my-profile/edit/{id}', 'my_profile_edit')->name('my.profile.edit');
    Route::post('/my-profile/update/{id}', 'my_profile_update')->name('my.profile.update');

    Route::get('/my-profile/password/edit/{id}', 'my_profile_password_edit')->name('my.profile.password.edit');
    Route::post('/my-profile/password/update/{id}', 'my_profile_password_update')->name('my.profile.password.update');
});

// MANAGE KIOSK
Route::controller(App\Http\Controllers\KioskController::class)->group(function () {
    // kesukomp > all-kiosk
    Route::get('/kiosk', 'kiosk_list')->name('kiosk.list')->middleware('userType:KESUKOMP');

    // kesukomp > all-kiosk > new-kiosk 
    Route::get('/kiosk/add', 'kiosk_add')->name('kiosk.add')->middleware('userType:KESUKOMP');
    Route::post('/kiosk/store', 'kiosk_store')->name('kiosk.store')->middleware('userType:KESUKOMP');

    // kesukomp > kiosk-info \\ customer > kiosk-info
    Route::get('/kiosk/info/{id}', 'kiosk_info')->name('kiosk.info')->middleware('userType:KESUKOMP,Customer');

    // kesukomp > all-kiosk > edit-kiosk 
    Route::get('/kiosk/edit/{id}', 'kiosk_edit')->name('kiosk.edit')->middleware('userType:KESUKOMP');
    Route::post('/kiosk/update/{id}', 'kiosk_update')->name('kiosk.update')->middleware('userType:KESUKOMP');

    // kesukomp > all-kiosk > delete-kiosk
    Route::get('/kiosk/destroy/{id}', 'kiosk_destroy')->name('kiosk.destroy')->middleware('userType:KESUKOMP');

    // kiosk-staff > my-kiosk
    Route::get('/kiosk/my-kiosk', 'kiosk_my_kiosk')->name('kiosk.my.kiosk');


    // kiosk-staff > my-kiosk > edit
    Route::get('/kiosk/my-kiosk/edit/{id}', 'kiosk_my_kiosk_edit')->name('kiosk.my.kiosk.edit');
    Route::post('/kiosk/my-kiosk/update/{id}', 'kiosk_my_kiosk_update')->name('kiosk.my.kiosk.update');
    Route::post('/kiosk/{id}/status', 'updateStatus')->name('kiosk.update.status');

    // customer > all-kiosk
    Route::get('/kiosk/list', 'kiosk_customer_list')->name('kiosk.customer.list');
});

// MANAGE MENU
Route::controller(App\Http\Controllers\MenuController::class)->group(function () {
    // kesukomp > all-menu
    Route::get('/menu', 'menu_list')->name('menu.list')->middleware('userType:KESUKOMP');

    // kesukomp > all-menu > new-menu
    Route::get('/menu/add', 'menu_add')->name('menu.add')->middleware('userType:KESUKOMP');
    Route::post('/menu/store', 'menu_store')->name('menu.store')->middleware('userType:KESUKOMP');

    // kesukomp > all-menu > menu-info
    Route::get('/menu/info/{id}', 'menu_info')->name('menu.info')->middleware('userType:KESUKOMP,Customer');

    // kesukomp > all-menu > edit-menu
    Route::get('/menu/edit/{id}', 'menu_edit')->name('menu.edit')->middleware('userType:KESUKOMP');
    Route::post('/menu/update/{id}', 'menu_update')->name('menu.update')->middleware('userType:KESUKOMP');

    // kesukomp > all-menu > delete-menu
    Route::get('/menu/destroy/{id}', 'menu_destroy')->name('menu.destroy')->middleware('userType:KESUKOMP');


    // staff > all-menu
    Route::get('/menu/my-menu', 'menu_my_menu_list')->name('menu.my.menu');

    // staff > all-menu > new-menu
    Route::get('/menu/my-menu/add', 'menu_my_menu_add')->name('menu.my.menu.add');
    Route::post('/menu/my-menu/store', 'menu_my_menu_store')->name('menu.my.menu.store');

    // staff > all-menu > menu-info
    Route::get('/menu/my-menu/info/{id}', 'menu_my_menu_info')->name('menu.my.menu.info');

    // staff > all-menu > edit-menu
    Route::get('/menu/my-menu/edit/{id}', 'menu_my_menu_edit')->name('menu.my.menu.edit');
    Route::post('/menu/my-menu/update/{id}', 'menu_my_menu_update')->name('menu.my.menu.update');

    // staff > all-menu > delete-menu
    Route::get('/menu/my-menu/destroy/{id}', 'menu_my_menu_destroy')->name('menu.my.menu.destroy');

    // customer > all-menu
    Route::get('/menu/customer', 'menu_customer_list')->name('menu.customer.list');
});

// MANAGE ORDER
Route::controller(App\Http\Controllers\OrderController::class)->group(function () {
    Route::get('/order/pos', 'order_pos')->name('order.pos');
    Route::get('/order/sales/list', 'order_sales_list')->name('order.sales.list');
    Route::get('/order/sales/details', 'order_sales_details')->name('order.sales.details');
    Route::get('/order/sales/edit', 'order_sales_edit')->name('order.sales.edit');
    Route::get('/order/invoice/list', 'order_invoice_list')->name('order.invoice.list');
});

Route::controller(App\Http\Controllers\InvoiceController::class)->group(function () {
    Route::post('/order/checkout', 'checkout')->name('invoice.checkout');
    Route::get('/order/invoices', 'invoices_list')->name('invoice.list');
    Route::get('/order/my-invoices', 'my_invoices_list')->name('my.invoice.list');
});

// MANAGE FAVOURITE
Route::controller(App\Http\Controllers\FavouriteController::class)->group(function () {
    Route::get('/favourites', 'favourite_list')->name('favourite.list');

    // Add a menu to favorites
    Route::post('/favourites/add/{menu}', 'add')->name('favourite.add');

    // Remove a menu from favorites
    Route::delete('/favourites/remove/{menu}', 'remove')->name('favourite.remove');
});

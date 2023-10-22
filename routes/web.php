<?php

use Illuminate\Support\Facades\Route;

// Route::redirect('/', '/dashboard-general-dashboard');

// Dashboard
// Route::get('/dashboard-general-dashboard', function () {
//     return view('pages.dashboard-general-dashboard', ['type_menu' => 'dashboard']);
// });
// Route::get('/dashboard-ecommerce-dashboard', function () {
//     return view('pages.dashboard-ecommerce-dashboard', ['type_menu' => 'dashboard']);
// });


// Route::get('/layout-default-layout', function () {
//     return view('tamplate.layout-default-layout', ['type_menu' => 'layout']);
// });

// Route::get('/blank-page', function () {
//     return view('tamplate.blank-page', ['type_menu' => '']);
// });

// ------------------------------------------BACKEND----------------------------------------------------

// login
Route::get('/', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login')->name('login.post');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::post('/forgetPassword', 'LoginController@forgetPassword')->name('login.forgetPassword');
Route::get('/auth-forgot-password', 'LoginController@viewForgetPassword');

Route::group(['middleware' => ['auth']], function () {
    //roles
    Route::get('/dashboard', 'LoginController@dashboard')->name('dashboard');
    //roles
    Route::resource('roles', 'RoleController');
    //user
    Route::resource('users', 'UserController');
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('/exportExcelUsers', 'UserController@exportExcel')->name('exportExcelUsers');
    Route::get('/exportPdfUsers', 'UserController@exportPdf')->name('exportPdfUsers');

});
// ------------------------------------------BACKEND----------------------------------------------------

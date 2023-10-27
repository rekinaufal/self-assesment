<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserCategoryController;
use App\Models\Computation;
use App\Models\PermenperinCategory;
use App\Models\User;
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
Route::get('/admin_panel', 'LoginController@loginAdmin')->name('loginAdmin');
Route::post('/login', 'LoginController@login')->name('login.post');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::post('/register', 'LoginController@register')->name('register');

Route::post('/forgetPassword', 'LoginController@forgetPassword')->name('login.forgetPassword');
Route::get('/auth-forgot-password', 'LoginController@viewForgetPassword');

Route::group(['middleware' => ['auth']], function () {
    //roles
    Route::get('/dashboard', 'LoginController@dashboard')->name('dashboard');
    //roles
    Route::resource('roles', 'RoleController');
    //user
    Route::resource('users', 'UserController');
    Route::get('/profile/{id}', 'UserProfileController@profile')->name('profile');
    Route::get('/exportExcelUsers', 'UserController@exportExcel')->name('exportExcelUsers');
    Route::get('/exportPdfUsers', 'UserController@exportPdf')->name('exportPdfUsers');
    Route::post('/destroyByCheckbox', 'UserController@destroyByCheckbox')->name('destroyByCheckbox');

    // kategori permenperin
    Route::resource('permenperincategory', 'PermenperinCategoryController');

    // news
    Route::get("json/news", [NewsController::class, "getNewsJson"]);
    Route::post('delete-batch/news', [NewsController::class, "deletedBatch"])->name("news.deletedBatch");
    Route::resource("news", NewsController::class);
});

// Route::controller(PermenperinCategoryController::class)->group(function () {
//     Route::get('/permenperin', 'index')->name('permenperin_page');
//     Route::post('/permenperin/editPermenperin', 'editPermenperin')->name('editPermenperin');
//     Route::post('/permenperin/addPermenperin', 'addPermenperin')->name('addPermenperin');
//     Route::post('/permenperin/deletePermenperin', 'deletePermenperin')->name('deletePermenperin');
// });
// ------------------------------------------BACKEND----------------------------------------------------


// Route::get("testing", function() {
//     $computation = Computation::all();

//     dd($computation[0]->permenperin_category);
// });

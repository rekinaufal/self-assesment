<?php

use App\Http\Controllers\CalculationResultController;
use App\Http\Controllers\ComputationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserCategoryController;
use App\Models\CalculationResult;
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

//register
Route::post('/register', 'LoginController@register')->name('register');
Route::get('/verify/{id}', [LoginController::class, 'verify']);
// Route::get("testing-login-one", [LoginController::class, "loginOne"]);
// Route::get("testing-login-two", [LoginController::class, "loginTwo"]);

Route::post('/forgetPassword', 'LoginController@forgetPassword')->name('login.forgetPassword');
Route::get('/auth-forgot-password', 'LoginController@viewForgetPassword');

Route::group(['middleware' => ['auth']], function () {
    //roles
    Route::get('/dashboard', 'LoginController@dashboard')->name('dashboard');
    Route::post('/filter-news-dashboard-user', 'LoginController@filteredNewsDashboardUser')->name('filteredNewsDashboardUser');
    //roles
    Route::resource('roles', 'RoleController');
    //user
    Route::resource('users', 'UserController');
    Route::get('/exportExcelUsers', 'UserController@exportExcel')->name('exportExcelUsers');
    Route::get('/exportPdfUsers', 'UserController@exportPdf')->name('exportPdfUsers');
    Route::post('delete-batch/users', 'UserController@deletedBatch')->name('users.deletedBatch');
    Route::post('/changePassword', 'UserController@changePassword')->name('changePassword');
    Route::post('/search-user-pengguna', 'UserController@search')->name('search-user-pengguna');
    Route::get('/json/users', 'UserController@getUsersJson');
    //profile
    Route::resource('profile', 'UserProfileController');
    Route::get('/profile-pengguna', 'UserProfileController@profile')->name('profile');
    // kategori permenperin
    Route::resource('permenperincategory', 'PermenperinCategoryController');

    // news
    Route::get("json/news", [NewsController::class, "getNewsJson"]);
    Route::post('delete-batch/news', [NewsController::class, "deletedBatch"])->name("news.deletedBatch");
    Route::resource("news", NewsController::class);
    Route::post('/search-news', 'NewsController@search')->name('search-news');


    // payment
    Route::resource("payment", PaymentController::class);
    Route::get('/payment-display/{id}', 'PaymentController@payment')->name('payment');
    Route::get('/approvePayment/{id}', 'PaymentController@approvePayment')->name('approvePayment');
    Route::post('/uploadPayment', 'PaymentController@uploadPayment')->name('uploadPayment');

    // list kebutuhan
    Route::resource("needs", NeedsController::class);

    //computation
    Route::resource("computation", ComputationController::class);
    Route::get('/exportExcelComputation/{id}', 'ComputationController@exportExcel')->name('exportExcelComputation');
    Route::get('/exportPdfComputation/{computation}', [ComputationController::class, "exportPdf"])->name('exportPdfComputation');

    //calculation
    Route::resource("calculation-results", CalculationResultController::class);
    Route::post("calculation-results/submit", [CalculationResultController::class, "submit"])->name("calculation-results.submit");

    // notification
    Route::get('/mark-as-read', 'NotificationController@markAsRead')->name('mark-as-read');
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

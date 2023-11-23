<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\HouseController;
use App\Http\Controller\AuthController;
use App\Http\Controllers\AuthController as ControllersAuthController;

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
Route::middleware('guest')->prefix('/')->group(function () {
    Route::get('login', [ControllersAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [ControllersAuthController::class, 'login'])->name('loginUser');

    Route::get('register', [ControllersAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [ControllersAuthController::class, 'register'])->name('registerUser');
});


Route::get('/', function () {
    return view('client/index');
});


Route::get('/contact', function () {
    return view('client/contact');
});

Route::get('/blog', function () {
    return view('client/blog');
});
Route::get('/blog-details', function () {
    return view('client/blog-details');
});

Route::get('/about-us', function () {
    return view('client/about-us');
});

Route::get('/property', function () {
    return view('client/property');
});

Route::get('/property-details', function () {
    return view('client/property-details');
});





//ADMIN VIEW
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    });
    Route::get('/form', function () {
        return view('admin.form-validation');
    });



    Route::post('/house/create', 'HouseController@create')->name('house.create');
   
});


//Login - Register


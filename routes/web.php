<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\HouseController;
use App\Http\Controller\AuthController;
use App\Http\Controllers\AuthController as ControllersAuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HouseController as ControllersHouseController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ServiceController;

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
Route::get('logout', [ControllersAuthController::class, 'logout'])->name('logout');

Route::prefix('/')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('home');

    Route::get('/contact', function () {
        return view('client/contact');
    })->name('contacts');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact');

    Route::get('/blog', [ClientController::class, 'blog'])->name('blog');
    Route::get('/blog-details/{id}', [ClientController::class, 'blogDetail'])->name('blog-detail');

    Route::get('/about-us', function () {
        return view('client/about-us');
    })->name('about');

    Route::get('/service/{slug}', [ClientController::class, 'service'])->name('service');

    Route::get('/service-detail/{id}',[ClientController::class, 'serviceDetail'])->name('service-detail');
});

//ADMIN VIEW
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    // house 
    Route::get('/house', [ControllersHouseController::class, 'index'])->name('house.index');
    Route::get('/house/create', [ControllersHouseController::class, 'create'])->name('house.create');
    Route::post('/house/create', [ControllersHouseController::class, 'store'])->name('house.post');
    Route::get('/house/edit/{id}', [ControllersHouseController::class, 'edit'])->name('house.edit');
    Route::put('/house/update/{id}', [ControllersHouseController::class, 'update'])->name('house.update');
    Route::get('/house/delete/{id}', [ControllersHouseController::class, 'delete'])->name('house.delete');

    // service
    Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
    Route::post('/service/create', [ServiceController::class, 'store'])->name('service.post');
    Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/service/update/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::get('/service/delete/{id}', [ServiceController::class, 'delete'])->name('service.delete');

    // information
    Route::get('/information', [InformationController::class, 'showInformation'])->name('information.index');
    Route::post('/information/create', [InformationController::class, 'store'])->name('information.post');
    Route::put('/information/update/{id}', [InformationController::class, 'update'])->name('information.update');

    // contact
    Route::get('/contact', [ContactController::class, 'adminShow'])->name('contact.index');

    // Blog 
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/create', [BlogController::class, 'form'])->name('blog.create');
    Route::post('/blog/create', [BlogController::class, 'store'])->name('blog.post');
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
});


//Login - Register

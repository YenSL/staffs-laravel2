<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [FrontendController::class, 'index'])->name('frontpage');
Route::get('/pizza/{id}', [FrontendController::class, 'show'])->name('pizza.show');
Route::post('/order/store', [FrontendController::class, 'store'])->name('order.store');


Route::group(['prefix'=>'admin', 'middleware'=>['auth','admin']],function(){

Route::get('/pizza', [PizzaController::class, 'index'])->name('pizza.index');
Route::get('/pizza/create', [PizzaController::class, 'create'])->name('pizza.create');
Route::post('/pizza/store', [PizzaController::class, 'store'])->name('pizza.store');
Route::get('/pizza/{id}/edit', [PizzaController::class, 'edit'])->name('pizza.edit');
Route::put('/pizza/{id}/update', [PizzaController::class, 'update'])->name('pizza.update');
Route::delete('/pizza/{id}/delete', [PizzaController::class, 'destroy'])->name('pizza.destroy');


//user order
Route::get('/user/order', [UserOrderController::class, 'index'])->name('user.order');
Route::post('/order/{id}/status', [UserOrderController::class, 'changeStatus'])->name('order.status');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('chirps', ChirpController::class)
       ->only(['index', 'store', 'edit', 'update', 'destroy']);
    //->middleware(['auth', 'verified']);
    Route::post(
       '/chirps/{chirp}/addToFavourites',
       [ChirpController::class, 'addToFavourites']
    )->name('chirps.favourites.add');
    Route::get(
       '/chirps/favourites',
       [ChirpController::class, 'favourites']
    )->name('chirps.favourites');
 });
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
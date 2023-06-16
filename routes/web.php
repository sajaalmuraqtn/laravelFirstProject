<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


//  Route::group( ['checkuserstatus'=>'auth' ] ,function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('checkuserstatus');

    Route::get('/add', [App\Http\Controllers\AddController::class, 'add'])->name('add')->middleware('checkuserstatus');

    Route::post('/create', [App\Http\Controllers\AddController::class, 'create'])->name('user.create')->middleware('checkuserstatus');

//  } );



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('checkuserstatus');


Route::get('/edit/{id}', [App\Http\Controllers\EditController::class, 'edit'])->name('user.edit');
Route::post('/update/{id}', [App\Http\Controllers\EditController::class, 'update'])->name('user.update');
Route::get('/delete/{id}', [App\Http\Controllers\AddController::class, 'delete'])->name('user.delete');

Route::get('/notFound',function(){
    return view('notFound');
})->name('notFound');

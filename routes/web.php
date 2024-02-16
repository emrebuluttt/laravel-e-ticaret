<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [HomeController::class, 'home'])->name('welcome');
Route::get('/kitaplar/{id}', [HomeController::class, 'show'])->name('users.books.show');

Route::get('/sepet', [ShoppingController::class, 'index'])->name('shopping.index');
Route::get('/sepete-ekle/{id}', [ShoppingController::class, 'addtocard'])->name('shopping.addtocard');
Route::get('/sepetten-çıkar/{raw_id}', [ShoppingController::class, 'removefromcard'])->name('shopping.removefromcard');
Route::get('/sepeti-guncelle/{raw_id}/{type}', [ShoppingController::class, 'updatecart'])->name('shopping.updatecart');
Route::post('/siparisi-olustur', [OrderController::class, 'store'])->name('orders.store');

Route::get('/siparis-basarili', [OrderController::class, 'success'])->name('orders.success');
Route::get('/siparis-basarisiz', [OrderController::class, 'fail'])->name('orders.fail');

////Route::controller(TestController::class,)-> group(function (){
////    Route::get('/test', 'test')->name('test');
////    Route::get('/detail', 'detail')->name('detail');
//});
Route::prefix('admin')-> middleware('admin')-> group(function () {
    Route::get('/deneme', [TestController::class, 'test'])->name('test');
    Route::get('/detail', [TestController::class, 'detail'])->name('detail');

    Route::get('/kitaplar', [BookController::class, 'index'])->name('books.index');
    Route::get('/kitaplar/ekle', [BookController::class, 'create'])->name('books.create');
    Route::post('/kitaplar/ekle', [BookController::class, 'store'])->name('books.store');
    Route::get('/kitaplar/{book}', [BookController::class, 'edit'])->name('books.edit');
    Route::post('/kitaplar/{book}', [BookController::class, 'update'])->name('books.update');
    Route::get('/kitaplar/sil/{book}', [BookController::class, 'delete'])->name('books.delete');



});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

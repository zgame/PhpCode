<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\PortiaShop;
Route::get('/portia_shop/buy_list', [PortiaShop\portiaController::class, 'getUserBuyList']);
Route::get('/portia_shop/alipayget',[PortiaShop\alipayController::class, 'AliPayGetNo']);


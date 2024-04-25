<?php

use App\DAL\RedisDAL;
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
    $redisDal = new RedisDAL();
    $currentDate = date('Y-m-d H:i:s');
    $redisDal->set("v5~".$currentDate, "sid!".$currentDate);
    return view('home');
});

Route::post('/admin', function(){
    echo "Admin";
});

// Route::get('/{name}', function($name="siddhesh"){
//     $data = compact('name');
//     return view('name')->with($data);
// });

Route::get('/home',function(){
    return view('home');
});

Route::get('/about',function(){
    return view('about');
});


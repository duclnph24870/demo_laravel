<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

/*
    ========= CHÚ Ý =========
    - Khi bị trùng router thì laravel sẽ return về router được định nghĩa sau
*/

Route::get('/home', function () {
    return view('home');
});

Route::match(['get', 'post'], '/', function () {
    return 'Route mathch với path . và 1 trong 2 method get || post';
});

// Chuyển hướng roiter /here đến path /
Route::redirect('/here', '/');

// Thêm prefix đăng trước và nhóm các router
Route::prefix('/tin-tuc')->group(function () {
    // param name có thể tồn tại hoặc không và nhận giá trị mặc định là "Ngọc Đức"
    Route::get('/{name?}',function (string $name = 'Ngọc Đức') {
        return $name;
    })->name('tin-tuc.name');

    // Giá trị của các biến của call back được truyền vào sẽ theo thứ tự param trên url
    Route::get('/detail/{id}/{slug}',function (string $id,string $slug) {
        return $id.'<br /> '.$slug;
    })->where(['id' => '[0-9]+', 'slug' => '[a-z]+'])->whereIn('id',['0123456','123456']);
});

Route::get('/req',function (Request $req) {
    // Thông tin của req
    echo dd($req);
    return view('welcome');
})->middleware('test_check');

// === Cách gọi đến 1 controller ===
Route::get('/test', [Controller::class,'test']);
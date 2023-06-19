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
    // Lấy ra tất cả data gửi lên bất kể là phương thức nào POST,PUT,...
    $allData = $req->all();

    // Lấy ra path của api hiện tại
    $path = $req->path();
    
    // Nếu path req đúng với 1 path -> return true
    $isPath = $req->is('admin');

    // Tất cả các path có prefix là admin đều thỏa mãn VD: admin/add, admin/edit, ...
    $isPath2 = $req->is('admin/*');

    // Lấy ra url hiện tại, Không bao gồm query trên url
    $url = $req->url();

    // Lấy ra method 
    $method = $req->method();

    // Địa chỉ ip
    $ip = $req->ip();

    // Thông tin biến SERVER
    $server = $req->server();

    // THông tin header
    $header = $req->header();

    // Lấy ra dữ liệu truyền vào từ req như body data hoặc query
    $input = $req->input();

    // Lấy ra query
    $query = $req->query();

    // KIểm tra xem 1 key có tồn tại hay không trong input (gồm cả body và query)
    $isCheck = $req->has('key_name');

    // Đưa tất cả dữ liệu vào trong 1 sesion đặc biệt chỉ tồn tại trong thời gian ngắn và sẽ mất khi load lại trang
    $req->flash();

    // Lấy data flash vừa lưu ra
    $req->old('key_name');
    // old('key_name'); helper có chức năng tương tự

    return "<br />req data";
});

// === Cách gọi đến 1 controller ===
Route::get('/test', [Controller::class,'test']);
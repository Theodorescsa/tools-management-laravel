<?php
use App\Http\Controllers\ToolController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users',function () {
    return view('users');
});

Route::get('/foods', function() {
    return ['sushi','shashimi','tofu'];
});

Route::get('/aboutme',function() {
    return response() -> json([
        'name' => 'Nguyen Dinh Thai',
        'email' => 'dinhthai0312@gmail.com'
    ]);
});

Route::get('/something',function() {
    return redirect('/foods');
});


Route::get('/tools', [ToolController::class, 'index'])->name('tools.index');        // Hiển thị danh sách tools
Route::get('/tools/create', [ToolController::class, 'create'])->name('tools.create'); // Hiển thị form tạo tool mới
Route::post('/tools', [ToolController::class, 'store'])->name('tools.store');         // Lưu tool mới
Route::get('/tools/{id}', [ToolController::class, 'show'])->name('tools.show');  


use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

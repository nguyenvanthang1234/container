<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


 
Route::get('/greeting/{locale}', function (string $locale) {
    if (! in_array($locale, ['vi'])) {
        abort(400);
    }
 
    App::setLocale($locale);
 
    // ...
});
// php artisan route:list

use Illuminate\Support\Facades\Auth;


// Route::get("admin/{age}",function(){
//     return view("admin");
// })->middleware("checkAge");

// Route::get("admin/{age}","App\Http\Controllers\adminController@index");

// cho auth no se day vao trang login
// Route::get("admin/dashboard","App\Http\Controllers\adminController@dashboard")->middleware("auth","checkrole");
//  danh sach dinh tuyen can dang buoc

// Route::middleware("auth",function(){
//     Route::get("admin/dashboard","App\Http\Controllers\adminController@dashboard");
// });

// ->middleware("auth") ko dăng nhạp se chuyen file login



Route::middleware("auth")->group(function(){
    Route::get("dashboard","App\Http\Controllers\dashboardController@show");


    Route::get("admin/user/list","App\Http\Controllers\adminUserController@list");
    Route::get("admin/user/add","App\Http\Controllers\adminUserController@add");
    
    Route::post("admin/user/store","App\Http\Controllers\adminUserController@store");
    Route::get("admin/user/delete/{id}","App\Http\Controllers\adminUserController@delete")->name("delete_user");
    
    Route::post("admin/user/action","App\Http\Controllers\adminUserController@action");
    Route::get("admin/user/edit/{id}","App\Http\Controllers\adminUserController@edit")->name("user.edit");
    Route::get("admin/user/update/{id}","App\Http\Controllers\adminUserController@update")->name("user.update");
    
});


<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
// Route::get('/post', function () {
//     return "day la trang bai viet";
// });

// Route::get('/admin/product/add', function () {
//     return "day la trang them san pham";
// });

// // dinh tuyen co tham so

// Route::get("posts/{id}",function($id){
//  return $id;
// });


// Route::get('posts/{cat_id}/page/{page}',function($cat_id,$page){
//     return $cat_id.'-'.$page;
// });

// //  tra ve duong dan cua no
// Route::get('/users/profile',function(){
//     return  route('profile');
// })->name('profile');


// Route::get('/admin/product/add', function () {
//     return route("product.add");
// })->name('product.add');

//  co tham so tuy chon
//domain.com/users => hien thi ra danh sach cac users
//domain.com/users/4 => hien thi ra   users co id bang 4

// Route::get("users/{id}",function($id=0){
//     return $id;
//    });


// // dinh tuyen tham so co rang buoc bieu thuc chinh quy
//  Route::get('product/{slug}/{id}',function($slug,$id){
//     return $id."--".$slug;
//  })->where(['id'=>'[0-9]+','slug'=>'[A-Za-z0-9-_]+']);


// //   dinh tuyen mot view
// Route::view('/welcome','welcome');
//  truyen sang trang post

// Route::view('/post','post',['id'=>'20']);




//  dinh tuyen controler
// Route::get('/post/{id}', 'App\Http\Controllers\PostController@detail');

// Route::get('/post/show/{id}', 'App\Http\Controllers\PostController@show');

// Route::get('admin/post/post', 'App\Http\Controllers\adminPostController@show');




//  dinh uyen resource
// use App\Http\Controllers\Post1Controller;
// Route::resource("post",Post1Controller::class);


//  cac vi du

// Route::get('/admin/post/add', function () {
//     return "them bai viet";
// });

// Route::get('/admin/post/update/{id}', function ($id) {
//     return "cap nhat bai viet:{$id}";
// });



// Route::get('/admin/post/delete/{id}', function ($id) {
//     return " xoa bai viet :{$id}";
// });


// Route::get('/admin/post/insert', 'App\Http\Controllers\adminController@insert');
// Route::get('/admin/post/update', 'App\Http\Controllers\adminController@update');
// Route::get('/admin/post/delete', 'App\Http\Controllers\adminController@delete');


// Route::get('child',function(){
//     // return view('child',['data'=>"ho ten;<strong> nguyen van thang </strong>"]);

//     return view('child',['data'=>"3",'post_title'=>'ngu nhu cho']);
// });

// Route::get('demo',function(){
//     // return view('child',['data'=>"ho ten;<strong> nguyen van thang </strong>"]);

//     $users=array(
//         1=>array(
//             'name'=>"nguyen van thang"
//         ),
//         2=>array(
//             'name'=>"nguyen van dai"
//         ),
//         3=>array(
//             'name'=>"vu thi anh"
//         )
    
//         );

//             return view('demo',compact('users'));





//     // return view('demo',['n'=>20]);
// });

// tao bang co so du lieu
// php artisan migrate 

// kich hoat migration tao bang

// php artisan migration

//php artisan make:controller PostController

//  tao bang tren laravel
//php artisan make:migration create_comments_table

// khoi phuc lenh tao bang o buoc truoc
// php artisan migrate :rollback

//khoi phuc du lieu o  buoc cu the 
// php artisan migrate :rollback --step=2


// reset toan bo tren migrate
//  php artisan migrate:reset
// php artisan migrate:refresh


// them cot moi vao bang
// php artisan make:migration add_gender_to_posts_table --table=posts



// Route::get("users/insert",function(){
//     DB::table("users")->insert(
//         ["name"=>"nguyen van thang","password"=>md5("thangdai03"),"email"=>"vanthang@gmail.com"]
//     );
// });


// Route::get('/posts/add', 'App\Http\Controllers\insertController@add');

// Route::get('/posts/show', 'App\Http\Controllers\insertController@show');
// Route::get('/posts/update/{id}', 'App\Http\Controllers\insertController@update');
// Route::get('/posts/delete/{id}', 'App\Http\Controllers\insertController@delete');



// Route::get("/products/add","App\Http\Controllers\ProductController@add");
// Route::get("/products/show","App\Http\Controllers\ProductController@show");
// Route::get("/products/update/{id}","App\Http\Controllers\ProductController@update");


// php artisan make:model Post -m

//  lay danh sach ban ghi
//  ket noi voi cai bang co s dang sau
// use App\Models\Post;
// Route::get("posts/read",function(){
//     $orders=Post::all();
//     return $orders;
// });

// Route::get("posts/read","App\Http\Controllers\insertController@read");
// Route::get("posts/add","App\Http\Controllers\insertController@add");
// Route::get("posts/update/{id}","App\Http\Controllers\insertController@update");


//  tao xoa tam thoi
// php artisan make:migration add_softdelete_to_posts_table --table'posts'
//  php artisan migrate


// Route::get("posts/restore/{id}","App\Http\Controllers\insertController@restore");


// Route::get("posts/permanetlyDelete/{id}","App\Http\Controllers\insertController@permanetlyDelete");


// Route::get("image/read","App\Http\Controllers\FeaturedImagesController@read");
// Route::get("image/read","App\Http\Controllers\insertController@read");


// Route::get("roles/show","App\Http\Controllers\RoleController@show");


// Route::get("post/add", "App\Http\Controllers\insertController@add");
// Route::post("post/store", "App\Http\Controllers\insertController@store");


// Route::get("post/show","App\Http\Controllers\insertController@show");

// Route::get('helper/url',"App\Http\Controllers\HelperController@url");
// Route::get('helper/string',"App\Http\Controllers\HelperController@string");


// Route::get('user/reg',function(){
//     return view("user/reg");
// });



// Route::get("session/add","App\Http\Controllers\SessionController@add");
// Route::get("session/show","App\Http\Controllers\SessionController@show");

// Route::get("session/add_flash","App\Http\Controllers\SessionController@add_flash");
// Route::get("session/delete","App\Http\Controllers\SessionController@delete");


// Route::get("cookie/set","App\Http\Controllers\CookieController@set");
// Route::get("cookie/get","App\Http\Controllers\CookieController@get");



// Route::get("demo/mail","App\Http\Controllers\mailController@sendMail");

// Route::group(['prefix' => 'laravel-filemanager'], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });



Route::get("product/show","App\Http\Controllers\productsController@show");

Route::get("cart/show","App\Http\Controllers\cartController@show");

Route::get("cart/add/{id}","App\Http\Controllers\cartController@add")->name("cart.add");


Route::get('cart/remove/{rowId}','App\Http\Controllers\cartController@remove')->name("cart.remove");

Route::get('cart/destroy','App\Http\Controllers\cartController@destroy')->name('cart.destroy');
Route::get('cart/update','App\Http\Controllers\cartController@update')->name('cart.update');





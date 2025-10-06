<?php

use App\Http\Controllers\ExtraController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SingleActionController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/demo',function(){
//     echo "Hello World!!!";
// });

//! with parameters
// Route::get('/demo/{name}/{id?}',function($name,$id=null){
//     echo $name . " ";
//     echo $id;
// });

//! with view
// Route::get('/demo/{name}/{id?}',function ($name,$id=null){
//     $data=compact('name','id');
//     return view('demo')->with($data);
// });

// Route::post('/test',function (){
//     echo "Testing method";
// });                           // The GET method is not supported for route test. Supported methods: POST.

// Route::any('/test1',function (){
//     echo "testing method";
// });

// Route::get('/demo1',function (){
//     return view("demo");
// });

// Route::get('/{name?}',function ($name=null){
//     $demo="<h1>Hello</h1>";
//     $data=compact('name','demo');
//     return view('home')->with($data);
// });

// Route::get('/',function (){
//     return view('Homes');
// });

// Route::get('/about',function (){
//     return view('About');
// });

// //! Basic controller
// Route::get('/',[ExtraController::class,'index']);

// //! Single action controller
// Route::get('/about',SingleActionController::class);

// //!resouce controller
// Route::resource('/photos',PhotoController::class);

Route::get('/register',[RegistrationController::class,'index']);
Route::post('/register',[RegistrationController::class,'register']);
<?php

use App\Http\Controllers\CustomerRegistration;
use App\Http\Controllers\ExtraController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SingleActionController;
use Illuminate\Support\Facades\Route;
use App\Models\Customers;
use Illuminate\Http\Request;
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

Route::get('/',function (){
    return view('Homes');
});

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

// Route::get('/customers',function(){
//     $customers= Customers::all();
//     echo "<pre>";
//     print_r($customers->toArray());  //gives data in form of objects
// });

// Group routing 
Route::group(['prefix'=>'customer'],function(){
    Route::get('/',[CustomerRegistration::class,'index'])->name('customer.create');
    Route::post('/',[CustomerRegistration::class,'store']);
    Route::get('view',[CustomerRegistration::class,'view']);
    Route::get('trash',[CustomerRegistration::class,'trash']);
    Route::put('update/{id}', [CustomerRegistration::class, 'update'])->name('customer.update');
    Route::get('delete/{id}',[CustomerRegistration::class,'delete'])->name('customer.delete');
    Route::get('force-delete/{id}',[CustomerRegistration::class,'forceDelete'])->name('customer.forceDelete');
    Route::get('restore/{id}',[CustomerRegistration::class,'restore'])->name('customer.restore');
    Route::get('edit/{id}',[CustomerRegistration::class,'edit'])->name('customer.edit');
});

// individual route
// Route::get('/customer',[CustomerRegistration::class,'index'])->name('customer.create');
// Route::post('/customer',[CustomerRegistration::class,'store']);
// Route::get('/customer/view',[CustomerRegistration::class,'view']);
// Route::get('/customer/trash',[CustomerRegistration::class,'trash']);
// Route::put('/customer/update/{id}', [CustomerRegistration::class, 'update'])->name('customer.update');
// Route::get('/customer/delete/{id}',[CustomerRegistration::class,'delete'])->name('customer.delete');
// Route::get('/customer/force-delete/{id}',[CustomerRegistration::class,'forceDelete'])->name('customer.forceDelete');
// Route::get('/customer/restore/{id}',[CustomerRegistration::class,'restore'])->name('customer.restore');
// Route::get('/customer/edit/{id}',[CustomerRegistration::class,'edit'])->name('customer.edit');

Route::get('get-all-session',function(){
    $session =session()->all();
    p($session);
});

Route::get('set-session',function(Request $request){
    $request =session()->put('user_name','Mamta');
    $request =session()->put('user_id','123');
    return redirect('get-all-session');
});

Route::get('destroy-session',function(){
    session()->forget('user_name');
    session()->forget('user_id');
    return redirect('get-all-session');
});




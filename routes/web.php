<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-submit', function () {
    return view('test-submit');
});

Route::post("/submit", function (){
    return "form has been submited";
});

Route::post("/Update", function (){
    return "send update data";
});

Route::post("/remove", function (){
    return "send remove data";
});

Route::prefix('admin')-> group(function (){
    Route::get("/dosen", function (){
        return view('admin.dosen');
    });
    Route::get("/mahasiswa", function (){
        return view('admin.mahasiswa');
    });
});

Route::get('/admin/karyawan', function (){
    return view('admin.karyawan');
});

// 2.3 Route Match
Route::match(['get', 'post'],  '/feedback', function (\Illuminate\Http\Request $request) {
    if($request->isMethod('post')){
        return 'Form submitted';
    }
    return view('feedback');
});

// 2.4 Passing data from View to routes
Route::get('/contact', function () {
    return view('contact');
});

Route::post('/submit-contact', function (Request $request) {
    $name = $request->input('name');
    return "received name: $name";
});

// 2.5 Passing data from Routes to the view
Route::get('/about', function () {
    return view('about', ['name' => 'nigga', 'umur' => '21']);
});

// 2.6 Route Parameters
Route::get('/profile/{username}', function ($username) {
    return view('profile', ['username' => $username]);
});

// 2.7 Route Fallback
Route::fallback(function () {
    return response()->view('fallback', [], 404);
});
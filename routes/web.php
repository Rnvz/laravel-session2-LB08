<?php

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

Route::match(['get', 'post'],  '/feedback', function (\Illuminate\Http\Request $request) {
    if($request->isMethod('post')){
        return 'Form submitted';
    }
    return view('feedback');
});
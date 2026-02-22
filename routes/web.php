<?php

use App\Http\Controllers\FileUploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::post('/test-submit', function (Request $request) {
    $request->validate([
        'name' => 'required|min:5',
        'email' => 'required|email|max:200',
        'password' => 'required|min:6|max:100',
    ]);

    dd($request->all());
});

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');

Route::get('/upload', [FileUploadController::class, 'index'])->name('upload');
Route::post('/upload', [FileUploadController::class, 'store'])->name('upload.submit');
Route::get('/file/{file}/download', [FileUploadController::class, 'download'])->name('file.download');

// /file/image_1770565661.PNG/download

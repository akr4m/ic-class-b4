<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::livewire('/demo/counter', 'demo.counter');
Route::livewire('/demo/mirror', 'demo.mirror');

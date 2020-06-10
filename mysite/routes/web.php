<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', 'IndexController@index')->name('index');

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/blog', function () {
    return view('welcome');
})->name('blog');

Route::get('/blogEditor', function () {
    return view('welcome');
})->name('blogEditor');

Route::get('/admin/blog/upload', function () {
    return view('welcome');
})->name('blogUpload');

Route::get('/login', function () {
    return view('welcome');
})->name('login');

Route::get('/registration', function () {
    return view('welcome');
})->name('registr');

Route::get('/exit', function () {
    return view('welcome');
})->name('exit');
<?php

use App\Blog;
use Illuminate\Support\Facades\Route;

// Route::get('/', 'IndexController@index')->name('index');

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/blog', 'BlogController@blog')->name('blog');
Route::post('/blog/updateRecord', 'BlogController@updateRecord');

Route::get('/blogEditor', function () {
    return view('welcome');
})->name('blogEditor');

Route::get('/addComment', 'CommentController@addComment');

Route::get('/admin/blog/upload', function () {
    return view('welcome');
})->name('blogUpload');

Route::get('/login', 'UserController@auth')->name('auth');
Route::post('/login-login', 'UserController@login')->name('login');

Route::get('/exit', 'Controller@exit')->name('exit');

Route::delete('/blog/delete/{id}', function ($id) {
    Blog::findOrFail($id)->delete();
    return redirect('/blog');
})->name('deleteBlog');
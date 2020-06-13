<?php

use App\Blog;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('blog', 'BlogController');
Route::resource('comment', 'CommentController');
Route::resource('user', 'UserController');

Route::post('/blog/edit', 'BlogController@edit');
Route::post('/blog/create', 'BlogController@create');

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/blogEditor', function () {
    return view('blogEditor');
})->name('blogEditor');

Route::get('/admin/blog/upload', 'BlogController@upload')->name('blogUpload');
Route::post('/admin/blog/upload', 'BlogController@loadBlogs')->name('loadBlogs');

Route::get('/exit', 'Controller@exit')->name('exit');

Route::delete('/blog/delete/{id}', function ($id) {
    Blog::findOrFail($id)->delete();
    return redirect('/blog');
})->name('deleteBlog');

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

Route::resource('blog', 'BlogController')->only([
    'index', 'create'
]);
Route::resource('comment', 'CommentController')->only([
    'create'
]);
Route::resource('user', 'UserController')->only([
    'index'
]);

Route::post('/blog/create', 'BlogController@create');

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/blogEditor', function () {
    return view('blogEditor');
})->name('blogEditor');

Route::get('/exit', 'Controller@exit')->name('exit');

Route::middleware(['isAdmin'])->group(function () {
    Route::post('/blog/edit', 'BlogController@update');
    Route::get('/admin/blog/upload', 'BlogController@upload')->name('blogUpload');
    Route::post('/admin/blog/upload', 'BlogController@loadBlogs')->name('loadBlogs');
    Route::delete('/blog/delete/{id}', function ($id) {
        Blog::findOrFail($id)->delete();
        return redirect('/blog');
    })->name('deleteBlog');
});
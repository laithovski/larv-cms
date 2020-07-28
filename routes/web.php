<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',function(){
    return view('pages.dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Categories
Route::get('/category', 'CategoryController@index')->name('category.index');

// Add Category
Route::post('/addCategory', 'CategoryController@store')->name('category.add');
// Remove Category
Route::post('/deleteCategory', 'CategoryController@removeCategory')->name('category.remove');
// Edit Category
Route::post('/editCategory', 'CategoryController@editCategory')->name('category.edit');

//Posts
Route::get('/posts', 'PostController@index')->name('post.index');
//Add Post
Route::post('/addPost', 'PostController@store')->name('post.add');

// Blog
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/{id}', 'BlogController@show')->name( 'blog.show');

//Admin Routes
Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::post('/admin', 'AdminController@store')->name('admin.store');

Route::get('/login', 'Auth\AdminLoginController@index')->name('login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('login.submit');


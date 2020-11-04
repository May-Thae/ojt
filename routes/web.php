<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/home', function () {
    return "Home";
});

// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::group(array('middleware'=>'auth'),function(){
    // password change
    Route::get('change-password', 'ChangePasswordController@index');
    Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

    //for admin
    Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('type');

    //for search Post

    Route::get('/post/search','PostController@index');
    //for search User
    Route::get('/user/search','UserController@searchUser');

    //for posts
    Route::resource('post', 'PostController');
    Route::post('/post/confirm', 'PostController@confirm');

});

// import excel
Route::get('file-import-export', 'PostController@fileImportExport');
Route::post('file-import', 'PostController@fileImport')->name('file-import')->middleware('auth');
Route::get('file-export', 'PostController@fileExport')->name('file-export');

// user list
Route::resource('user', 'UserController');
Route::post('/user/create', 'UserController@create')->name('user.create')->middleware('auth');
Route::post('/user/confirm', 'UserController@confirm')->middleware('auth');
Route::get('/users', 'UserController@index')->name('user.index')->middleware('auth');
Route::get('/user', 'UserController@item')->name('user')->middleware('type');
// user profile
Route::get('/user/{id}/profile', 'UserController@reference')->name('user.reference')->middleware('auth');

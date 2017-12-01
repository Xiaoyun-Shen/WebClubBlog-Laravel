<?php

Route::group(['namespace'=>'User'],function(){
    Route::get('/', 'HomeController@index')->name('blog');
    Route::get('posts/{post}','PostController@show')->name('posts');
    Route::get('posts/category/{category}','HomeController@category')->name('category');
    Route::get('posts/tag/{tag}','HomeController@tag')->name('tag');

    //comment
    Route::post('posts/{post}/comments','CommentController@store')->name('comments.store');
});




Route::group(['namespace'=>'Admin'],function(){
    Route::get('admin/home','HomeController@index')->name('admin.home');
    Route::resource('admin/users','UserController');
    Route::resource('admin/posts','PostController');
    Route::resource('admin/tags','TagController');
    Route::resource('admin/categories','CategoryController');
    Route::resource('admin/roles','RoleController');
    Route::resource('admin/permissions','PermissionController');

    //auth
   Route::get('admin-login','Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login','Auth\LoginController@login');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php


Route::group(['as' => 'admin.','prefix' => 'admin-panel'],function(){
    // Admin Login
    Route::get('/login','AdminLoginController@login')->name('login');
    Route::post('/login','AdminLoginController@login')->name('login');

    // Admin Logout
    Route::get('/logout','AdminLoginController@logout')->name('logout');

    // Admin Home Page
    Route::group(['middleware' => 'admin_auth'],function (){

        // Home Page
        Route::get('/','AdminLoginController@index')->name('index');

        // Admin
        Route::resource('admins','AdminController')->except(['show']);

        // Categories
        Route::resource('categories','CategoryController')->except(['show']);

        // Blogs
        Route::resource('blogs','BlogController')->except(['show']);
    });
});

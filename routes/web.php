<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'WebSite','as' => 'front.'],function (){
    Route::get('/','FrontController@index')->name('index');
    Route::get('/cateogry/{id}/{title}','FrontController@category')->name('category');
    Route::get('/blog/{id}/{title}','FrontController@blog')->name('blog');
    Route::get('sitemap',function (){

        \Spatie\Sitemap\SitemapGenerator::create('https://www.el-senior.tech/')->writeToFile('sitemap.xml');
    });
});


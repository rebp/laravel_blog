<?php


Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('home-blog');
});

Route::get('/home', function(){
    return view('home-blog');
})->middleware('auth');



Route::middleware(['admin'])->group(function () {

    Route::get('/admin', function () {
        return 'Admin Dashboard';
    });

    Route::resource('/admin/posts', 'AdminPostsController');
});

Route::middleware(['author'])->group(function () {

    Route::get('/author', function(){
        return "Author Dashboard";
    });

});

Route::middleware(['subscriber'])->group(function () {
    
    Route::get('/subscriber', function(){
        return "Subscriber Dashboard";
    });

});

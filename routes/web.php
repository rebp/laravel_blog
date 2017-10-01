<?php


Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('home-blog');
});

Route::get('/home', function(){
    return view('home-blog');
})->middleware('auth');

Route::get('/admin', function(){
    return "Administrator";
})->middleware('admin');

Route::get('/author', function(){
    return "Author";
})->middleware('author');

Route::get('/subscriber', function(){
    return "Subscriber";
})->middleware('subscriber');

// Route::get('/register2', function () {
//     return view('register');
// });

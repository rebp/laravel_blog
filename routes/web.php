<?php


Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('home-blog');
})->name('home');

Route::get('/home', function(){
    return view('home-blog');
})->middleware('auth');



Route::middleware(['admin'])->group(function () {

    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    Route::resource('/admin/users', 'AdminUsersController', ['names' => [

        'index'     =>  'admin.users.index',
        'create'    =>  'admin.users.create',
        'store'     =>  'admin.users.store',
        'show'      =>  'admin.users.show',
        'edit'      =>  'admin.users.edit',
        'update'    =>  'admin.users.update',
        'destroy'   =>  'admin.users.destroy'

    ]]);

    Route::resource('/admin/posts', 'AdminPostsController', ['names' => [
        
        'index'     =>  'admin.posts.index',
        'create'    =>  'admin.posts.create',
        'store'     =>  'admin.posts.store',
        'show'      =>  'admin.posts.show',
        'edit'      =>  'admin.posts.edit',
        'update'    =>  'admin.posts.update',
        'destroy'   =>  'admin.posts.destroy'

    ]]);

});

Route::middleware(['author'])->group(function () {

    Route::get('/author', function(){
        return view('author.index');
    });

});

Route::middleware(['subscriber'])->group(function () {
    
    Route::get('/subscriber', function(){
        return view('subscriber.index');
    });

});

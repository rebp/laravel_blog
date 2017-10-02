<?php

use App\Post;

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {

    $posts = Post::all();

    return view('home-blog', compact('posts'));

})->name('home');

Route::get('/home/post/{id}', function ($id) {
    
    $post = Post::findOrFail($id);

    return view('home-post', compact('post'));

})->name('home.post');

Route::get('/home', function(){

    $posts = Post::all();

    return view('home-blog', compact('posts'));

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

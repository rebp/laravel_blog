<?php

use App\Post;
use App\Category;

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {

    $posts = Post::all();
    $categories = Category::all();

    return view('home-blog', compact('posts', 'categories'));

})->name('home');

Route::get('/home', function(){

    $posts = Post::all();
    $categories = Category::all();

    return view('home-blog', compact('posts', 'categories'));

})->middleware('auth');


Route::get('/home/post/{id}', function ($id) {
    
    $post = Post::findOrFail($id);
    $comments = $post->comments()->get();
    $categories = Category::all();
    
    return view('home-post', compact('post', 'comments', 'categories'));

})->name('home.post');

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

    Route::resource('/admin/comments', 'PostCommentsController', ['names' => [
        
        'index'     =>  'admin.comments.index',
        'create'    =>  'admin.comments.create',
        'store'     =>  'admin.comments.store',
        'show'      =>  'admin.comments.show',
        'edit'      =>  'admin.comments.edit',
        'update'    =>  'admin.comments.update',
        'destroy'   =>  'admin.comments.destroy'

    ]]);

    Route::resource('/admin/categories', 'AdminCategoriesController', ['names' => [
        
        'index'     =>  'admin.categories.index',
        'create'    =>  'admin.categories.create',
        'store'     =>  'admin.categories.store',
        'show'      =>  'admin.categories.show',
        'edit'      =>  'admin.categories.edit',
        'update'    =>  'admin.categories.update',
        'destroy'   =>  'admin.categories.destroy'

    ]]);

    Route::resource('admin/comment/replies', 'CommentRepliesController',['names'=>[       
        
        'index'     =>  'admin.relies.index',
        'create'    =>  'admin.relies.create',
        'store'     =>  'admin.relies.store',
        'show'      =>  'admin.relies.show',
        'edit'      =>  'admin.relies.edit',
        'update'    =>  'admin.relies.update',
        'destroy'   =>  'admin.relies.destroy'

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

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

Route::get('/posts/category/{category}', function($category){

    $category_name = Category::where('name', $category)->first();    

    $posts = Post::where('category_id', $category_name->id)->get();

    $categories = Category::all();

    return view('home-blog', compact('posts', 'categories'));


})->name('posts.category');

Route::get('/home/post/{slug}', function ($slug) {
    
    $post = Post::findBySlugOrFail($slug);
    $comments = $post->comments()->get();
    $categories = Category::all();
    
    return view('home-post', compact('post', 'comments', 'categories'));

})->name('home.post');

Route::middleware(['admin', 'auth'])->group(function () {

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

    Route::get('/admin/comments/post/{id}', 'AdminPostsController@postComments')->name('admin.comments.post');

    Route::resource('/admin/comments', 'PostCommentsController', ['names' => [
        
        'index'     =>  'admin.comments.index',
        'create'    =>  'admin.comments.create',
        'store'     =>  'admin.comments.store',
        'show'      =>  'admin.comments.show',
        'edit'      =>  'admin.comments.edit',
        'update'    =>  'admin.comments.update',
        'destroy'   =>  'admin.comments.destroy'

    ]]);

    Route::resource('admin/comment/replies', 'CommentRepliesController',['names'=>[       
        
        'index'     =>  'admin.replies.index',
        'create'    =>  'admin.replies.create',
        'store'     =>  'admin.replies.store',
        'show'      =>  'admin.replies.show',
        'edit'      =>  'admin.replies.edit',
        'update'    =>  'admin.replies.update',
        'destroy'   =>  'admin.replies.destroy'

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

 

});

Route::middleware(['author', 'auth'])->group(function () {

    Route::get('/author', function(){
        return view('author.index');
    });

    Route::resource('/author/profile', 'AuthorProfileController', ['names' => [
        
        'index'     =>  'author.profile.index',
        'update'    =>  'author.profile.update'

    ]]);

    Route::resource('/author/posts', 'AuthorPostsController', ['names' => [
        
        'index'     =>  'author.posts.index',
        'create'    =>  'author.posts.create',
        'store'     =>  'author.posts.store',
        'show'      =>  'author.posts.show',
        'edit'      =>  'author.posts.edit',
        'update'    =>  'author.posts.update',
        'destroy'   =>  'author.posts.destroy'

    ]]);

    Route::get('/author/comments/post/{id}', 'AuthorPostsController@postComments')->name('author.comments.post');
    
    Route::resource('/author/comments', 'PostCommentsController', ['names' => [
        
        'index'     =>  'author.comments.index',
        'create'    =>  'author.comments.create',
        'store'     =>  'author.comments.store',
        'show'      =>  'author.comments.show',
        'edit'      =>  'author.comments.edit',
        'update'    =>  'author.comments.update',
        'destroy'   =>  'author.comments.destroy'

    ]]);

    Route::resource('author/comment/replies', 'CommentRepliesController',['names'=>[       
        
        'index'     =>  'author.replies.index',
        'create'    =>  'author.replies.create',
        'store'     =>  'author.replies.store',
        'show'      =>  'author.replies.show',
        'edit'      =>  'author.replies.edit',
        'update'    =>  'author.replies.update',
        'destroy'   =>  'author.replies.destroy'

    ]]);  


    Route::resource('/author/categories', 'AuthorCategoriesController', ['names' => [
        
        'index'     =>  'author.categories.index',
        'create'    =>  'author.categories.create',
        'store'     =>  'author.categories.store',
        'show'      =>  'author.categories.show',
        'edit'      =>  'author.categories.edit',
        'update'    =>  'author.categories.update',
        'destroy'   =>  'author.categories.destroy'

    ]]);

});

Route::middleware(['subscriber', 'auth'])->group(function () {
    
    Route::get('/subscriber', function(){
        return view('subscriber.index');
    });

});

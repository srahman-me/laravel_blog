<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index');
Route::resource('/home', 'HomeController');


Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);


Route::group(['middleware'=>'admin'], function(){


    Route::get('/admin', function(){
        return view('admin.index');
    });

    Route::resource('admin/users', 'AdminUsersController', ['names'=>[
        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'edit'=>'admin.users.edit',
        'store'=>'admin.users.store',

    ]]);

    Route::resource('admin/posts', 'AdminPostsController',['names'=>[
        'index'=>'admin.posts.index',
        'create'=>'admin.posts.create',
        'edit'=>'admin.posts.edit',
        'store'=>'admin.posts.store',

    ]]);


    Route::resource('admin/categories', 'AdminCategoriesController',['names'=>[
        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'edit'=>'admin.categories.edit',
        'store'=>'admin.categories.store',

    ]]);


    Route::resource('admin/media', 'AdminMediasController',['names'=>[
        'index'=>'admin.media.index',
        'create'=>'admin.media.create',
        'edit'=>'admin.media.edit',
        'store'=>'admin.media.store',

    ]]);


    Route::resource('admin/comments', 'PostCommentsController',['names'=>[
        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'edit'=>'admin.comments.edit',
        'store'=>'admin.comments.store',
        'show'=>'admin.comments.show',


    ]]);

    Route::resource('admin/comment/replies', 'CommentsRepliesController',['names'=>[
        'index'=>'admin.comments.replies.index',
        'create'=>'admin.comments.replies.create',
        'edit'=>'admin.comments.replies.edit',
        'store'=>'admin.comments.replies.store',
        'show'=>'admin.comments.replies.show',

    ]]);


});



Route::group(['middleware'=>'auth'], function(){
    Route::post('comment/reply', 'CommentsRepliesController@createReply',['names'=>[
        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'edit'=>'admin.comments.edit',
        'store'=>'admin.comments.store',
        'show'=>'admin.comments.replies.show',

    ]]);

    Route::post('admin/comments', 'PostCommentsController@store',['names'=>[
        'index'=>'admin.comments.replies.index',
        'create'=>'admin.comments.replies.create',
        'edit'=>'admin.comments.replies.edit',
        'store'=>'admin.comments.replies.store',
        'show'=>'admin.comments.replies.show',

    ]]);
});


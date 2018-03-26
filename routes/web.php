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

//Route::get('/', function () {
//    return view('template.index');
//});
Route::group([],function() {
    Route::match(['get', 'post'], '/', ['uses' => 'IndexController@home', 'as' => 'home']);
    Route::get('/page{alias}', ['uses' => 'PageController@execute', 'as' => 'page']);
    Route::get('/about', ['uses' => 'IndexController@about', 'as' => 'about']);
    Route::match(['get','post'],'/contact', ['uses' => 'IndexController@contact', 'as' => 'contact']);
});
//Route::group(['prefix'=>'post'],function() {
//   Route::match(['get','post'],'/commit',['uses'=>'CommitController@execute']);
//});
//Route::group(['prefix'=>'1','middleware'=>'auth'],function ()
//{
//    Route::get('/',['uses'=>'AdminController@mainPage']);
//});
Route::get('/categories/{id}',['uses'=>'CategoriesController@execute','as'=>'category']);



Route::post('/post/edit_comment_post',['uses'=>'CommentController@create','middleware'=>'auth','as'=>'comment_post_edit']);
Route::post('/comment/edit_comment',['uses'=>'CommentController@createCommentToComment','middleware'=>'auth','as'=>'comment_comment_edit']);
Route::match(['get','post','delete'],'/comment/delete/{id}',['uses'=>'CommentController@delete','middleware'=>'auth','as'=>'comment_delete']);
Route::get('/comment/delete',['uses'=>'CommentController@deleteExecute','middleware'=>'auth','as'=>'comment']);
Route::post('/comment/form-create',['uses'=>'CommentController@createCommitForm','as'=>'create_form_comment']);
Auth::routes();
Route::get('setlocale/{locale}', ['middleware'=>'web','uses'=>'LangController@lang','as'=>'lang']);
Route::group(['prefix'=>'profile','middleware'=>'auth'],function ()
{
    Route::get('/{id}',['uses'=>'ProfileController@execute','as'=>'profile']);
    Route::match(['get','post'],'/edit/{id}',['middleware'=>'userUpdate','uses'=>'ProfileController@edit','as'=>'profile_edit']);
});
Route::group(['prefix'=>'post'],function ()
{
    Route::match(['get', 'post'], '/post/{id}', ['uses' => 'PostController@execute', 'as'=>'post']);
    Route::match(['get','post'],'/post/edit/{id}',['uses'=>'PostController@edit','as'=>'post_edit']);
});
Route::group(['prefix'=>'admin'],function ()
{
   Route::get('/posts/',['uses'=>'AdminController@allPosts','as'=>'admin_all_posts']);
   Route::match(['get','post'],'/post/create',['middleware'=>'postCreate','uses'=>'AdminController@createPost','as'=>'admin_create_post']);
   Route::match(['get','post','delete'],'/post/{id}',['middleware'=>'postEdit','uses'=>'AdminController@editPost','as'=>'admin_edit_post']);
   Route::get('/users/',['uses'=>'AdminController@allUsers','as'=>'admin_all_users']);
   Route::post('/user/{id}/add/role/',['uses'=>'AdminController@userAddRole','as'=>'admin_user_add_role']);
   Route::delete('/user/{id}/delete/role',['uses'=>'AdminController@userDeleteRole','as'=>'admin_user_delete_role']);
   Route::get('/categories/',['uses'=>'AdminController@allCategories','as'=>'admin_categories']);
   Route::match(['get','post','delete'],'/categories/edit/{id}',['middleware'=>'categoryUpdate','uses'=>'AdminController@editCategories','as'=>'admin_edit_categories']);
   Route::match(['get','post'],'/categories/create/',['middleware'=>'categoryCreate','uses'=>'AdminController@createCategories','as'=>'admin_create_category']);
});

Route::match(['get','post'],'/ajax/updateUserLastVisit', ['uses'=>'AjaxController@update','as'=>'ajax_update'] );


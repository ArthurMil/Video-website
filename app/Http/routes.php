<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'uses' => 'SignInController@getHome',
    'as' => 'dashboard'
    
]);

Route::get('/dashboard', [
   'uses' => 'SignInController@getHome',
    'as' => 'dashboard'
]);

Route::get('/signup', [
    'uses' => 'SignInController@getSignUp',
    'as' => 'signup'
]);
Route::get('/signin', [
    'uses' => 'SignInController@getSignIn',
    'as' => 'signin'
]);
Route::post('/signup', [
   'uses' => 'SignInController@postSignUp',
    'as' => 'signup'
]);
Route::post('/signin', [
    'uses' => 'SignInController@postSignIn',
    'as' => 'signin'
]);
Route::get('/logout', [
   'uses' => 'SignInController@getLogout',
    'as' => 'logout'
]);
Route::get('/updateProfile', [
   'uses' => 'SignInController@getUpdated',
    'as' => 'updateProfile'
]);
Route::get('/userimage/{filename}', [
   'uses' => 'SignInController@getUserImage',
    'as' => 'account.image'
]);
Route::post('updatePicture', [
   'uses' => 'SignInController@CreatePicture',
    'as' => 'picture.save'
]);
Route::get('/uploadvideo', [
    'uses' => 'SignInController@UploadVideo',
    'as' => 'video.upload'
]);
Route::post('/createvideo', [
    'uses' => 'SignInController@postVideo',
    'as' => 'post.video'
]);
Route::get('/video/{video}/view', [
    'uses' => 'SignInController@ViewVideo',
    'as' => 'view.video'
]);

Route::post('/createpost{video_id}', [
   'uses' => 'PostController@postCreatePost',
    'as' => 'post.create'
]);
Route::get('deletepost/{post_id}', [
    'uses' => 'PostController@DeletePost',
    'as' => 'post.delete'
]);
Route::get('deletevideo/{video}', [
   'uses' => 'PostController@DeleteVideo',
    'as' => 'video.delete'
]);

Route::post('/edit', [
    'uses' => 'PostController@EditPost',
    'as' => 'edit'
]);
Route::post('/like', [
    'uses' => 'PostController@postLikePost',
    'as' => 'like'
]);
Route::get('/contactus', [
    'uses' => 'PostController@ContactUs',
    'as' => 'contact.us'
]);
Route::post('/contactus', 'PostController@postContact');


Route::get('/counter/{post_id}', [
    'uses' => 'PostController@getLikeCounter',
    'as' => 'counter'
]);
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

<?php

/************************** Posts  ****************************************/
Route::group(['middleware' => ['post.auth']], function () {
    Route::post('/store-post', 'PostController@store')->name('storePost');
});
Route::get('/solutions', 'PostController@create')->name('solutions');
Route::get('/post-details/{id}', 'PostController@show')->name('post-details');

/************************** Comments **************************************/
Route::get('/check-user', 'CommentController@checkUser')->name('checkUser');
Route::post('/comments/{id}', 'CommentController@store')->name('storeComments');
Route::post('/comments2/{id}', 'CommentController@storeComments')->name('storeCommentsOnComments');

Route::post('/edit-comment', 'CommentController@editComment')->name('editComment');
/***************************** Likes **************************************/
Route::get('/check-likes', 'LikeController@UserLikes')->name('UserLikes');

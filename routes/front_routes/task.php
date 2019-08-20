<?php

Route::get('post-task', 'TaskController@index')->name('task.postTask');
Route::post('store-task', 'TaskController@createTask')->name('task.storeTask');
Route::get('edit-task/{id}', 'TaskController@editTask')->name('task.editTask');
Route::put('update-task/{id}', 'TaskController@updateTask')->name('task.updateTask');
Route::get('posted-task', 'TaskController@postedTasks')->name('task.postedTask');
Route::get('task-details/{id}', 'TaskController@taskDetails')->name('task.taskDetails');
Route::delete('delete-front-task', 'TaskController@deleteTask')->name('task.deleteTask');

Route::post('store-task-reply', 'TaskController@saveReply')->name('task.taskReply');
Route::get('view-task-replies/{id}', 'TaskController@viewReply')->name('task.viewReply');
Route::get('view-reply-details/{id}', 'TaskController@replyDetails')->name('task.replyDetails');

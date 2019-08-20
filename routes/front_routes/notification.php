<?php

Route::get('get-notifications', 'NotificationController@getNotifications')->name('getNotifications');
Route::get('notifications', 'NotificationController@index')->name('notifications');
Route::get('task-detail/{id}', 'NotificationController@taskDetails')->name('taskDetails');
Route::get('job-search', 'NotificationController@jobSearch')->name('my.job.search');

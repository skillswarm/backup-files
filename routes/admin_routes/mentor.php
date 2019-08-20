<?php

/* * ******  Company Start ********** */
Route::get('list-mentors', array_merge(['uses' => 'Admin\MentorController@indexMentors'], $all_users))->name('list.mentors');
Route::get('create-mentor', array_merge(['uses' => 'Admin\MentorController@createMentor'], $all_users))->name('create.mentor');
Route::post('store-mentor', array_merge(['uses' => 'Admin\MentorController@storeMentor'], $all_users))->name('store.mentor');
Route::get('edit-mentor/{id}', array_merge(['uses' => 'Admin\MentorController@editMentor'], $all_users))->name('edit.mentor');
Route::put('update-mentor/{id}', array_merge(['uses' => 'Admin\MentorController@updateMentor'], $all_users))->name('update.mentor');
Route::delete('delete-mentor', array_merge(['uses' => 'Admin\MentorController@deleteMentor'], $all_users))->name('delete.mentor');
Route::get('fetch-mentors', array_merge(['uses' => 'Admin\MentorController@fetchMentorsData'], $all_users))->name('fetch.data.mentors');
//Route::get('fetch-mentors', array_merge(['uses' => 'Admin\MentorController@fetchMentorsData'], $all_users))->name('fetch.data.mentors');
Route::put('make-active-mentor', array_merge(['uses' => 'Admin\MentorController@makeActiveMentor'], $all_users))->name('make.active.mentor');
Route::put('make-not-active-mentor', array_merge(['uses' => 'Admin\MentorController@makeNotActiveMentor'], $all_users))->name('make.not.active.mentor');
Route::put('make-verified-mentor', array_merge(['uses' => 'Admin\MentorController@makeVerifiedMentor'], $all_users))->name('make.verified.mentor');
Route::put('make-not-verified-mentor', array_merge(['uses' => 'Admin\MentorController@makeNotVerifiedMentor'], $all_users))->name('make.not.verified.mentor');
/* * ****** End Company ********** */

<?php

Route::prefix('mentor')->name('mentor.')->group(function () {
    Route::post('/login', 'Mentor\Auth\LoginController@login')->name('login');
    Route::post('/logout', 'Mentor\Auth\LoginController@logout')->name('logout');
    Route::post('/register', 'Mentor\Auth\RegisterController@register')->name('register');

    Route::group(['middleware' => ['mentor']], function () {
      Route::get('/home', 'Mentor\HomeController@index')->name('home');
      Route::get('/my-profile', 'Mentor\HomeController@myProfile')->name('my-profile');
      Route::post('/my-profile', 'Mentor\HomeController@updateProfile')->name('updateProfile');
      Route::get('/assigned-profiles', 'Mentor\HomeController@assignedProfiles')->name('assigned-profiles');
      Route::get('/verified-profiles', 'Mentor\HomeController@verifiedProfiles')->name('verified-profiles');
      Route::get('/my-messages', 'Mentor\HomeController@myMessages')->name('my-messages');
      Route::get('/messages-detail/{id}', 'Mentor\HomeController@messagesDetail')->name('messages-detail');
      Route::get('/user-profile/{id}', 'Mentor\HomeController@viewUserProfile')->name('user-profile');
      Route::post('/submit-recommendation/{id}', 'Mentor\HomeController@submitRecommendation')->name('submit-recommendation');

      Route::put('/change-to-progress', 'Mentor\HomeController@changeToProgress')->name('to-progress');
      Route::put('/change-to-verified', 'Mentor\HomeController@changeToVerified')->name('to-verified');
    });
});

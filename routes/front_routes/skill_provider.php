<?php

Route::prefix('skill-provider')->name('skill-provider.')->group(function () {
    Route::post('/login', 'SkillProvider\Auth\LoginController@login')->name('login');
    Route::post('/logout', 'SkillProvider\Auth\LoginController@logout')->name('logout');
    Route::post('/register', 'SkillProvider\Auth\RegisterController@register')->name('register');

      Route::group(['middleware' => ['skill_provider']], function () {
          Route::get('/home', 'SkillProvider\HomeController@index')->name('home');
          Route::get('/profile', 'SkillProvider\HomeController@myProfile')->name('profile');
          Route::post('/my-profile', 'SkillProvider\HomeController@updateProfile')->name('updateProfile');

          Route::get('/add-skill-course', 'CourseController@create')->name('createSkillCourse');
          Route::post('/add-skill-course', 'CourseController@store')->name('storeSkillCourse');
          Route::get('/edit-skill-course/{id}', 'CourseController@edit')->name('editSkillCourse');
          Route::post('/update-skill-course/{id}', 'CourseController@update')->name('updateSkillCourse');
          Route::delete('/delete-skill-course', 'CourseController@destroy')->name('deleteSkillCourse');
          Route::get('/list-skill-course', 'CourseController@index')->name('listSkillCourse');
      });
});

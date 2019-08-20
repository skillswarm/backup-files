<?php

/* * ******  Company Start ********** */
Route::get('list-skill-providers', array_merge(['uses' => 'Admin\SkillProviderController@indexSkillProviders'], $all_users))->name('list.skill-providers');
Route::get('create-skill-provider', array_merge(['uses' => 'Admin\SkillProviderController@createSkillProvider'], $all_users))->name('create.skill-provider');
Route::post('store-skill-provider', array_merge(['uses' => 'Admin\SkillProviderController@storeSkillProvider'], $all_users))->name('store.skill-provider');
Route::get('edit-skill-provider/{id}', array_merge(['uses' => 'Admin\SkillProviderController@editSkillProvider'], $all_users))->name('edit.skill-provider');
Route::put('update-SkillProvider/{id}', array_merge(['uses' => 'Admin\SkillProviderController@updateSkillProvider'], $all_users))->name('update.skill-provider');
Route::delete('delete-skill-provider', array_merge(['uses' => 'Admin\SkillProviderController@deleteSkillProvider'], $all_users))->name('delete.skill-provider');
Route::get('fetch-skill-providers', array_merge(['uses' => 'Admin\SkillProviderController@fetchSkillProvidersData'], $all_users))->name('fetch.data.skill_providers');
Route::put('make-active-skill-provider', array_merge(['uses' => 'Admin\SkillProviderController@makeActiveSkillProvider'], $all_users))->name('make.active.skill-provider');
Route::put('make-not-active-skill-provider', array_merge(['uses' => 'Admin\SkillProviderController@makeNotActiveSkillProvider'], $all_users))->name('make.not.active.skill-provider');
Route::put('make-verified-skill-provider', array_merge(['uses' => 'Admin\SkillProviderController@makeVerifiedSkillProvider'], $all_users))->name('make.verified.skill-provider');
Route::put('make-not-verified-skill-provider', array_merge(['uses' => 'Admin\SkillProviderController@makeNotVerifiedSkillProvider'], $all_users))->name('make.not.verified.skill-provider');
/* * ****** End Company ********** */

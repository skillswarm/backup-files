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
$real_path = realpath(__DIR__) . DIRECTORY_SEPARATOR . 'front_routes' . DIRECTORY_SEPARATOR;

//Route::get('/', function () {  return view('new-template.index'); })->name('index');
Route::get('/about', function () { return view('new-template.about');  })->name('about');
Route::get('/contact', function () { return view('new-template.contact');  })->name('contact');
//Route::get('/solutions', function () { return view('new-template.solutions');  })->name('solutions');
Route::get('/how_it_works', function () { return view('new-template.how_it_works');  })->name('how_it_works');
Route::get('/terms_and_conditions', function () { return view('new-template.terms_and_condition');  })->name('terms_and_conditions');

Route::get('/list-employers', function () { return view('new-template.candidates.listEmployers');  });
Route::get('/employers-details', function () { return view('new-template.candidates.employerDetails');  });
Route::get('/employers-problems', function () { return view('new-template.candidates.problems');  });
Route::get('/problem-details', function () { return view('new-template.candidates.problemDetails');  });
Route::get('/job-list', function () { return view('new-template.candidates.jobList');  });
Route::get('/job-details', function () { return view('new-template.candidates.jobDetails');  });


/* * ******** IndexController ************ */
Route::get('/', 'IndexController@index')->name('index');
Route::post('set-locale', 'IndexController@setLocale')->name('set.locale');
/* * ******** HomeController ************ */
Route::get('home', 'HomeController@index')->name('home');
/* * ******** TypeAheadController ******* */
Route::get('typeahead-currency_codes', 'TypeAheadController@typeAheadCurrencyCodes')->name('typeahead.currency_codes');
/* * ******** FaqController ******* */
Route::get('faq', 'FaqController@index')->name('faq');
/* * ******** CronController ******* */
Route::get('check-package-validity', 'CronController@checkPackageValidity');
/* * ******** Verification ******* */
Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');
Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');
Route::get('company-email-verification/error', 'Company\Auth\RegisterController@getVerificationError')->name('company.email-verification.error');
Route::get('company-email-verification/check/{token}', 'Company\Auth\RegisterController@getVerification')->name('company.email-verification.check');
/* * ***************************** */
// Sociallite Start
// OAuth Routes
Route::get('login/jobseeker/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/jobseeker/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('login/employer/{provider}', 'Company\Auth\LoginController@redirectToProvider');
Route::get('login/employer/{provider}/callback', 'Company\Auth\LoginController@handleProviderCallback');
// Sociallite End
/* * ***************************** */
Route::post('tinymce-image_upload-front', 'TinyMceController@uploadImage')->name('tinymce.image_upload.front');

Route::post('subscribe-newsletter', 'SubscriptionController@getSubscription')->name('subscribe.newsletter');

/* * ******** OrderController ************ */
include_once($real_path . 'order.php');
/* * ******** CmsController ************ */
include_once($real_path . 'cms.php');
/* * ******** JobController ************ */
include_once($real_path . 'job.php');
/* * ******** ContactController ************ */
include_once($real_path . 'contact.php');
/* * ******** CompanyController ************ */
include_once($real_path . 'company.php');
/* * ******** AjaxController ************ */
include_once($real_path . 'ajax.php');
/* * ******** UserController ************ */
include_once($real_path . 'site_user.php');
/* * ******** User Auth ************ */
Auth::routes();
/* * ******** Company Auth ************ */
include_once($real_path . 'company_auth.php');
/* * ******** Admin Auth ************ */
include_once($real_path . 'admin_auth.php');

include_once($real_path . 'task.php');
include_once($real_path . 'notification.php');
include_once($real_path . 'mentor_auth.php');
include_once($real_path . 'skill_provider.php');
include_once($real_path . 'post.php');

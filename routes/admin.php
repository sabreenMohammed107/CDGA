<?php

Auth::routes();

Route::get('registerTest', function () {
    return view('auth.register');
});

Route::post('reg', 'Auth\TestController@create')->name('reg');

Route::get('/adminLogin', function () {
    return view('auth.login');
});

Route::namespace('Admin')->group(function () {
Route::get('/admin', 'AdminHomeController@home');
Route::get('/home', 'AdminHomeController@home');
/*--------------------branch----------------------*/
Route::resource('/admin/branch', 'BranchesController');
Route::post('dynamic_dependent/fetch', 'BranchesController@fetch')->name('dynamicdependent.fetch');
/*-------------------------partener-------------------*/
Route::resource('/admin/partener', 'PartenerController');
/*-------------------------clients-------------------*/
Route::resource('/admin/client', 'ClientController');

/*-------------------------btsNumber-------------------*/
Route::resource('/admin/number', 'BtsNumbersController');
/*-------------------------slider-------------------*/
Route::resource('/admin/slider', 'SliderController');
/*-------------------------subcategory-------------------*/
Route::resource('/admin/subcat', 'SubCategoryController');
/*-------------------------course-------------------*/
Route::resource('/admin/course', 'CoursesController');
Route::post('dynamicdependentCat/fetch', 'CoursesController@fetchCat')->name('dynamicdependentCat.fetch');
Route::post('saveRelated', 'CoursesController@saveRelated')->name('saveRelated');
Route::DELETE('deleteRelated/{id}', 'CoursesController@deleteRelated')->name('deleteRelated');

/*--------------------round----------------------*/
Route::resource('/admin/round', 'RoundController');
Route::post('dynamic_dependentCountry/fetch', 'RoundController@fetchCountry')->name('dynamic_dependentCountry.fetch');
/*-------------------------trainer-------------------*/
Route::resource('/admin/trainer', 'TraineerController');
/*-------------------------testimonial-------------------*/
Route::resource('/admin/testimonial', 'TestimonialController');
/*-------------------------Gallery-------------------*/
Route::resource('/admin/gallery', 'GalleryController');
/*-------------------------News Letter-------------------*/
Route::resource('/admin/newsLetter', 'NewsLetterController');
/*-------------------------Messages-------------------*/
Route::resource('/admin/message', 'MessagesController');
/*-------------------------Expertise-------------------*/
Route::resource('/admin/expertise', 'ExpertiseController');
/*-------------------------TeachCourses-------------------*/
Route::resource('/admin/teach', 'TeachCoursesController');
/*-------------------------Career-------------------*/
Route::resource('/admin/career', 'CareersController');
/*-------------------------JobApplicant-------------------*/
Route::resource('/admin/jobApplicant', 'JobApplicantController');
/*-------------------------Applicants-------------------*/
Route::resource('/admin/appl', 'ApplicantSpeakerController');
/*-------------------------CoursesApplicant-------------------*/
Route::resource('/admin/applCourse', 'CoursesApplicantController');
/*-------------------------RoundsApplicant-------------------*/
Route::resource('/admin/applRound', 'RoundsApplicantController');
/*-------------------------YearCalender-------------------*/
Route::resource('/admin/yearCalender', 'YearCalenderController');
/*-------------------------Country-------------------*/
Route::resource('/admin/country', 'CountryController');
/*-------------------------Venue-------------------*/
Route::resource('/admin/venue', 'VenueController');

/*-----------------------------------------------------------*/
Route::resource('/admin/usersList', 'UserListController');
Route::get('/resetPassword/{id}', 'UserListController@resetPassword')->name('resetPassword');
Route::post('editUserPassword', 'UserListController@editUserPassword')->name('editUserPassword');
});

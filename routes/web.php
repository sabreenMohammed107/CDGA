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

/*----------------------Home---------------------------*/

Route::get('/', 'IndexController@index');
Route::post('/sendMessage', 'IndexController@sendMessage');
Route::get('/courses/{category_id}/{subCategory_id}/{filter_type}', 'CourseController@filterCourses');
Route::get('/searchForm', 'CourseController@searchForm')->name('searchForm');
Route::post('/sendNewsLetter', 'IndexController@sendNewsLetter');
Route::get('/courseDetails/{id}', 'CourseController@courseDetails');
Route::post('/registerApplicants', 'CourseController@registerApplicants')->name('registerApplicants');
Route::get('/downloadBrochure/{course_id}', 'CourseController@downloadBrochure');
Route::get('/termsAndConditions', 'CourseController@terms');
Route::get('/requestInHouse/{course_id}', 'CourseController@requestInHouse');
Route::get('/registerCourse/{round_id}','CourseController@registerCourse');
Route::post('registerApplicantRounds','CourseController@registerApplicantRounds');
Route::post('/registerApplicantsDawnload', 'CourseController@registerApplicantsDawnload')->name('registerApplicantsDawnload');
Route::get('/refreshcaptcha', 'CourseController@refreshCaptcha')->name('refreshcaptcha');
/*-------------------------Sasa--------------------- */
/*-------------------------My Category-------------------------*/
Route::get('/category/{id}', 'CategoryController@index')->name('category');
Route::get('fetch_data', 'CategoryController@fetch_data');

/*-------------------------Public Training-------------------------*/

Route::get('/publicTraining', 'PublicTrainingController@index')->name('publicTraining');
Route::get('fetch_main', 'PublicTrainingController@fetch_main');
Route::get('/technicalTraining/{id}', 'PublicTrainingController@technicalTraining')->name('technicalTraining');
Route::get('/softTraining/{id}', 'PublicTrainingController@softTraining')->name('softTraining');
Route::get('/certiTraining/{id}', 'PublicTrainingController@certiTraining')->name('certiTraining');
Route::get('/it/{id}', 'PublicTrainingController@itTraining')->name('it');
Route::get('fetch_tech', 'PublicTrainingController@fetch_tech');
Route::get('fetch_soft', 'PublicTrainingController@fetch_soft');
Route::get('fetch_certi', 'PublicTrainingController@fetch_certi');
Route::get('fetch_it', 'PublicTrainingController@fetch_it');

/*-------------------------Testimonial-------------------------*/
Route::get('/tesimonial', 'TesimonialController@index')->name('tesimonial');
/*-------------------------contactUs-------------------------*/
Route::get('/contactus', 'ContactUsController@index')->name('contactus');
/*-------------------------speakers-------------------------*/
Route::get('/speakers', 'SpeakersController@index')->name('speakers');
Route::post('/speakerForm', 'SpeakersController@speakerForm')->name('speakerForm');
Route::post('speaker_dependentCountry/fetch', 'SpeakersController@fetchCountry')->name('speaker_dependentCountry.fetch');
/*-------------------------JoinUs-------------------------*/
Route::get('/joinus', 'JoinUsController@index')->name('joinus');
Route::post('/joinusForm', 'JoinUsController@joinusForm')->name('joinusForm');
/*-------------------------AboutUsController-------------------------*/
Route::get('/aboutUs', 'AboutUsController@index')->name('aboutUs');
Route::get('/conditions', 'AboutUsController@conditions')->name('conditions');
Route::get('/consunltancy', 'AboutUsController@Consunltancy')->name('consunltancy');
Route::get('/accreditations', 'AboutUsController@accreditations')->name('accreditations');
/*-----------------------------------------------------------*/
Route::post('/reducedForm', 'CourseController@reducedForm')->name('reducedForm');
/******************InHouse**************** */
Route::get('/inHouse', 'InHouseController@index')->name('inHouse');
Route::post('registerApplicantsHouse','InHouseController@registerApplicantsHouse');
/*---------------------------------------------------------------------*/

Route::get('/calender/{current}', 'CalenderController@getCal')->name('calender');
Route::get('/calenderNext/{current}', 'CalenderController@getCalNext')->name('calenderNext');



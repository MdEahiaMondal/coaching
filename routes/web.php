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

Route::get('/', function () {
    return view('backend.users.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/user-register', ['uses'=>'UserRegisterController@showRegisterForm', 'as' => 'user-register'])->middleware('auth');
Route::post('/user-register', ['uses'=>'UserRegisterController@userSave', 'as' => 'user-save'])->middleware('auth');
Route::get('/user-list', ['uses'=>'UserRegisterController@userList', 'as' =>'user-list']);
Route::get('/user-profile/{user}', ['uses'=>'UserRegisterController@userProfile', 'as' =>'user-profile']);
Route::get('/change-info/{user}', ['uses'=>'UserRegisterController@changeInfo', 'as' =>'change-info']);
Route::post('/user-info-update/{user}', ['uses'=>'UserRegisterController@updateInfo', 'as' =>'user-info-update']);
Route::get('/change-user-photo/{user}', ['uses'=>'UserRegisterController@changePhoto', 'as' =>'change-user-photo']);
Route::post('/user-photo-update/{user}', ['uses'=>'UserRegisterController@updatePhoto', 'as' =>'user-photo-update']);
Route::get('/user-password-change/{user}', ['uses'=>'UserRegisterController@changePassword', 'as' =>'user-password-change']);
Route::post('/user-password-update/{user}', ['uses'=>'UserRegisterController@updatePassword', 'as' =>'user-password-update']);



//************** home pages Route*****************
Route::get('/header-footer', ['uses'=>'HomePageController@showForm', 'as' =>'header-footer']);
Route::post('/header-footer-save', ['uses'=>'HomePageController@headerFooterSave', 'as' =>'header-footer-save']);
Route::get('/header-footer-manage/{id}', ['uses'=>'HomePageController@headerFooterManage', 'as' =>'header-footer-manage']);
Route::post('/header-footer-update/{id}', ['uses'=>'HomePageController@headerFooterUpdate', 'as' =>'header-footer-update']);


//************** Slider Route*****************
Route::get('/slider-create', ['uses'=>'SliderController@showForm', 'as' =>'slider-create']);
Route::post('/slider-save', ['uses'=>'SliderController@sliderrSave', 'as' =>'slider-save']);
Route::get('/slider-manage', ['uses'=>'SliderController@sliderManage', 'as' =>'slider-manage']);
Route::post('/slider-update/{id}', ['uses'=>'SliderController@sliderUpdate', 'as' =>'slider-update']);
Route::get('/slider-unpublish/{slider}', ['uses'=>'SliderController@sliderUnpublish', 'as' =>'slider-unpublish']);
Route::get('/slider-publish/{slider}', ['uses'=>'SliderController@sliderPublish', 'as' =>'slider-publish']);
Route::get('/photo-gallery', ['uses'=>'SliderController@photoGallery', 'as' =>'photo-gallery']);
Route::get('/slider-edit/{slider}', ['uses'=>'SliderController@sliderEdit', 'as' =>'slider-edit']);
Route::get('/slider-update/{slider}', ['uses'=>'SliderController@sliderUpdate', 'as' =>'slider-update']);
Route::get('/slider-delete/{slider}', ['uses'=>'SliderController@sliderDelete', 'as' =>'slider-delete']);



/* *************************************************** Our Main Work Start hear *********************************************** */



// ********************school managment Route***************************

Route::get('add-school', ['uses' => 'SchoolManagementController@addSchool', 'as' => 'add-school']);
Route::post('school-store', ['uses' => 'SchoolManagementController@store', 'as' => 'school-store']);
Route::get('school-show', ['uses' => 'SchoolManagementController@show', 'as' => 'school-show']);
Route::get('school-edit/{school}', ['uses' => 'SchoolManagementController@edit', 'as' => 'school-edit']);
Route::post('school-update/{school}', ['uses' => 'SchoolManagementController@update', 'as' => 'school-update']);
Route::get('school-delete/{school}', ['uses' => 'SchoolManagementController@destroy', 'as' => 'school-delete']);
Route::get('/school-unpublish/{school}', ['uses'=>'SchoolManagementController@schoolUnpublish', 'as' =>'school-unpublish']);
Route::get('/school-publish/{school}', ['uses'=>'SchoolManagementController@schoolPublish', 'as' =>'school-publish']);



// ********************Class managment Route***************************
Route::get('class-index', ['uses' => 'ClassNameController@index', 'as' => 'class.index']);
Route::get('add-class', ['uses' => 'ClassNameController@create', 'as' => 'add-class']);
Route::post('class-store', ['uses' => 'ClassNameController@store', 'as' => 'class-store']);
Route::get('class-show', ['uses' => 'ClassNameController@show', 'as' => 'class-show']);
Route::get('class-edit/{class}', ['uses' => 'ClassNameController@edit', 'as' => 'class-edit']);
Route::post('class-update/{class}', ['uses' => 'ClassNameController@update', 'as' => 'class-update']);
Route::get('class-delete/{class}', ['uses' => 'ClassNameController@destroy', 'as' => 'class-delete']);
Route::get('/class-unpublish/{class}', ['uses'=>'ClassNameController@classUnpublish', 'as' =>'class-unpublish']);
Route::get('/class-publish/{class}', ['uses'=>'ClassNameController@classPublish', 'as' =>'class-publish']);



// ********************Batch managment Route***************************
Route::get('get.batch.data', 'BatchController@fetchData')->name('get.batch.data');
Route::get('batch/unpublished', 'BatchController@unpublished')->name('batch.unpublished');
Route::get('batch/published', 'BatchController@published')->name('batch.published');
Route::resource('batch', 'BatchController');
Route::post('batch/class-wise-student-type', 'BatchController@classWiseStudentType')->name('class.wise.student-type');


//*****************************Student Type******************************
Route::get('student-type-list', 'StudentTypeController@studentTypeList')->name('student.type.list');
Route::resource('student_types', 'StudentTypeController');
Route::post('student-type-status-change', 'StudentTypeController@statusChange')->name('student.type.status-publish-un-publish');



//*************** student register controller ****************
Route::resource('studentregister', 'StudentRegisterController');
Route::post('student-register/class-wise-student-type', 'StudentRegisterController@classWiseStudentTypeShow')->name('student.registration.class.wise.student-type');
Route::post('student-register/class-and-student-type-wise-batch', 'StudentRegisterController@classAndStudentTypeWiseBatchTypeShow')->name('student.registration.class-and-student-type-wise-batch');
Route::get('student-register/class-wise-student-form', 'StudentRegisterController@classWiseStudentFormShow')->name('student.registration.class-wise-student-form');
Route::post('student-register/class-wise-student-type-show-for-student', 'StudentRegisterController@classWiseStudentTypeShowForStudents')->name('student.registration.class-wise-student-type-show-for-student');
Route::post('student-register/class-and-student-type-wise-students-show', 'StudentRegisterController@classAndStudentTypeWiseStudentsShow')->name('student.registration.class-and-student-type-wise-students-show');











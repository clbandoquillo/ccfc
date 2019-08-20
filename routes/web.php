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
use Adldap\Laravel\Facades\Adldap;



Auth::routes([
    'reset' => false,
    'verify' => false,
    'register' => false
]);

Route::get('/dashboard', 'HomeController@dashboard');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/','HomeController@index');

Route::group(['middleware' => 'auth'], function () {

//Teacher
    Route::get('/teacher/dashboard', 'TeacherController@dashboard')->name('teacherDashboard');
    Route::get('/teacher/beadle/add', 'TeacherController@beadleAddP')->name('beadleAddP');
    Route::get('/teacher/{class}/students', 'TeacherController@assignBeadle')->name('assignBeadle');
    Route::get('/teacher/{class}/beadle', 'TeacherController@getBeadle');
    Route::get('/teachers/approval', 'TeacherController@forApproval')->name('forApproval');
    Route::get('/attendance/approval/{id}', 'TeacherController@getAttendance')->name('getAttendance');
    Route::post('/teacher/beadle/store', 'TeacherController@storeBeadles')->name('storeBeadles');
    Route::post('/teacher/evaluate/attendance', 'TeacherController@teacherAttEvalStore')->name('teacherAttEvalStore');
//Student
    Route::get('/student/dashboard', 'StudentController@dashboard')->name('studentDashboard');
    Route::get('/class/{classCode}/students/attendance', 'StudentController@getStudAttendanceFrm')->name('getStudAttendanceFrm');
    Route::post('/{classCode}/attendance/submit', 'StudentController@storeStudAttnd');

//Class
    Route::get('/class/{code}/class-atendance', 'ClassController@sClassAttendance')->name('sClassAttendance');
});

Auth::routes();


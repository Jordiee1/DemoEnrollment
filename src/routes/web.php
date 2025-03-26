<?php

Route::get('/home', function () {

    if (Auth::user()) {
        if (in_array(Auth::user()->load('roles')->roles[0]->pivot->role_id, [1, 2])) {
            return redirect()->route('admin.dashboard')->with('status', session('status'));
        } else {
            return redirect()->route('home')->with('status', session('status'));
        }
    }

    return redirect()->route('home');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('enroll/login/{course}', 'EnrollmentController@handleLogin')->name('enroll.handleLogin')->middleware('auth');
Route::get('enroll/{course}', 'EnrollmentController@create')->name('enroll.create');
Route::post('enroll/{course}', 'EnrollmentController@store')->name('enroll.store');
Route::get('my-courses', 'EnrollmentController@myCourses')->name('enroll.myCourses')->middleware('auth');
Route::resource('courses', 'CourseController')->only(['index', 'show']);

Route::get('profile', 'ProfileController@index')->name('profile')->middleware('auth');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'is_admin']], function () {

    Route::get('/', 'HomeController@index')->name('dashboard');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Disciplines
    Route::delete('disciplines/destroy', 'DisciplinesController@massDestroy')->name('disciplines.massDestroy');
    Route::resource('disciplines', 'DisciplinesController');

    // Institutions
    Route::delete('institutions/destroy', 'InstitutionsController@massDestroy')->name('institutions.massDestroy');
    Route::post('institutions/media', 'InstitutionsController@storeMedia')->name('institutions.storeMedia');
    Route::resource('institutions', 'InstitutionsController');

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');
    Route::resource('courses', 'CoursesController');

    // Enrollments
    Route::delete('enrollments/destroy', 'EnrollmentsController@massDestroy')->name('enrollments.massDestroy');
    Route::resource('enrollments', 'EnrollmentsController');
});
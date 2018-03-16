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
    return view('welcome');
});

//manage user
Route::prefix('user')->group(function () {
    Route::get('login', 'Auth\LoginController@loginForm')->name('user.login-form');
    Route::post('login', 'Auth\LoginController@login')->name('user.login');
    Route::get('index', 'HomeController@index')->name('user.index');

    Route::middleware(['web.auth'])->group(function () {
        Route::post('logout', 'Auth\LoginController@logout')->name('user.logout');

        /**
         * update user
         */
        Route::resource('user', 'UpdateUserController');

        /**
         * change password user
         */
        Route::get('changePassword', 'HomeController@showChangePasswordForm')->name('user.changePassword');
        Route::post('changePassword', 'HomeController@changePassword')->name('changePassword');

        /**
         * User Absence
         */
        Route::resource('absence', 'User\UserAbsenceController');

        /**
         * User Report
         */
        Route::resource('report', 'User\UserReportController');

        /**
         * User Roll Call
         */
        Route::get('rollcall/showAllRollCall', 'User\UserRollCallController@showAllRollCall')
            ->name('rollcall.showAllRollCall');
        Route::get('rollcall/search', 'User\UserRollCallController@search')->name('rollcall.search');
        Route::get('rollcall/statistic', 'User\UserRollCallController@statistic')->name('rollcall.statistic');
        Route::resource('rollcall', 'User\UserRollCallController');

        /**
         * User Overtime
         */
        Route::get('overtime/search', 'User\UserOvertimeController@search')->name('overtime.search');
        Route::get('overtime/statistic', 'User\UserOvertimeController@statistic')->name('overtime.statistic');
        Route::resource('overtime', 'User\UserOvertimeController');
    });
});

Route::prefix('admin')->group(function () {
    //Admin Log in
    Route::get('login', 'Auth\AdminController@loginForm')->name('admin.login-form');
    Route::post('login', 'Auth\AdminController@login')->name('admin.login');
    Route::middleware(['admin.auth'])->group(function () {
        Route::post('logout', 'Auth\AdminController@logout')->name('admin.logout');
        Route::get('/', 'AdminController@index')->name('admin.index');

       /**
        * Manage user
        */
        Route::resource('user', 'ManageUserController', ['as' => 'admin']);
        Route::put('user/{id}/update-image', 'ManageUserController@updateImage')->name('admin.user.update.image');
        Route::put('user/{id}/update-image', 'UserProfileController@updateImage')->name('admin.user.update.image');

        /**
         * change password admin
         */
        Route::resource('changepassword', 'Admin\ChangePassword', ['as' => 'admin']);

        /**
         * Manage absence
         */
        Route::resource('absence', 'Admin\AbsenceController', ['as' => 'admin']);

        /**
         * Manage roll call
         */
        Route::post('rollcall/updateStatistic', 'Admin\RollCallController@selectStatistic')
            ->name('admin.rollcall.updateStatistic');
        Route::get('rollcall/showRollCall/{user_id}', 'Admin\RollCallController@showRollCall')
            ->name('admin.rollcall.showRollCall');
        Route::get('rollcall/search', 'Admin\RollCallController@search')->name('admin.rollcall.search');
        Route::get('rollcall/statistic', 'Admin\RollCallController@statistic')->name('admin.rollcall.statistic');
        Route::resource('rollcall', 'Admin\RollCallController', ['as' => 'admin']);
        /**
         * Manage report
         */
        Route::resource('report', 'Admin\ManageReportController', ['as' => 'admin']);

        /**
         * Manage overtime
         */
        Route::get('overtime/showOvertime/{user_id}', 'Admin\OvertimeController@showOvertime')
            ->name('admin.overtime.showOvertime');
        Route::get('overtime/search', 'Admin\OvertimeController@search')->name('admin.overtime.search');
        Route::get('overtime/statistic', 'Admin\OvertimeController@statistic')->name('admin.overtime.statistic');
        Route::resource('overtime', 'Admin\OvertimeController', ['as' => 'admin']);
    });
    /**
     * admin reset password
     */
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')
        ->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')
        ->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')
        ->name('admin.password.reset');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

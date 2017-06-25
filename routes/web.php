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

Route::group(['middleware' => ['auth']], function () {


    Route::group(['middleware' => ['can:view,car']], function () {
        Route::get('/car/{car}', 'CarController@show')->name('show_car')->middleware('can:view,car');
        Route::get('/car/{car}/edit', 'CarController@edit')->name('edit_car');
        Route::post('/car/{car}/update', 'CarController@update')->name('update_car');
        Route::get('/car/{car}/delete', 'CarController@delete_form')->name('delete_car_form');
        Route::POST('/car/{car}/delete', 'CarController@delete')->name('delete_car');
    });
    //CAR related routes
    Route::get('/cars', 'CarController@index')->name('cars');
    Route::get('/car/add', 'CarController@showForm')->name('add_car');
    Route::post('/car', 'CarController@store');


    //RECORD related routes
    Route::group(['middleware' => ['can:view,car']], function () {
        Route::get('/car/{car}/record/add', 'RecordController@showForm')->name('add_record');
        Route::get('/car/{car}/record/{record}/edit', 'RecordController@edit')->name('edit_record');
        Route::get('/car/{car}/records', 'RecordController@index')->name('show_records');
        Route::post('/car/{car}/record', 'RecordController@store');
    });
    Route::post('/record/{record}/update', 'RecordController@update')->name('update_record');
    Route::delete('/record/{record}', 'RecordController@delete')->name('delete_record');

    //REMINDER related routes
    Route::group(['middleware' => ['can:view,car']], function () {
        Route::get('/car/{car}/reminder/new', 'ReminderController@showForm')->name('add_reminder_form');
        Route::post('/car/{car}/reminder', 'ReminderController@store')->name('add_reminder');
        Route::get('/car/{car}/reminder/{reminder}/step/2','ReminderController@stepTwo')->name('add_reminder_step_two');
        Route::post('/car/{car}/reminder/{reminder}/step/3','ReminderController@stepThree')->name('add_reminder_step_three');
        Route::post('/car/{car}/reminder/{reminder}/step/4','ReminderController@stepFour')->name('add_reminder_step_four');
        Route::get('/car/{car}/reminder/{reminder}', 'ReminderController@show')->name('show_reminder');
        Route::get('/car/{car}/reminder/{reminder}/edit', 'ReminderController@edit')->name('edit_reminder');
        Route::get('/car/{car}/reminder/{reminder}/add/record', 'ReminderController@addRecord')->name('reminder_add_record');
        Route::post('/car/{car}/reminder/{reminder}/add/record', 'ReminderController@saveRecord')->name('reminder_save_record');
    });

    Route::post('/reminder/{reminder}/update', 'ReminderController@update')->name('update_reminder');




    Route::get('/','CarController@index');
});
Auth::routes();

Route::get('/home', 'HomeController@index');

/*
 * Servisu tipai:
 * Oil change
 * Tire rotation
 * Safety inspection
 *
 * Belt/chain change (by miles)
 * Tire change (by miles/time)
 *
 * Custom
 */
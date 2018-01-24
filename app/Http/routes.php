<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/**
 * @return Findings Controller
 */
Route::get('/', function(){
    return Redirect::to('login');
});

Route::get('home','FindingsController@index');
Route::get('about','FindingsController@about');
Route::get('{id}/edit','FindingsController@edit');
Route::get('view_findings/{id}','FindingsController@show');
Route::get('create_new','FindingsController@create');
Route::post('/create_new','FindingsController@store');
Route::get('excel','ExcelController@index');


/**
 * @return Set Default Audit Title
 */
Route::get('default_title','TitleController@set_default_audit_title');




/**
 * @return Action Controller
 */
Route::get('action_new/{finding_num}','ActionController@action_new');
Route::post('action_new/{finding_num}','ActionController@store');

/**
 * @return Ajax Controller
 */
Route::get('get_organization','AjaxController@get_organization');
Route::get('get_item','AjaxController@get_item');
Route::get('get_cause_category','AjaxController@get_cause_category');

/**
 * @return Overdue Findings
 */
Route::get('overdue','OverdueController@index');



/**
 * @return Department Controller
 */
Route::get('department','DepartmentController@index');
Route::post('department','DepartmentController@store');
Route::PATCH('department/{id}/edit','DepartmentController@edit');
Route::post('department/{id}/edit','DepartmentController@update');
Route::PATCH('department/{id}/delete','DepartmentController@destroy');
Route::post('department/{id}/delete','DepartmentController@delete');


/**
 * @return Cause Category Controller
 */
Route::get('cause_category','CauseController@index');
Route::post('cause_category','CauseController@store');
Route::PATCH('cause_category/{id}/edit','CauseController@edit');
Route::post('cause_category/{id}/edit','CauseController@update');
Route::PATCH('cause_category/{id}/delete','CauseController@destroy');
Route::post('cause_category/{id}/delete','CauseController@delete');


/**
 * @return Send Email
 */
Route::get('email','EmailController@index');


/**
 * @return Export to Excel
 */
Route::get('excel/{finding_id},{finding_num}','ExcelController@export_each_findings');
Route::post('department','DepartmentController@store');
Route::PATCH('department/{id}/edit','DepartmentController@edit');
Route::post('department/{id}/edit','DepartmentController@update');
Route::PATCH('department/{id}/delete','DepartmentController@destroy');
Route::post('department/{id}/delete','DepartmentController@delete');



/**
 * @return Authentication Controller
 */
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');





/**
 *@return test site
 */
Route::get('testsite', function(){
        return  view('pages.test');
});
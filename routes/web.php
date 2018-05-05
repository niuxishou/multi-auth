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

Route::get('/', 'WelcomeController@index');
Route::post('/', 'WelcomeController@search');
Route::get('/apply', function () {
    return view('apply');
});
Route::post('/apply', 'ApplyController@apply')->name('apply');
Route::get('/signup', function () {
    return view('signup');
});
Route::post('/signup', 'SignupController@signup')->name('signup');
Route::get('/thanks', function () {
    return view('thanks');
});
Route::get('/thankyou', function () {
    return view('thankyou');
});
Route::get('/thankyouforapplying', function () {
    return view('thankyouforapplying');
});
Route::get('/sorry', function () {
    return view('sorry');
});

Route::get('/search', function () {
    return view('search');
});
Route::get('/search_result/{name?}', 'SearchResultController@search');
Route::get('/search_pref/{pref?}', 'SearchPrefController@search');
Route::get('/search_district/{district?}', 'SearchDistrictController@search');
Route::get('/search_detail', 'SearchDetailController@search');
Route::get('/show_stylist', 'ShowStylistController@index');

Route::get('/show_reviews', function () {
    return view('show_reviews');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/edit_user', 'UserController@edit_user');
Route::post('/edit_user', 'UserController@edit_user');
Route::get('/edit_finish', 'UserController@edit_finish');
Route::get('/order_stylist', 'OrderStylistController@order');
Route::post('/order_stylist', 'OrderStylistController@order');
Route::get('/list_order', 'UserController@list_order');
Route::get('/view_order', 'UserController@view_order');
Route::post('/view_order', 'UserController@view_order');
Route::get('/point_history', 'UserController@point_history');
Route::get('/point_purchase', 'UserController@point_purchase');
Route::post('/point_purchase', 'UserController@point_purchase');
Route::get('/select_payment', 'UserController@select_payment');
Route::post('/select_payment', 'UserController@post_payment');
Route::get('/bank_payment', 'UserController@bank_payment');
Route::post('/bank_payment', 'UserController@bank_payment');
Route::get('/credit_payment', 'UserController@credit_payment');
Route::post('/credit_payment', 'UserController@credit_payment');
Route::get('/create_review', 'CreateReviewController@create_review');
Route::post('/create_review', 'CreateReviewController@create_review');

    //Route::get('admin/register', 'Admin\LoginController@getRegister');
    //Route::post('admin/register', 'Admin\LoginController@postRegister');
    //Route::get('admin', 'AdminController@index');

Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Admin\LoginController@login')->name('admin.login.submit');
Route::get('admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
Route::get('admin/home', 'Admin\HomeController@list')->name('admin.home');
Route::get('admin/list_applicant', 'AdminController@list_applicant');
Route::post('admin/list_applicant', 'AdminController@list_applicant');
Route::get('admin/edit_applicant', 'AdminController@edit_applicant');
Route::post('admin/edit_applicant', 'AdminController@edit_applicant');
Route::get('admin/edit_admin', 'AdminController@edit_admin');
Route::post('admin/edit_admin', 'AdminController@edit_admin');
Route::get('admin/edit_stylistadmin', 'AdminController@edit_stylistadmin');
Route::post('admin/edit_stylistadmin', 'AdminController@edit_stylistadmin');
Route::get('admin/interview_applicant', 'AdminController@interview_applicant');
Route::post('admin/interview_applicant', 'AdminController@interview_applicant');
Route::get('admin/register_worker', 'AdminController@register_worker');
Route::post('admin/register_worker', 'AdminController@register_worker');
Route::get('admin/list_admin', 'AdminController@list_admin');
Route::get('admin/list_stylistadmin', 'AdminController@list_stylistadmin');
Route::get('admin/list_worker', 'AdminController@list_worker');
Route::post('admin/list_worker', 'AdminController@list_worker');

Route::get('admin/list_pointpay', 'AdminController@list_pointpay');
Route::post('admin/list_pointpay', 'AdminController@list_pointpay');

Route::get('admin/list_user', 'AdminController@list_user');
Route::post('admin/list_user', 'AdminController@search_user');
Route::get('admin/view_user', 'AdminController@view_user');
Route::get('admin/view_worker', 'AdminController@view_worker');

Route::get('admin/view_info', 'AdminController@view_info');
Route::get('admin/edit_info', 'AdminController@edit_info');
Route::post('admin/edit_info', 'AdminController@edit_info');
Route::get('admin/info_editfinish', 'AdminController@info_editfinish');

Route::get('admin/list_order', 'AdminController@list_order');
Route::post('admin/list_order', 'AdminController@search_order');
Route::get('admin/view_order', 'AdminController@view_order');
Route::get('admin/edit_user', 'AdminController@edit_user');
Route::post('admin/edit_user', 'AdminController@edit_user');
Route::get('admin/create_admin', 'AdminController@create_admin');
Route::post('admin/create_admin', 'AdminController@create_admin');
Route::get('admin/create_stylistadmin', 'AdminController@create_stylistadmin');
Route::post('admin/create_stylistadmin', 'AdminController@create_stylistadmin');
Route::get('admin/create_user', 'AdminController@create_user');
Route::post('admin/create_user', 'AdminController@create_user');
Route::get('admin/edit_worker', 'AdminController@edit_worker');
Route::post('admin/edit_worker', 'AdminController@edit_worker');
Route::get('admin/admin_finish', 'AdminController@admin_finish');
Route::get('admin/stylistadmin_finish', 'AdminController@stylistadmin_finish');
Route::get('admin/user_finish', 'AdminController@user_finish');
Route::get('admin/admin_editfinish', 'AdminController@admin_editfinish');
Route::get('admin/stylistadmin_editfinish', 'AdminController@stylistadmin_editfinish');
Route::get('admin/worker_editfinish', 'AdminController@worker_editfinish');
Route::get('admin/user_editfinish', 'AdminController@user_editfinish');

Route::get('stylistadmin/login', 'StylistAdmin\LoginController@showLoginForm')->name('stylistadmin.login');
Route::post('stylistadmin/login', 'StylistAdmin\LoginController@login');
Route::get('stylistadmin/logout', 'StylistAdmin\LoginController@logout')->name('stylistadmin.logout');
Route::get('stylistadmin/home', 'StylistAdmin\HomeController@list')->name('stylistadmin.home');
Route::get('stylistadmin/edit_applicant', 'StylistAdminController@edit_applicant');
Route::post('stylistadmin/edit_applicant', 'StylistAdminController@edit_applicant');
Route::get('stylistadmin/interview_applicant', 'StylistAdminController@interview_applicant');
Route::post('stylistadmin/interview_applicant', 'StylistAdminController@interview_applicant');
Route::get('stylistadmin/list_applicant', 'StylistAdminController@list_applicant');
Route::post('stylistadmin/list_applicant', 'StylistAdminController@list_applicant');
Route::get('stylistadmin/list_worker', 'StylistAdminController@list_worker');
Route::post('stylistadmin/list_worker', 'StylistAdminController@list_worker');
Route::get('stylistadmin/view_worker', 'StylistAdminController@view_worker');
Route::get('stylistadmin/edit_worker', 'StylistAdminController@edit_worker');
Route::post('stylistadmin/edit_worker', 'StylistAdminController@edit_worker');
Route::get('stylistadmin/worker_editfinish', 'StylistAdminController@worker_editfinish');
Route::get('stylistadmin/list_order', 'StylistAdminController@list_order');
Route::post('stylistadmin/list_order', 'StylistAdminController@search_order');
Route::get('stylistadmin/view_order', 'StylistAdminController@view_order');

Route::get('worker/login', 'Worker\LoginController@showLoginForm')->name('worker.login');
Route::post('worker/login', 'Worker\LoginController@login');
Route::get('worker/logout', 'Worker\LoginController@logout')->name('worker.logout');
Route::get('worker/home', 'Worker\HomeController@index')->name('worker.home');
Route::get('worker/edit_worker', 'WorkerController@edit_worker');
Route::post('worker/edit_worker', 'workerController@edit_worker');
Route::get('worker/worker_editfinish', 'workerController@worker_editfinish');
Route::get('worker/list_order', 'WorkerController@list_order');
Route::get('worker/view_order', 'WorkerController@view_order');
Route::post('worker/view_order', 'WorkerController@view_order');
Route::get('worker/schedule', 'WorkerController@schedule');
Route::post('worker/schedule', 'WorkerController@schedule');
Route::get('worker/edit_schedule', 'WorkerController@edit_schedule');
Route::post('worker/edit_schedule', 'WorkerController@edit_schedule');
Route::get('worker/list_review', 'WorkerController@list_review');

Route::get('worker/view_karte', 'WorkerController@view_karte');
Route::get('worker/create_karte', 'WorkerController@create_karte');
Route::post('worker/create_karte', 'WorkerController@create_karte');
Route::get('worker/create_report', 'WorkerController@create_report');
Route::post('worker/create_report', 'WorkerController@create_report');
Route::get('worker/edit_karte', 'WorkerController@edit_karte');
Route::post('worker/edit_karte', 'WorkerController@edit_karte');

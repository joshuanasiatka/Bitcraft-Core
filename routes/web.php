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

Route::get('/', function() {
  if (Auth::user()->isAdmin)
    return redirect('dashboard');
  else
    return redirect('portal');
})->middleware('auth');

Route::get('/portal', function () {
    return view('portal');
})->middleware('auth');

Route::get('/portal/knowledge-base', function () {
    return view('portal_kb');
})->middleware('auth');

Route::get('/portal/kb/{name}', function($name = 'Unknown Article') {
    return view('portal_kb_article');
})->where('name', '([A-Za-z0-9\-\_]+)')->middleware('auth');

Route::get('/portal/kb/categories/{name}', function($name = 'Unknown Category') {
    return view('portal_kb_cat');
})->where('name', '([A-Za-z0-9\-\_]+)')->middleware('auth');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

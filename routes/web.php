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

Auth::routes();

Route::get('member/index','MemberController@index')->name('member.index');
Route::get('member/create','MemberController@create')->name('member.create');
Route::post('member/store','MemberController@store')->name('member.store');
Route::get('member/show/{id}','MemberController@show')->name('member.show');
Route::get('member/edit/{id}','MemberController@edit')->name('member.edit');
Route::post('member/update/{id}','MemberController@update')->name('member.update');
Route::post('member/destroy/{id}','MemberController@destroy')->name('member.destroy');

Route::get('/home', 'HomeController@index')->name('home');

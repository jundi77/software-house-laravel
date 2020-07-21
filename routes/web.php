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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index_for_questions')->name('home');

Route::post('store','QuestionController@store')->name('store');

Route::post('store','AnswerController@store')->name('store');

Route::get('/q', 'QuestionController@index')->name('question');

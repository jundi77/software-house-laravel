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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Auth::routes();

// q itu question, a itu answer

Route::get('/home', 'HomeController@index_for_questions')->name('home_q');

Route::get('/home/a', 'HomeController@index_for_answers')->name('home_a');

Route::post('store','QuestionController@store')->name('store');

Route::post('store','AnswerController@store')->name('store');

Route::get('/q', 'QuestionController@index')->name('question');

Route::get('/pertanyaan', function(Request $request){
    if($request->has('search')){
        return App::call('App\Http\Controllers\QuestionController@search');
    }else {
        return App::call('App\Http\Controllers\QuestionController@displayLatestQuestion');
    }
})->name('question.show_all');
Route::get('/pertanyaan/{id}', 'QuestionController@showQuestionWithAnswer')->name('question.show');

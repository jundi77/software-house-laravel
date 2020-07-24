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

Route::prefix('jawaban')->group(function ()
{
    Route::post('/store','AnswerController@store')->name('answer.store');
    Route::put('/update/{id}','AnswerController@update')->name('answer.update');
    Route::delete('/delete/{id}','AnswerController@delete')->name('answer.delete');
});

Route::get('/q', 'QuestionController@index')->name('question');

Route::prefix('pertanyaan')->group(function()
{
    Route::get('/', function(Request $request)
    {
        if($request->has('search') and !empty($request->search)){
            return App::call('App\Http\Controllers\QuestionController@search');
        }return App::call('App\Http\Controllers\QuestionController@displayLatestQuestion');
    })->name('question.show_all');
    Route::get('/{id}', 'QuestionController@showQuestionWithAnswer')->name('question.show');
    Route::post('/store', 'QuestionController@store')->name('question.store');
    Route::put('/update/{id}', 'QuestionController@update')->name('question.update');
    Route::delete('/delete/{id}', 'QuestionController@delete')->name('question.delete');
});
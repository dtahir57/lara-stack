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

Auth::routes();

Route::get('/', 'HomeController@allQuestions');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{slug}', 'HomeController@profile');
Route::get('/home/{id}/edit', 'QuestionsController@edit')->name('question.edit');
Route::post('/home/update/{q}', 'QuestionsController@update')->name('updateQuestion');
Route::get('/home/destroy/{q}', 'QuestionsController@destroy')->name('destroyQuestion');
Route::get('/question', 'HomeController@askQuestion');
Route::post('/question', 'QuestionsController@store')->name('postQuestion');
Route::get('/questions/{q}', 'FrontEndQuestionCont@show');
Route::post('/questions/{q}', 'AnswerController@postAnswer')->name('postAnswer');
Route::get('/answers/{a}/edit', 'AnswerController@edit')->name('answer.edit');
Route::patch('/questions/update/{a}', 'AnswerController@update')->name('answer.update');
Route::get('/questions/destroy/{a}', 'AnswerController@destroy');
Route::post('comments', 'CommentController@postComment')->name('postComment');
Route::post('a_comments', 'CommentController@postCommentsOnAnswer')->name('postCommentsOnAnswer');
Route::get('comments/{c}/edit', 'CommentController@edit');
Route::patch('comments/update/{comment}', 'CommentController@update')->name('updateComment');
Route::get('comments/destroy/{c}', 'CommentController@destroy');
Route::post('/rate', 'RateController@post')->name('rate.post');

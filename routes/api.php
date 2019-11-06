<?php

use Illuminate\Http\Request;

// get all the question from api
Route::get('question', 'QuestionController@index');


//update a question

Route::put('question/{id}', 'QuestionController@update');
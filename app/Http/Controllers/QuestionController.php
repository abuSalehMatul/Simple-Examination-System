<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    public function index()
    {
        return Question::all();
    }
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->update($request->all());
        return $question;
    }
}

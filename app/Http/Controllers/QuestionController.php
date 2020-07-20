<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    //
    public function store(Request $request)
    {
        Question::create([
            'question' => $request->question
        ]);
        return redirect()->back();
    }
}

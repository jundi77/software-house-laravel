<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Answer;

class AnswerController extends Controller
{
    //
    public function store(Request $request)
    {
        Answer::create([
            'answer' => $request->answer
        ]);
        return redirect()->back();
    }
}

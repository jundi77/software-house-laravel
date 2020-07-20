<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    //check apakah sudah login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        Question::create([
            'question' => $request->question
        ]);
        return redirect()->back();
    }
}

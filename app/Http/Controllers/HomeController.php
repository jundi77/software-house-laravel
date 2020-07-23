<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index_for_questions()
    {
        $QuestionController = new QuestionController;
        $questions = $QuestionController->questions_from_self();
        return view('home', compact('questions'));
    }
    
    public function index_for_answers()
    {
        $AnswerController = new AnswerController;
        $answers = $AnswerController->answers_from_self();
        return view('home-a',compact('answers'));
    }
}

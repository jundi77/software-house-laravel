<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
  
    public function index(Request $request)
    {
        $questions = Question::select('questions.id as question_id',
                                         'questions.user_id as author_id',
                                         'title','description',
                                         'questions.created_at',
                                         'questions.updated_at',)
                                ->addSelect(['name','profile_picture_path'],
                                            User::whereColumn('user_id','users.id'));

        if($request->has('search')){
            // cek kalau mau mencari pertanyaan
            $questions = $questions->where('question', 'like', '%'.$request->search.'%');
        }
    }

    public function questions_from_self()
    {
        $questions = Question::select('questions.id as question_id',
                                         'questions.user_id as author_id',
                                         'title','description',
                                         'questions.created_at',
                                         'questions.updated_at',)
                                ->where('questions.user_id','=',Auth::user()->id)
                                ->orderBy('created_at','desc')
                                ->get();
        /*
         *  Untuk user_id, profile_picture_path, dan author_name
         *  bisa menggunakan value yang sudah ada di
         *  Auth::user().
         *  
         *  return dd($questions, Auth::user()->id, Auth::user()->name, Auth::user()->profile_picture_path);
         */
        return $questions;
    }

    public function displayLatestQuestion()
    {
        $questions = Question::orderBy('created_at', 'desc')->paginate(10);

        return view('question.question', compact('questions'));
    }

    public function showQuestionWithAnswer($question_id)
    {
        $answers = Answer::find($question_id);
        $question = Question::find($question_id);
        if (!is_null($answers)) {
            $answers = $answers->paginate(15);
        }
        return view('question.QuestionWithAnswer',compact('answers','question'));
    }
}

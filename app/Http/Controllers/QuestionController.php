<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
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
        $questions = DB::table('questions')
                                ->select('questions.id as question_id',
                                         'questions.user_id as author_id',
                                         'question',
                                         'questions.created_at',
                                         'questions.updated_at',
                                         'users.name as author_name',
                                         'users.profile_picture_path')
                                ->leftJoin('users','user_id','=','users.id');

        if($request->has('search')){
            // cek kalau mau mencari pertanyaan
            $questions = $questions->where('question', 'like', '%'.$request->search.'%');
        }
    }

    public function questions_from_self()
    {
        $questions = DB::table('questions')
                                ->select('questions.id as question_id',
                                         'questions.user_id as author_id',
                                         'question',
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
}

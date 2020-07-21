<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AnswerController extends Controller
{
    //check apakah sudah login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        Answer::create([
            'answer' => $request->answer
        ]);
        return redirect()->back();
    }

    public function answers_from_self()
    {
        $answers = DB::table('answers')
                                ->select('answers.id as answers_id',
                                         'answers.user_id as author_id',
                                         'answer',
                                         'answers.question_id',
                                         'answers.created_at',
                                         'answers.updated_at',)
                                ->where('answers.user_id','=',Auth::user()->id)
                                ->orderBy('created_at','desc')
                                ->get();
        /*
         *  Untuk user_id, profile_picture_path, dan author_name
         *  bisa menggunakan value yang sudah ada di
         *  Auth::user().
         *  
         *  return dd($questions, Auth::user()->id, Auth::user()->name, Auth::user()->profile_picture_path);
         */
        return $answers;
    }
}

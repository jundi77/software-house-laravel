<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


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
        // dd($request->title);
        Question::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $user_id
        ]);
        return redirect()->back()->with('success','Pertanyaan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $question = Question::find($id);
        if($question->user_id == Auth::user()->id) {
            $question->title = $request->input('title');
            $question->description = $request->input('description');
            $question->updated_at = Carbon::now();
            $question->save();
            return redirect()->back()->with('success', 'Pertanyaan berhasil diubah');
        }
        return redirect()->back()->with('failed', 'Pertanyaan gagal dirubah');
    }

    public function delete(Request $request, $id)
    {
        $question = Question::find($id);
        if($question->user_id == Auth::user()->id) {
            $question->delete();
            return redirect(route('home_q'))->with('success', 'Pertanyaanmu berhasil dihapus');
        }
        return redirect()->back()->with('failed', 'Pertanyaan gagal dihapus');
    }
  
    public function search(Request $request)
    {
        $questions = Question::where('title', 'like', '%'.$request->search.'%')->orderBy('created_at','desc')->paginate(10)->appends(request()->except('page'));
        // return dd($request->url());
        return view('question.questionSearch',compact('questions','request'));
    }

    public function questions_from_self()
    {
        $questions = Question::where('questions.user_id','=',Auth::user()->id)
                                ->orderBy('created_at','desc')
                                ->paginate(10);
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
        $answers = Answer::where('question_id',$question_id);
        $question = Question::find($question_id);
        if (!is_null($answers)) {
            $answers = $answers->paginate(15);
        }
        if(is_null($question)) {
            return redirect(route('question.show_all'));
        }
        return view('question.QuestionWithAnswer',compact('answers','question'));
    }
}

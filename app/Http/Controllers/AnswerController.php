<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Answer;
use Carbon\Carbon;
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
            'answer' => $request->answer,
            'user_id' => $user_id,
            'question_id' => $request->question_id
        ]);
        return redirect()->back()->with('success','Jawaban berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $answer = Answer::find($id);
        if($answer->user_id == Auth::user()->id) {
            $answer->answer = $request->input('answer');
            $answer->updated_at = Carbon::now();
            $answer->save();
            return redirect()->back()->with('success', 'Jawaban berhasil diubah');
        }
        return redirect()->back()->with('failed', 'Jawaban gagal diubah');
    }

    public function delete(Request $request, $id)
    {
        $answer = Answer::find($id);    
        if($answer->user_id == Auth::user()->id) {
            $answer->delete();
            return redirect()->back()->with('success', 'Jawaban berhasil dihapus');
        }
        return redirect()->back()->with('Jawaban gagal dihapus');
    }

    public function answers_from_self()
    {
        $answers = Answer::where('answers.user_id','=',Auth::user()->id)
                                ->orderBy('created_at','desc')
                                ->paginate(10);
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

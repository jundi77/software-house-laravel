<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Answer;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    //check apakah sudah login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->has('search')){
            // cek kalau mau mencari pertanyaan

        }else {
            // user mau menampilkan semua pertanyaan
        }
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        Answer::create([
            'answer' => $request->answer
        ]);
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
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
}

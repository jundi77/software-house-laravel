@extends('include.template')
@section('title', 'Mencari')
@section('content')
    <section class="question-section">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="question-wrapper">
                        <h2>Mencari Pertanyaan</h2>
                        {{-- form --}}
                        <form action="{{route('question.show_all')}}" method="get">
                            <input type="text" name="search" id="inpage-search" value="{{$request->search}}">
                            <button type="submit"></button>
                        </form>
                        <div class="question-list">
                            @forelse ($questions as $question)
                                <div class="question-summary">
                                    <div class="big-title">
                                        <h2>Q</h2>
                                    </div>
                                    <div class="question">
                                        <a href="{{route('question.show',['id'=> $question->id])}}" class="question-title">{{$question->title}}</a>
                                        <p class="question-time">ditanyakan {{$question->created_at->diffForHumans()}} oleh {{$question->user->username}}</p>
                                    </div>
                                </div>
                            @empty
                            <p>Tidak ditemukan</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                {{$questions->links()}}
            </div>
        </div>
    </section>
@endsection
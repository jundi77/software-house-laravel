@extends('include.template')
@section('title', 'Mencari "'.$request->search.'"')
@section('content')
    <section class="question-section">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="question-wrapper">
                        <h2>Mencari Pertanyaan</h2>
                        <form action="{{route('question.show_all')}}" method="get" id="search-navbar">
                            <div class="input-group" style="width: 50rem;">
                                <input class="form-control" type="text" name="search" id="search-navbar-input" placeholder="Cari pertanyaan..." value="{{$request->search}}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-dark" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>
                        <div class="question-list">
                            @forelse ($questions as $question)
                                <div class="question-summary">
                                    <div class="big-title">
                                        <h2>Q</h2>
                                    </div>
                                    <div class="question">
                                        <a href="{{route('question.show',['id'=> $question->id])}}" class="question-title">{{$question->title}}</a>
                                        <p class="question-time">
                                            ditanyakan {{$question->created_at->diffForHumans()}}@if($question->updated_at != $question->created_at)<br>
                                            diedit {{$question->updated_at->diffForHumans()}}<br>@endif
                                            oleh {{$question->user->username}}
                                        </p>
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
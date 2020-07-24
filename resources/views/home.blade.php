@extends('include.template')
@section('content')
<section class="question-section">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('home_q')}}">Pertanyaanmu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home_a')}}">Jawabanmu</a>
                    </li>
                  </ul>
            </div>
            <div class="row mt-3">
                <div class="top">
                    <h2>
                        Pertanyaan Darimu
                    </h2>
                </div>
                <button class="btn btn-second ml-auto">Buat Pertanyaan</button>
            </div>
            <div class="row">
                <div class="question-wrapper mt-5 pt-3  ">
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
                        @endforelse
                    </div>
                </div>
            </div>
            {{$questions->links()}}
        </div>
    </div>
</section>
@endsection

@extends('include.template')
@section('title', 'Home | Jawabanmu')
@section('content')
<section class="question-section">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home_q')}}">Pertanyaanmu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('home_a')}}">Jawabanmu</a>
                    </li>
                  </ul>
            </div>
            <div class="row mt-3">
                <div class="top">
                    <h2>
                        Jawaban Darimu
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="question-wrapper mt-5 pt-3  ">
                    <div class="question-list">
                        @forelse ($answers as $answer)
                            <div class="question-summary">
                                <div class="big-title" style="color: green;">
                                    <h2>A</h2>
                                </div>
                                <div class="question">
                                    <a href="{{route('question.show',['id'=> $answer->question_id])}}" class="question-title">{{$answer->answer}}</a>
                                    <p class="question-time">
                                        ditanyakan {{$answer->created_at->diffForHumans()}}@if($answer->updated_at != $answer->created_at)<br>
                                        diedit {{$answer->updated_at->diffForHumans()}}<br>@endif
                                        oleh {{$answer->user->username}}
                                    </p>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            {{$answers->links()}}
        </div>
    </div>
</section>
@endsection

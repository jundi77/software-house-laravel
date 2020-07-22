@extends('include.template')

@section('content')
    <section class="question-section">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="question-wrapper">
                        <div class="question-information">
                            <div class="question-header">
                                <h2>{{$question->title}}</h2>
                                <button class="btn btn-second">Jawab Pertanyaan</button>
                            </div>
                            <p style="font-size: 14px">Ditanyakan {{$question->created_at->diffForHumans()}}</p>
                            <a class="question-profile" href="">
                                <img src="{{asset('storage/'. $question->user->profile_picture_path)}}" width="40px" height="40px" alt="">
                                <p>{{$question->user->username}}</p>
                            </a>
                        </div>
                        <div class="question-description">
                            <div class="question-desc">
                                <p>{{$question->description}}</p>
                                <p><strong>{{$answers? $answers->count() : 0}} Jawaban</strong></p>
                            </div>
                            <div class="question-list">
                                @if ($answers)
                                    @foreach ($answers as $answer)
                                        <div class="question-summary">
                                            <div class="question">
                                                <p class="question-title">{{$answer->answer}}</p>
                                                <div class="answer-profile">
                                                    <p class="question-time">dijawab {{$answer->created_at->format('d M Y H:m')}}</p>
                                                    <a href="" class="question-profile">
                                                        <img src="{{asset('storage/'.$answer->user->profile_picture_path)}}" class="question-profile-image" width="30px" height="30px" alt="">
                                                        <p> {{$answer->user->username}}</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>Belum ada tanggapan</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if ($answers)
                    {{$answers->links()}}
                @endif
            </div>
        </div>
    </section>
@endsection
@extends('include.template')

@section('content')
    <section class="question-section">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="question-wrapper">
                        <h2>Pertanyaan Terbaru</h2>
                        <div class="question-list">
                            @foreach ($questions as $question)
                                <div class="question-summary">
                                    <div class="big-title">
                                        <h2>Q</h2>
                                    </div>
                                    <div class="question">
                                        <a href="" class="question-title">{{$question->title}}</a>
                                        <p class="question-time">ditanyakan {{$question->created_at->diffForHumans()}} oleh {{$question->user->username}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@extends('include.template')
@section('title', 'Pertanyaan Terbaru')
@section('content')
    <section class="question-section">
        @if (session('success'))
            <div class="row alert alert-warning alert-dismissible fade show mt-3" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('failed'))
            <div class="row alert alert-warning alert-dismissible fade show mt-3" role="alert">
                <strong>{{session('failed')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="question-wrapper">
                        <h2>Pertanyaan Terbaru</h2>
                        <div class="question-list">
                            @forelse ($questions as $question)
                                <div class="question-summary">
                                    <div class="big-title">
                                        <h2>Q</h2>
                                    </div>
                                    <div class="question">
                                        <a href="{{route('question.show',['id'=> $question->id])}}" class="question-title">{{$question->title}}</a>
                                        <p class="question-time">
                                            ditanyakan {{$question->created_at->diffForHumans()}}
                                            @if($question->updated_at != $question->created_at)<br>diedit {{$question->updated_at->diffForHumans()}}<br>@endif
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
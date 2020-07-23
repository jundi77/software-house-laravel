@extends('include.template')
@section('content')
<section class="question-section">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <h2>Pertanyaan Darimu</h2>
                <button class="btn btn-second ml-auto">Buat Pertanyaan</button>
                <div class="question-wrapper mt-5 pt-3">
                    <div class="question-list">
                        @forelse ($questions as $question)
                            <div class="question-summary">
                                <div class="big-title">
                                    <h2>Q</h2>
                                </div>
                                <div class="question">
                                    <a href="{{route('question.show',['id'=> $question->id])}}" class="question-title">{{$question->title}}</a>
                                    <p class="question-time">ditanyakan {{$question->created_at->diffForHumans()}}</p>
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

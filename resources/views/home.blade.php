@extends('include.template')
@section('title', 'Home | Pertanyaanmu')
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
                <div class="ml-auto">
                    <button class="btn btn-second create-question" data-toggle="collapse" data-target="div.create-question">Buat Pertanyaan</button>
                </div>
            </div>
            @if (session('success'))
                <div class="row alert alert-success alert-dismissible fade show mt-3" role="alert">
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
            <div class="row collapse create-question" style="margin-top: 2rem;">
                <form class="my-question p-3" action={{route('question.store')}} method="post" style="width:100%; border: 1px solid black;">
                    @csrf
                    <h3>Buat Pertanyaan</h3>
                    <div><label for="title">Judul Pertanyaan</label></div>
                    <div><input type="text" name="title" id="my-question-title" style="width: 100%" required></div>
                    <div><label for="description">Isi Pertanyaan</label></div>
                    <div><textarea name="description" id="my-question-description" rows="10" style="width: 100%" required></textarea></div>
                    <button class="btn btn-prim mt-3" type="submit">Submit</button>
                    <button class="btn btn-second create-question mt-3" data-toggle="collapse" data-target="div.create-question">Batalkan</button>
                </form>
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

@extends('include.template')

@section('content')
    <section class="question-section">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="question-wrapper">
                        <h2>Edit Pertanyaan</h2>
                            @forelse ($questions as $question)
                                        <form>
                                            {{ csrf_field() }}
                                            <div class="form-group" action="{{route('question.update',['id' => $question->id])}}" method="post">
                                                <label for="InputTitle">Title</label>
                                                <input type="text" name="Title" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="InputQuestion">Pertanyaan</label>
                                                <textarea class="form-control" type="text" name="Question" rows="5"></textarea>
                                            </div>
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                        </form>
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
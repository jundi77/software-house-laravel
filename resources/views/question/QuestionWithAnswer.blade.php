@extends('include.template')
@section('title','Jawaban untuk "'.$question->title.'"')

@section('token')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
    <section class="question-section">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="question-wrapper">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                        <div class="question-information">
                            <div class="question-header">
                                <a href="{{route('question.show', ['id' => $question->id])}}" style="color: black"><h2>{{$question->title}}</h2></a>
                                @if($question->user_id == Auth::user()->id)
                                <div>
                                    <button class="btn btn-prim show_button mr-3" data-toggle="collapse" data-target="form.my-question">Edit</a>
                                    <button class="btn btn-second delete-question" data-toggle="modal" data-target="#delete-question">Hapus</button>
                                </div>
                                @endif
                            </div>
                            <p style="font-size: 14px">Ditanyakan {{$question->created_at->diffForHumans()}}@if($question->updated_at != $question->created_at), diedit {{$question->updated_at->diffForHumans()}}@endif</p>
                            <div class="question-profile">
                                @if($question->user->profile_picture_path != 'NULL')
                                <img src="{{asset('storage/'. $question->user->profile_picture_path)}}" width="40px" height="40px" alt="">
                                @else 
                                <img src="{{URL::to('img/default-user-icon.jpg')}}" width="40px" height="40px" alt="">
                                @endif
                                <p>{{$question->user->username}}</p>
                            </div>
                        </div>
                        <div class="question-description">
                            <div class="question-desc">
                                <p><?php echo nl2br(htmlspecialchars($question->description))?></p>
                                <!-- edit form  -->
                                
                                <div class="modal fade" id="delete-question" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><strong>Perhatian</strong></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <strong>Apakah yakin menghapus pertanyaan ini?</strong>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('question.delete',['id'=> $question->id])}}" method="post">
                                                    @csrf
                                                    {!! method_field('delete') !!}
                                                    <button type="button" class="btn btn-second" data-dismiss="modal">Tidak</button>
                                                    <button type="submit" class="btn btn-prim">Yakin</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{route('question.update',['id' => $question->id])}}" method="post"class="my-question form-group mt-3 collapse" style="border-bottom: 1px solid grey;border-top: 1px solid grey;">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <h3 class="mt-3">Edit Pertanyaan</h3>
                                    <hr>
                                    <div><label for="title">Judul Pertanyaan</label></div>
                                    <div><input type="text" name="title" id="my-question-title" value="{{$question->title}}" style="width: 100%" required autofocus></div>
                                    <div><label for="description">Isi Pertanyaan</label></div>
                                    <div><textarea name="description" id="my-question-description" rows="10" style="width: 100%" required>{{$question->description}}</textarea></div>
                                    <button class="btn btn-prim mt-3" type="submit">Submit</button>
                                    <a href="#" class="btn btn-second mt-3" data-toggle="collapse" data-target="form.my-question">Batalkan</a>
                                </form>
                        <!-- end edit form -->
                                <p><strong>{{$answers? $answers->count() : 0}} Jawaban</strong></p>
                            </div>
                            <div class="question-list">
                                @if ($answers)
                                    @foreach ($answers as $answer)
                                        <div class="question-summary">
                                            <div class="question">
                                                <p class="question-title"><?php echo nl2br(htmlspecialchars($answer->answer))?></p>
                                                <div class="answer">
                                                    @if ($answer->user_id == Auth::user()->id)
                                                        <div class="answer-link"style="float: left">
                                                            <a class="btn btn-prim edit-answer" href="{{route('answer.update',['id' => $answer->id])}}">Edit</a>
                                                            <button class="btn btn-second delete-answer" data-toggle="modal" data-target="#exampleModal">Hapus</button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel"><strong>Perhatian</strong></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <strong>Apakah yakin menghapus jawaban ini?</strong>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <form action="{{route('answer.delete',['id'=> $answer->id])}}" method="post">
                                                                                @csrf
                                                                                {!! method_field('delete') !!}
                                                                                <button type="button" class="btn btn-second" data-dismiss="modal">Tidak</button>
                                                                                <button type="submit" class="btn btn-prim">Yakin</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <p class="question-time">dijawab {{$answer->created_at->format('d M Y H:m')}}@if($answer->updated_at != $answer->created_at)<br>diedit {{$answer->updated_at->format('d M Y H:m')}}@endif</p>
                                                        <a href="" class="question-profile">
                                                            <img src="{{asset('storage/'.$answer->user->profile_picture_path)}}" class="question-profile-image" width="30px" height="30px" alt="">
                                                            <p> {{$answer->user->username}}</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>Belum ada tanggapan</p>
                                @endif
                            </div>
                            @if ($answers)
                                {{$answers->links()}}
                            @endif
                            <form class="my-answer form-group" action={{route('answer.store')}} method="POST">
                                @csrf
                                <h3>Jawaban Anda</h3>
                                <textarea name="answer" id="answer" cols="30" rows="10" required></textarea>
                                <input type="hidden" name="question_id" value="{{$question->id}}">
                                <button class="btn btn-prim" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </section>
    <script>
        const metaName = (() => {
            const metasName = document.getElementsByTagName('meta')
            for (const meta of metasName) {
                if(meta.getAttribute('name') === 'csrf-token'){
                    return meta.getAttribute('content');
                }
            }
            return '';
        })();
        console.log(metaName)

        document.addEventListener('click', (e) =>{
            if (hasClass(e.target,'batal-edit')) {
                e.preventDefault();
                buttonBatal = e.target;
                formEdit = buttonBatal.parentElement;
                formEditAction = formEdit.getAttribute('action');
                parentForm = formEdit.parentElement;
                parentForm.removeChild(formEdit);
                answerLinkGroup = parentForm.querySelector('.answer-link');
                editButton = `<a class="btn btn-prim edit-answer" href="${formEditAction}">Edit</a>`;
                editTag = document.createElement('a');
                editTag.setAttribute('class','btn btn-prim edit-answer');
                editTag.setAttribute('href', formEditAction);
                editTag.innerHTML = 'Edit';
                answerLinkGroup.prepend(editTag)
            }
            if (hasClass(e.target,'edit-answer')) {
                e.preventDefault();
                edit = e.target;
                let answerContainer =  edit.parentElement.parentElement;
                answerContainer.querySelector('.answer-link').removeChild(edit)
                const answerTitle = answerContainer.previousElementSibling.innerHTML;
                const formUpdate = `
                    <form action="${e.srcElement.getAttribute('href')}" method="POST" class="form-group my-answer edit-form">
                        {!! method_field('put') !!}
                        <input type="hidden" name="_token" value="${metaName}">
                        <textarea name="answer" cols="30" rows="10" required>${answerTitle}</textarea>
                        <button class="btn btn-prim">Edit Jawaban</button>
                        <button class="btn btn-second batal-edit">Batalkan Pengeditan</button>
                    </form>
                `;
                answerContainer.innerHTML += formUpdate;
            }
        },false);

        function hasClass(elem, className) {
            return elem.className.split(' ').indexOf(className) > -1;
        }
    </script>

@endsection
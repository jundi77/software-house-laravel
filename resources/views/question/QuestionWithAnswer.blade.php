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
                        <div class="question-information">
                            <div class="question-header">
                                <h2>{{$question->title}}</h2>
                                <button class="btn btn-second">Jawab Pertanyaan</button>
                            </div>
                            <p style="font-size: 14px">Ditanyakan {{$question->created_at->diffForHumans()}}@if($question->updated_at != $question->created_at), diedit {{$question->updated_at->diffForHumans()}}@endif</p>
                            <a class="question-profile" href="">
                                <img src="{{asset('storage/'. $question->user->profile_picture_path)}}" width="40px" height="40px" alt="">
                                <p>{{$question->user->username}}</p>
                            </a>
                        </div>
                        <!-- edit form  -->
                        <div class="question-description">
                                <form class="my-question form-group" >
                                <h3>Edit Deskripsi</h3>
                                <textarea cols="50" rows="20" name="text" id="question_id" class="form-control" style="resize:vertical;display:none">{{$question->description}}</textarea>
                                <input type="hidden" name="question">
                                <div class="question-link"style="float: right">
                                    <button class="btn btn-prim show_button">Edit</a>
                                    <button class="btn btn-second delete-question" data-toggle="modal2" data-target="#exampleModal2">Hapus</button>
                                </div> 
                                <script>$(".show_button").click(function(){$("#question_id").show()})</script>
                            </form>
                        <!-- end edit form -->
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
@extends('include.template')
@section('title', 'Selamat Datang!')
@section('content')
<section class="welcome-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="caption text-center">
                    <h2 class="welcome-text text-white">Komunitas Terbuka TanyaAja</h2>
                    <p class="small-welcome-text">Kami menghubungkan tiap orang yang memiliki rasa penasaran yang tinggi dengan beribu jawaban yang tidak masuk akal</p>
                    <a href="{{route('register')}}" class="btn btn-second">Gabung Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
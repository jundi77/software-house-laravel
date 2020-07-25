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
                    @auth
                        <a href="{{route('question.show_all')}}" class="btn btn-second">Lihat Pertanyaan</a>
                    @endauth
                    @guest
                        <a href="{{route('register')}}" class="btn btn-second">Gabung Sekarang</a>
                    @endguest
                </div>
            </div>            
        </div>
    </div>
</section>
<section class="feature-section">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="feature-wrapper">
                    <div class="feature-text">
                        <div class="big-text-feature">
                            <h3>Satu Untuk Semua, Semua Untuk Satu</h3>
                        </div>
                        <div class="small-text-feature">
                            <p>TanyaAja merupakan komunitas terbuka untuk orang-orang yang kebingungan atau kehilangan arah.
                                Anda tak perlu takut untuk menjawab atau bertanya disini, karena kami memberikan perlindungan
                                100% terhadap Anda. Bebaskan diri anda pada komunitas ini
                            </p>
                        </div>
                    </div>
                    <div class="feature-card-wrapper">
                        <div class="feature-card">
                            <i class="fa fa-comment-o fa-5x fa-question-circle"></i>
                            <h4>Berdiskusi Sepuasnya</h4>
                        </div>
                        <div class="feature-card">
                            <i class="fa fa-5x fa-question-circle-o"></i>
                            <h4>Bertanya Sepuasnya</h4>
                        </div>
                        <div class="feature-card">
                            <i class="fa fa-5x fa-hand-paper-o"></i>
                            <h4>Menjawab Sepuasnya</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
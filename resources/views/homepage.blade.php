@extends('include.template')
@section('content')
<section class="welcome-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="caption text-center">
                    <h2 class="welcome-text text-white">Komunitas Terbuka TanyaAja</h2>
                    <p class="small-welcome-text">Kami menghubungkan tiap orang yang memiliki rasa penasaran yang tinggi dengan beribu jawaban yang tidak masuk akal</p>
                    <button class="btn btn-second">Gabung Sekarang</button>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="feature">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h3 class="text-judul text-white">
                        <span>
                        Feature
                        </span>
                    </h3>
                </div>
                <div class="feature-wrapper">
                    <div class="feature-items">
                        <div class="feature-icon">
                            <i class="fa fa fa-search"></i>
                        </div>
                        <h4 class="feature-caption text-white">Pencarian Mahasiswa</h4>
                        <p class="text-center text-white">Edustage dapat mencari data berbagai mahasiswa yang ada</p>
                    </div>
                    <div class="feature-items">
                        <div class="feature-icon">
                            <i class="fa fa fa-phone"></i>
                        </div>
                        <h4 class="feature-caption text-white">Website Responsive</h4>
                        <p class="text-center text-white">Tampilan Edustage dapat dibuka di segala jenis perangkat</p>
                    </div>
                    <div class="feature-items">
                        <div class="feature-icon">
                            <i class="fa fa fa-book"></i>
                        </div>
                        <h4 class="feature-caption text-white">Informasi Mahasiswa</h4>
                        <p class="text-center text-white">Edustage dapat menyediakan informasi pribadi mahasiswa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@extends('layout.main')

@section('container')
    <!-- Session Alert Logout -->
    @if ($msgLogout = Session::get('LogoutNotif'))
        <div class="alert alert-info alert-dismissible fade show mt-4" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgLogout }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif    
    <!-- Akhir Session Alert Logout -->
    <!-- Session Alert Success Reset Password -->
    @if ($msgReset = Session::get('ResetPassNotif'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgReset }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif    
    <!-- Akhir Session Alert Success Reset Password -->
    <br>


    <!-- Jumbotron -->
    <div class="jumbotron text-center">
        <h1 class="card-title">STCAMP404 (Sekolah Tinggi CAMP404)</h5>
        <p class="card-text p-3">Lembaga Pendidikan ini memberikan pelatihan gratis pada bidang teknologi. 
            Siswa yang telah bergabung lebih dari 1000 orang yang tersebar di seluruh Indonesia.
            Pembelajaran akan slalu kami update menyesuaikan kebutuhan industri saat ini.
            Jadi tunggu apa lagi ??
        </p>
        @if(!Session()->has('LogSession'))
            <a href="{{ url('/dashboard') }}" class="btn btn-md btn-outline-success btn-ik col-md-2"><i class="bi bi-person-rolodex me-1"></i> Dashboard</a>
        @endif
        @if(Session()->has('LogSession'))
            @if($LogUser->role == 'admin')
                <a href="{{ url('/data-pelatihan') }}" class="btn btn-md btn-outline-success btn-ik col-md-3"><i class="bi bi-clipboard-data-fill me-1"></i> Manajemen Data Pelatihan</a>
                <a href="{{ url('/info-kegiatan') }}" class="btn btn-md btn-outline-success btn-ik col-md-2"><i class="bi bi-megaphone-fill me-1"></i> Info Kegiatan</a>
            @endif
        @endif
        @if(Session()->has('LogSession'))
            @if($LogUser->role == 'siswa')
                <a href="{{ url('/data-siswa') }}" class="btn btn-md btn-outline-success btn-ik col-md-2"><i class="bi bi-bar-chart-steps me-1"></i> Data Siswa</a>
                <a href="{{ url('/info-kegiatan') }}" class="btn btn-md btn-outline-success btn-ik col-md-2"><i class="bi bi-megaphone-fill me-1"></i> Info Kegiatan</a>
            @endif
        @endif
        @if(!Session()->has('LogSession'))
            <a href="{{ url('/info-kegiatan') }}" class="btn btn-md btn-outline-success btn-ik col-md-2"><i class="bi bi-megaphone-fill me-1"></i> Info Kegiatan</a>
        @endif
    </div>
    <!-- Jumbotron Akhir -->

    <!-- Card -->
    <div class="row row-cols-1 row-cols-md-2 g-4 mt-5">
        <div class="col">
            <div class="card">
            <img src="{{ url('asset/img/content/pic1.jpg') }}" class="card-img-top" alt="codeigniter4">
            <div class="card-body">
                <h5 class="card-title">Pelatihan Codeigniter 4</h5><hr>
                <p class="card-text">Codeigniter merupakan salah satu framework PHP terpopuler untuk membangun website. Framework ini berfokus 
                    pada pengolahan backend website. Codeigniter terus melakukan pengembangan hingga saat ini telah muncul versi Codeigniter 4. 
                    Dengan menggunakan fitur dalam Codeigniter, pengembangan website akan jauh lebih mudah.</p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <img src="{{ url('asset/img/content/pic2.jpg') }}" class="card-img-top" alt="laravel8">
            <div class="card-body">
                <h5 class="card-title">Pelatihan Laravel 8</h5><hr>
                <p class="card-text">Laravel merupakan salah satu framework PHP terpopuler untuk membangun website. Framework ini berfokus 
                    pada pengolahan backend website. Laravel terus melakukan pengembangan hingga saat ini telah muncul versi Laravel 8. 
                    Dengan menggunakan fitur dalam Laravel, pengembangan website akan jauh lebih mudah.</p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <img src="{{ url('asset/img/content/pic3.jpg') }}" class="card-img-top" alt="bootstrap5">
            <div class="card-body">
                <h5 class="card-title">Pelatihan Bootstrap 5</h5><hr>
                <p class="card-text">Bootstrap adalah salah satu framework front-end website terbaik yang cepat dan ringan.
                    Dengan Bootstrap ini, programmer tidak perlu menulis kode CSS yang panjang, karena bisa langsung menggunakan semua elemen yang telah disediakan.
                    Bootstrap terus melakukan pengembangan hingga saat ini telah muncul versi Bootstrap 5. </p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <img src="{{ url('asset/img/content/pic4.jpg') }}" class="card-img-top" alt="git">
            <div class="card-body">
                <h5 class="card-title">Pelatihan Git</h5><hr>
                <p class="card-text">GIT (Group Inclusive Tour) adalah sebuah tools penting bagi para programmer dan developer yang berfungsi sebagai control system untuk 
                    menjalankan proyek pengembangan software. Git diciptakan oleh Linus Torvalds, sedangkan desain Git terinspirasi dari tools yang bernama BitKeeper dan Monotone.</p>
            </div>
            </div>
        </div>
    </div>
    <!-- Card Akhir -->
@endsection
@extends('layout.main')

@section('container')
    <!-- Session Alert: Success Logout -->
    @if ($msgSuccessLogout = Session::get('LogoutNotif'))
        <div class="alert alert-info alert-dismissible fade show mt-4 user-select-none" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgSuccessLogout }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif    
    <!-- Akhir Session Alert: Success Logout -->

    <!-- Session Alert: Success Reset Password -->
    @if ($msgSuccessReset = Session::get('ResetPassNotif'))
        <div class="alert alert-success alert-dismissible fade show mt-4 user-select-none" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgSuccessReset }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif    
    <!-- Akhir Session Alert: Success Reset Password -->
    <br class="user-select-none">


    <!-- Jumbotron -->
    <div class="text-center user-select-none">
        <h1 class="title-web">STCAMP404 (Sekolah Tinggi CAMP404)</h5>
        <p class="descriptions pt-4 pb-3">Lembaga Pendidikan ini memberikan pelatihan gratis pada bidang teknologi. 
            Siswa yang telah bergabung lebih dari 1000 orang yang tersebar di seluruh Indonesia.
            Pembelajaran akan slalu kami update menyesuaikan kebutuhan industri saat ini.
            Jadi tunggu apa lagi ??
        </p>
        <div class="special-section d-flex flex-wrap gap-4 justify-content-center">
            @if(Session()->has('LogSession'))
                @if($LogUser->role == 'admin' || $LogUser->role == 'siswa')
                    <a href="{{ url('/dashboard') }}" class="btn btn-md btn-outline-primary btn-ik p-2 flex-fill flex-md-grow-0"><i class="bi bi-person-rolodex me-1"></i> Dashboard</a>
                @endif
            @endif
            @if(Session()->has('LogSession'))
                @if($LogUser->role == 'admin')
                    <a href="{{ url('/data-pelatihan') }}" class="btn btn-md btn-outline-primary btn-ik p-2 flex-fill flex-md-grow-0"><i class="bi bi-clipboard-data-fill me-1"></i> Manajemen Data Pelatihan</a>
                    <a href="{{ url('/info-kegiatan') }}" class="btn btn-md btn-outline-primary btn-ik p-2 flex-fill flex-md-grow-0"><i class="bi bi-megaphone-fill me-1"></i> Info Kegiatan</a>
                @endif
            @endif
            @if(Session()->has('LogSession'))
                @if($LogUser->role == 'siswa')
                    <a href="{{ url('/data-siswa') }}" class="btn btn-md btn-outline-primary btn-ik p-2 flex-fill flex-md-grow-0"><i class="bi bi-bar-chart-steps me-1"></i> Data Siswa</a>
                    <a href="{{ url('/info-kegiatan') }}" class="btn btn-md btn-outline-primary btn-ik p-2 flex-fill flex-md-grow-0"><i class="bi bi-megaphone-fill me-1"></i> Info Kegiatan</a>
                @endif
            @endif
            @if(!Session()->has('LogSession'))
                <a href="{{ url('/info-kegiatan') }}" class="btn btn-md btn-outline-primary btn-ik p-2 flex-fill flex-md-grow-0"><i class="bi bi-megaphone-fill me-1"></i> Info Kegiatan</a>
            @endif
        </div>
    </div>
    <!-- Jumbotron Akhir -->

    <!-- Card -->
    <div class="row g-3 g-md-4 mt-5 d-flex align-items-stretch">
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 d-flex py-2">
            <div class="card border bg-transparent shadow-sm hover-shadow w-100 h-100 d-flex flex-column">
                <img src="{{ url('asset/img/content/pic1.jpg') }}" class="card-img-top user-select-none" alt="codeigniter4">
                <div class="card-header text-dark d-flex align-items-center justify-content-center user-select-none">
                    <strong class="text-center flex-grow-1">PELATIHAN CODEIGNITER 4</strong>
                </div>
                <div class="card-body flex-grow-1">
                    <p class="card-text user-select-none">Codeigniter merupakan salah satu framework PHP terpopuler untuk membangun website. Framework ini berfokus 
                        pada pengolahan backend website. Codeigniter terus melakukan pengembangan hingga saat ini telah muncul versi Codeigniter 4. 
                        Dengan menggunakan fitur dalam Codeigniter, pengembangan website akan jauh lebih mudah.</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 d-flex py-2">
            <div class="card border bg-transparent shadow-sm hover-shadow w-100 h-100 d-flex flex-column">
                <img src="{{ url('asset/img/content/pic2.jpg') }}" class="card-img-top user-select-none" alt="laravel8">
                <div class="card-header text-dark d-flex align-items-center justify-content-center user-select-none">
                    <strong class="text-center flex-grow-1">PELATIHAN LARAVEL 8</strong>
                </div>
                <div class="card-body flex-grow-1">
                    <p class="card-text user-select-none">Laravel merupakan salah satu framework PHP terpopuler untuk membangun website. Framework ini berfokus 
                        pada pengolahan backend website. Laravel terus melakukan pengembangan hingga saat ini telah muncul versi Laravel 8. 
                        Dengan menggunakan fitur dalam Laravel, pengembangan website akan jauh lebih mudah.</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 d-flex py-2">
            <div class="card border bg-transparent shadow-sm hover-shadow w-100 h-100 d-flex flex-column">
                <img src="{{ url('asset/img/content/pic3.jpg') }}" class="card-img-top user-select-none" alt="bootstrap5">
                <div class="card-header text-dark d-flex align-items-center justify-content-center user-select-none">
                    <strong class="text-center flex-grow-1">PELATIHAN BOOTSTRAP 5</strong>
                </div>
                <div class="card-body flex-grow-1">
                    <p class="card-text user-select-none">Bootstrap adalah salah satu framework front-end website terbaik yang cepat dan ringan.
                        Dengan Bootstrap ini, programmer tidak perlu menulis kode CSS yang panjang, karena bisa langsung menggunakan semua elemen yang telah disediakan.
                        Bootstrap terus melakukan pengembangan hingga saat ini telah muncul versi Bootstrap 5. </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 d-flex py-2">
            <div class="card border bg-transparent shadow-sm hover-shadow w-100 h-100 d-flex flex-column">
                <img src="{{ url('asset/img/content/pic4.jpg') }}" class="card-img-top user-select-none" alt="git">
                <div class="card-header text-dark d-flex align-items-center justify-content-center user-select-none">
                    <strong class="text-center flex-grow-1">PELATIHAN GIT</strong>
                </div>
                <div class="card-body flex-grow-1">
                    <p class="card-text user-select-none">GIT (Group Inclusive Tour) adalah sebuah tools penting bagi para programmer dan developer yang berfungsi sebagai control system untuk 
                        menjalankan proyek pengembangan software. Git diciptakan oleh Linus Torvalds, sedangkan desain Git terinspirasi dari tools yang bernama BitKeeper dan Monotone.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Akhir -->
@endsection
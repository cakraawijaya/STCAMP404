@extends('layout.main')

@section('container')
    <h2 class="mt-4 mt-md-5 mt-lg-4 pt-md-2 user-select-none">
        <i class="bi bi-person-rolodex me-1"></i> Dashboard
    </h2><hr>

    <!-- Alert Login -->
    @if ($msgLogin = Session::get('LoginNotif'))
    <div class="alert alert-info alert-dismissible fade show mt-4 user-select-none">
        <small class="text-muted">
            <i class="bi bi-info-square-fill me-1"></i> {{ $msgLogin }}
        </small>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Alert Update -->
    @if ($msgUpdProf = Session::get('updateProfileNotif'))
    <div class="alert alert-success alert-dismissible fade show mt-4 user-select-none">
        <small class="text-muted">
            <i class="bi bi-info-square-fill me-1"></i> {{ $msgUpdProf }}
        </small>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="row g-4">
        <div class="col-12 col-md-7 my-md-5 mt-5 order-1">
            <div class="card h-100">
                <div class="row g-0 h-100 user-select-none">

                    <div class="col-12 col-md-7 order-1">
                        <img src="{{ $LogUser->image }}"
                            class="img-fluid w-100 h-100 object-fit-cover rounded-start"
                            alt="gambarpengguna">
                    </div>

                    <div class="col-12 col-md-5 order-2">
                        <div class="card-body">
                            <h5 class="text-dark user-select-none">
                                <strong>Profil Pengguna</strong>
                            </h5><hr>

                            @if($LogUser->role == 'admin')
                            <small class="mt-2 mt-md-4 d-block">
                                <strong>Status :</strong><br>
                                {{ strtoupper($LogUser->role) }}
                            </small>
                            <small class="mt-2 mt-md-4 d-block">
                                <strong>Nama Admin :</strong><br>
                                {{ ucfirst($LogUser->name) }}
                            </small>
                            <small class="mt-2 mt-md-4 d-block">
                                <strong>Email :</strong><br>
                                {{ strtolower($LogUser->email) }}
                            </small>
                            @endif

                            @if($LogUser->role == 'siswa')
                            <small class="mt-2 mt-md-4 d-block">
                                <strong>NIS :</strong><br>
                                {{ $LogUser->siswa_id }}
                            </small>
                            <small class="mt-2 mt-md-4 d-block">
                                <strong>Nama :</strong><br>
                                {{ ucfirst($LogUser->name) }}
                            </small>
                            <small class="mt-2 mt-md-4 d-block">
                                <strong>Email :</strong><br>
                                {{ strtolower($LogUser->email) }}
                            </small>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-5 my-md-5 mt-5 order-2">
            <h5 class="mb-4 user-select-none">
                <i class="bi bi-bar-chart-line-fill me-1"></i> Grafik Peminatan
            </h5>
            <script src="{{ url('highcharts/highcharts.js') }}"></script>
            <script src="{{ url('highcharts/exporting.js') }}"></script>
            <script src="{{ url('highcharts/export-data.js') }}"></script>
            <script src="{{ url('highcharts/accessibility.js') }}"></script>

            <div id="container"></div>

            <script>
                Highcharts.chart('container', {
                    chart: { type: 'column' },
                    title: { text: '' },

                    exporting: {
                        tableCaption: ''
                    },

                    xAxis: {
                        type: 'category',
                        labels: { rotation: -45 }
                    },

                    yAxis: {
                        min: 0,
                        title: { text: 'PELATIHAN STCAMP404' }
                    },

                    legend: { enabled: false },

                    tooltip: {
                        pointFormat: 'Jumlah: <b>{point.y} orang</b>'
                    },

                    series: [{
                        name: 'Pelatihan',
                        data: [
                            ['Bootstrap 5', {{ $Cbt }}],
                            ['Git', {{ $Cgt }}],
                            ['Laravel 8', {{ $Clr }}],
                            ['Codeigniter 4', {{ $Cci }}]
                        ],
                        dataLabels: {
                            enabled: true,
                            rotation: -90,
                            align: 'right'
                        }
                    }]
                });
            </script>
        </div>
    </div>
    <div class="row order-3">
        <div class="col-md-12 mt-5">
            <h5 class="user-select-none"><i class="bi bi-grid-1x2-fill me-1"></i> Menu Utama</h5><hr>
            <div class="accordion mt-4 pt-1" id="accordionExample">
                <div class="accordion-item">
                    <h3 class="accordion-header" id="headingOne">
                    <button class="accordion-button user-select-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="bi bi-caret-right-fill me-1"></i> Akses Cepat
                    </button>
                    </h3>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body mt-1">
                            <div class="row text-left">
                                <div class="col-12 col-md-6 col-lg-4 mb-3">
                                    <p class="user-select-none">
                                        <small class="text-muted">
                                            <i class="bi bi-dot me-1"></i> Ubah Profil 
                                            <a class="btn btn-sm btn-outline-primary ms-2" data-bs-toggle="modal" data-bs-target="#Modal2">
                                                <i class="bi bi-person-bounding-box"></i>
                                            </a>
                                        </small>
                                    </p>
                                </div>
                                @if($LogUser->role == 'admin')
                                <div class="col-12 col-md-6 col-lg-4 mb-3">
                                    <p class="user-select-none">
                                        <small class="text-muted">
                                            <i class="bi bi-dot me-1"></i> Manajemen Data Pelatihan
                                            <a class="btn btn-sm btn-outline-primary ms-2" href="{{ url('/data-pelatihan') }}">
                                                <i class="bi bi-clipboard-data-fill"></i>
                                            </a>
                                        </small>
                                    </p>
                                </div>
                                @endif
                                @if($LogUser->role == 'siswa')
                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                        <p class="user-select-none">
                                            <small class="text-muted">
                                                <i class="bi bi-dot me-1"></i> Data Siswa 
                                                <a class="btn btn-sm btn-outline-primary ms-2" href="{{ url('/data-siswa') }}">
                                                    <i class="bi bi-bar-chart-steps"></i>
                                                </a>
                                            </small>
                                        </p>
                                    </div>
                                @endif
                                <div class="col-12 col-md-12 col-lg-4 mb-3">
                                    <p class="user-select-none">
                                        <small class="text-muted">
                                            <i class="bi bi-dot me-1"></i> Info Pelatihan 
                                            <a class="btn btn-sm btn-outline-primary ms-2" href="{{ url('/info-kegiatan') }}">
                                                <i class="bi bi-megaphone-fill"></i>
                                            </a>
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($LogUser->role == 'siswa')
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="headingTwo">
                        <button class="accordion-button user-select-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="bi bi-caret-right-fill me-1"></i> Pelatihan yang diikuti
                        </button>
                        </h3>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body user-select-none mt-2">
                                @foreach($PelUser as $UP)
                                    <p><small class="text-muted"><i class="bi bi-dot me-1"></i> 
                                        {{ $UP->pelatihan }}
                                    </small></p>
                                @endforeach
                                @if($PelUser == $PelUser_NULL)
                                    <p><small class="text-muted"><i class="bi bi-dot me-1"></i> 
                                        Belum ada pelatihan
                                    </small></p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Pop Up Modal 2-->
    <div class="modal fade modalmenu" id="Modal2" tabindex="-1" aria-labelledby="Modal2Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h5 class="modal-title user-select-none"><i class="bi bi-person-bounding-box me-1"></i> Ubah Profil</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="{{ url('/updateprofile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="siswa_id" id="prfsiswaID" value="{{ $LogUser->siswa_id }}">
                        <div class="row">
                            <div class="col-md-12 mt-2 user-select-none">
                                <label for="prfname"><i class="bi bi-person me-1"></i> Ubah Nama Pengguna</label>
                                <input type="text" class="form-control mt-2" name="name" id="prfname" value="{{ $LogUser->name }}" placeholder="Ubah nama anda..." required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-4 user-select-none">
                                <label for="prfemail"><i class="bi bi-envelope me-1"></i> Ubah Email Pengguna</label>
                                <input type="email" class="form-control mt-2" name="email" id="prfemail" 
                                pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$" oninput="this.value = this.value.toLowerCase()"
                                value="{{ $LogUser->email }}" placeholder="Ubah email anda..." required>
                            </div>
                            <div class="col-md-6 mt-4 user-select-none">
                                <label for="prfpassword"><i class="bi bi-key me-1"></i> Ubah Kata Sandi</label>
                                <div class="input-group mb-3">
                                    <button onclick="ShowPassProfile()" class="btn btn-outline-secondary mt-2" type="button">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                    <input type="password" class="form-control mt-2" name="password" id="prfpassword" placeholder="Ubah kata sandi anda...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-2 user-select-none">
                                <label for="prfimg"><i class="bi bi-card-image me-1"></i> Ubah Foto Pengguna</label>
                                <div class="input-group mb-3 mt-2">
                                    <input type="file" class="form-control" name="image" id="prfimg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-primary text-white gap-3 mt-2">
                        <a type="button" class="btn btn-light btn-sm btncancel" data-bs-dismiss="modal">
                        <i class="bi bi-person-x me-1"></i> Batal</a>
                        <button type="submit" class="btn btn-light btn-sm btnacc">
                        <i class="bi bi-person-check me-1"></i> Setuju</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Pop Up Modal 2-->

    <!-- Show Password-->
    <script>
        function ShowPassProfile() {
            var x = document.getElementById("prfpassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <!-- Akhir Show Password-->
@endsection
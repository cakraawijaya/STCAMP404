@extends('layout.main')

@section('container')
    <h1><i class="bi bi-person-rolodex me-1"></i> Dashboard</h1><hr>
    <!-- Session Alert Login -->
    @if ($msgLogin = Session::get('LoginNotif'))
        <div class="alert alert-info alert-dismissible fade show mt-4" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgLogin }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Akhir Session Alert Login -->
    <!-- Session Alert Update Profile -->
    @if ($msgUpdProf = Session::get('updateProfileNotif'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgUpdProf }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Akhir Session Alert Update Profile -->
    <br>    
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col">
                        <img src="{{ $LogUser->image }}" class="img-fluid rounded-start img-profile" alt="gambarpengguna">
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <h5 class="card-title">Profil Pengguna</h5><hr>
                            @if($LogUser->role == 'admin')
                                <p class="card-text mt-2">
                                    <strong><i class="bi bi-building me-1"></i> Status :</strong><br>
                                    <span class="text-uppercase">{{ $LogUser->role }}</span>
                                </p>
                                <p class="card-text mt-2">
                                    <strong><i class="bi bi-person me-1"></i> Nama Admin :</strong><br>
                                    <span class="text-capitalize">{{ $LogUser->name }}</span>
                                </p>
                                <p class="card-text mt-2">
                                    <strong><i class="bi bi-envelope me-1"></i> Email :</strong><br>
                                    <span class="text-lowercase">{{ $LogUser->email }}</span>
                                </p>
                            @endif
                            @if($LogUser->role == 'siswa')
                                <p class="card-text mt-2">
                                    <strong><i class="bi bi-building me-1"></i> Nomor Induk Siswa :</strong><br>
                                    <span class="text-lowercase">{{ $LogUser->siswa_id }}</span>
                                </p>
                                <p class="card-text mt-2">
                                    <strong><i class="bi bi-person me-1"></i> Nama Siswa :</strong><br>
                                    <span class="text-capitalize">{{ $LogUser->name }}</span>
                                </p>
                                <p class="card-text mt-2">
                                    <strong><i class="bi bi-envelope me-1"></i> Email :</strong><br>
                                    <span class="text-lowercase">{{ $LogUser->email }}</span>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <h5><i class="bi bi-bar-chart-line-fill me-1"></i> Grafik Peminatan</h5><hr>
            <script src="{{ url('highcharts/highcharts.js') }}"></script>
            <script src="{{ url('highcharts/exporting.js') }}"></script>
            <script src="{{ url('highcharts/export-data.js') }}"></script>
            <script src="{{ url('highcharts/accessibility.js') }}"></script>

            <figure class="highcharts-figure">
                <div id="container"></div>
                <script>
                    Highcharts.chart('container', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: ''
                        },
                        subtitle: {
                            text: ''
                        },
                        xAxis: {
                            type: 'category',
                            labels: {
                            rotation: -45,
                                style: {
                                    fontSize: '13px',
                                    fontFamily: 'Verdana, sans-serif'
                                }
                            }
                        },
                        yAxis: {
                            min: 0,
                            title: {
                            text: '<b>PELATIHAN STCAMP404</b>'
                            }
                        },
                        legend: {
                            enabled: false
                        },
                        tooltip: {
                            pointFormat: 'Jumlah Peminat: <b>{point.y:%1f} orang</b>'
                        },
                        series: [{
                            name: 'Pelatihan',
                            data: [
                                ['<b>Bootstrap 5</b>', {{ $Cbt }}],
                                ['<b>Git</b>', {{ $Cgt }}],
                                ['<b>Laravel 8</b>', {{ $Clr }}],
                                ['<b>Codeigniter 4</b>', {{ $Cci }}]
                            ],
                            dataLabels: {
                                enabled: true,
                                rotation: -90,
                                color: '#FFFFFF',
                                align: 'right',
                                format: '{point.y:%1f}', // one decimal
                                y: 10, // 10 pixels down from the top
                                style: {
                                    fontSize: '13px',
                                    fontFamily: 'Verdana, sans-serif'
                                }
                            }
                        }]
                    });
                </script>
            </figure>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-5">
            <h5><i class="bi bi-grid-1x2-fill me-1"></i> Menu Utama</h5><hr><br>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h3 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="bi bi-caret-right-fill me-1"></i> Akses Cepat
                    </button>
                    </h3>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body mt-1">
                            <div class="row">
                                <div class="col">
                                    <p><small class="text-muted"><i class="bi bi-dot me-1"></i> Ubah Profil 
                                        <a class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#Modal2">
                                    <i class="bi bi-person-bounding-box"></i></a></small></p>
                                </div>
                                @if($LogUser->role == 'admin')
                                    <div class="col">
                                        <p><small class="text-muted"><i class="bi bi-dot me-1"></i> Manajemen Data Pelatihan 
                                            <a class="btn btn-sm btn-outline-success" href="{{ url('/data-pelatihan') }}">
                                        <i class="bi bi-clipboard-data-fill"></i></a></small></p>
                                    </div>
                                @endif
                                @if($LogUser->role == 'siswa')
                                    <div class="col">
                                        <p><small class="text-muted"><i class="bi bi-dot me-1"></i> Data Siswa 
                                            <a class="btn btn-sm btn-outline-success" href="{{ url('/data-siswa') }}">
                                        <i class="bi bi-bar-chart-steps"></i></a></small></p>
                                    </div>
                                @endif
                                <div class="col">
                                    <p><small class="text-muted"><i class="bi bi-dot me-1"></i> Info Pelatihan 
                                        <a class="btn btn-sm btn-outline-success" href="{{ url('/info-kegiatan') }}">
                                    <i class="bi bi-megaphone-fill"></i></a></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($LogUser->role == 'siswa')
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="bi bi-caret-right-fill me-1"></i> Pelatihan yang diikuti
                        </button>
                        </h3>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body mt-2">
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h5 class="modal-title"><i class="bi bi-person-bounding-box me-1"></i> Ubah Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-2" action="{{ url('/updateprofile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="siswa_id" id="prfsiswaID" value="{{ $LogUser->siswa_id }}">
                        <div class="row col-md-12">
                            <div class="col-md-12 mt-2">
                                <label for="prfname"><i class="bi bi-person me-1"></i> Ubah Nama Pengguna</label>
                                <input type="text" class="form-control mt-2" name="name" id="prfname" value="{{ $LogUser->name }}" placeholder="Ubah nama anda..." required>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-6 mt-4">
                                <label for="prfemail"><i class="bi bi-envelope me-1"></i> Ubah Email Pengguna</label>
                                <input type="email" class="form-control mt-2" name="email" id="prfemail" value="{{ $LogUser->email }}" placeholder="Ubah email anda..." required>
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="prfpassword"><i class="bi bi-key me-1"></i> Ubah Kata Sandi</label>
                                <div class="input-group mb-3">
                                    <button onclick="ShowPassProfile()" class="btn btn-outline-secondary mt-2" type="button">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                    <input type="password" class="form-control mt-2" name="password" id="prfpassword" placeholder="Ubah kata sandi anda..." required>
                                </div>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-12 mt-2">
                                <label for="prfimg"><i class="bi bi-card-image me-1"></i> Ubah Foto Pengguna</label>
                                <div class="input-group mb-3 mt-2">
                                    <input type="file" class="form-control" name="image" id="prfimg">
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="modal-footer bg-success mt-2">
                            <a type="button" class="btn btn-secondary btn-sm btncancel text-light" data-bs-dismiss="modal">
                            <i class="bi bi-person-x me-1"></i> Batal</a>
                            <button type="submit" class="btn btn-primary btn-sm btnacc text-light">
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
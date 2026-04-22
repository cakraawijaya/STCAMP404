@extends('layout.main')

@section('container')
    <h2 class="mt-3 mt-md-0 lh-lg user-select-none">
        <i class="bi bi-clipboard-data-fill me-1"></i> Manajemen Data Pelatihan
    </h2><hr>

    <div class="mt-4 pt-1 pt-md-2"><caption> Data Pelatihan Siswa STCAMP404 :</caption></div>
    <div class="d-flex flex-column flex-md-row align-items-stretch align-items-md-center gap-3 mt-4 pt-2">
        <div class="d-flex gap-4">
            <a class="btn btn-outline-info text-dark w-100 w-md-auto d-inline-flex align-items-center gap-1 justify-content-center justify-content-md-start text-center text-md-start" data-bs-toggle="modal" data-bs-target="#ModalCreate">
                <i class="bi bi-person-plus-fill me-1"></i> Tambah
            </a>
            <a class="btn btn-outline-info text-dark w-100 w-md-auto d-inline-flex align-items-center gap-1 justify-content-center justify-content-md-start text-center text-md-start" href="{{ url('/data-pelatihan') }}">
                <i class="bi bi-arrow-clockwise me-1"></i> Refresh
            </a>
        </div>
        <form action="{{ url('/data-pelatihan') }}" method="GET" class="d-flex flex-column flex-md-row gap-3 ms-md-auto mt-4 mt-md-0">
            <input class="form-control text-center text-md-start" type="search" name="search" placeholder="Cari Data Siswa....">
            <button type="submit" class="btn btn-info d-inline-flex align-items-center gap-1 justify-content-center justify-content-md-start text-center text-md-start">
                <i class="bi bi-search me-1"></i> Cari
            </button>
        </form>
    </div>

    <!-- Session Alert Admin -->
    @php
        $isSearch = request()->has('search');
        $isEmpty = $data->count() == 0;
    @endphp
    @if ($msgAdmin = Session::get('addAdminNotif'))
        <div class="alert alert-success alert-dismissible fade show mt-4 user-select-none" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgAdmin }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($msgAdmin = Session::get('updateAdminNotif'))
        <div class="alert alert-success alert-dismissible fade show mt-4 user-select-none" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgAdmin }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($msgAdmin = Session::get('deleteAdminNotif'))
        <div class="alert alert-success alert-dismissible fade show mt-4 user-select-none" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgAdmin }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($msgSearchFound = Session::get('searchFoundNotif'))
        <div class="alert alert-success alert-dismissible fade show mt-4 user-select-none" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgSearchFound }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($msgerrCreateAdmin = Session::get('errorCreateAdminNotif'))
        <div class="alert alert-danger alert-dismissible fade show mt-4 user-select-none" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgerrCreateAdmin }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($msgerrUpdateAdmin = Session::get('errorUpdateAdminNotif'))
        <div class="alert alert-danger alert-dismissible fade show mt-4 user-select-none" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgerrUpdateAdmin }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Akhir Session Alert Admin -->

    <div class="table-responsive mt-4">
        <table class="table table-striped table-hover table-bordered caption-top align-middle">
            <thead class="table-success">
                <tr class="user-select-none">
                    <th scope="col">Nomor Induk Siswa</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Ambil Pelatihan</th>
                    <th scope="col">Dibuat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($data->count() > 0)
                    @foreach($data as $v)
                    <tr>
                        <td class="p-2 align-middle">{{ $v->nis }}</td>
                        <td class="p-2 align-middle">{{ $v->nama_siswa }}</td>
                        <td class="p-2 align-middle">{{ $v->pelatihan }}</td>
                        <td class="p-2 align-middle">{{ $v->updated_at->format('d-m-Y (H:i:s)') }}</td>
                        <td>
                            <div class="d-grid gap-2 p-2 align-middle user-select-none">
                                <a class="btn btn-outline-info btn-sm text-dark" data-bs-toggle="modal" data-bs-target="#ModalUpdate-{{ $v->id }}">
                                    <i class="bi bi-pencil-square me-1"></i> Ubah
                                </a>
                                <a class="btn btn-outline-info btn-sm text-dark" data-bs-toggle="modal" data-bs-target="#ModalDelete-{{ $v->id }}">
                                    <i class="bi bi-trash3 me-1"></i> Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="p-4 text-center align-middle user-select-none">
                            Data tidak ditemukan....
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center justify-content-md-start mt-4">
        <div class="pagination-wrapper overflow-auto user-select-none">
            {{ $data->links() }}
        </div>
    </div>

    <!-- Pop Up Modal Create-->
    <div class="modal fade modalmenu" id="ModalCreate" tabindex="-1" aria-labelledby="ModalCreateLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-dark">
                    <h5 class="modal-title user-select-none"><i class="bi bi-person-plus-fill me-1"></i> Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-2" action="{{ url('/data-pelatihan/add') }}" method="POST">
                    @csrf                
                        <div class="col-md-12 mt-2 user-select-none">
                            <label for="CreateNIS"><i class="bi bi-building me-1"></i> Nomor Induk Siswa</label>
                            <div class="input-group mb-3 mt-2">
                                <select class="form-select text-sm" name="nis" id="CreateNIS" required>
                                    <option value="" selected disabled>-- Pilih NIS --</option>
                                    @foreach($NIS as $val)
                                        <option value="{{ $val->siswa_id }}">
                                            {{ $val->siswa_id }} - {{ $val->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4 user-select-none">
                            <label for="exampleCreateCamp"><i class="bi bi-award me-1"></i> Pelatihan</label>
                            <div class="input-group mb-3 mt-2">
                                <label class="input-group-text" for="inputGroupSelect01">
                                    <small class="text-sm">Opsi:</small>
                                </label>
                                <select class="form-select text-sm" name="pelatihan" id="inputGroupSelect01" required>
                                    <option value="" selected disabled>-- Pilih Pelatihan --</option>
                                    @foreach($PEL as $val)
                                        <option value="{{ $val->nama_pelatihan }}">
                                            {{ $val->nama_pelatihan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-info gap-3 mt-2">
                        <a class="btn btn-light btn-sm btncancel" data-bs-dismiss="modal"><i class="bi bi-person-x me-1"></i> Batal</a>
                        <button type="submit" class="btn btn-light btn-sm btnacc"><i class="bi bi-person-check me-1"></i> Setuju</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Pop Up Modal Create-->

    <!-- Pop Up Modal Update-->
    @foreach($data as $v)
    <div class="modal fade modalmenu" id="ModalUpdate-{{ $v->id }}" tabindex="-1" aria-labelledby="ModalUpdateLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-dark">
                    <h5 class="modal-title user-select-none"><i class="bi bi-pencil-square me-1"></i> Ubah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-2" action="{{ url('/data-pelatihan/update/'.$v->id) }}" method="POST">
                        @csrf
                        <div class="col-md-12 mt-2 user-select-none">
                            <label for="exampleUpdateName"><i class="bi bi-person me-1"></i> Nama Pengguna</label>
                            <input type="name" class="form-control mt-2" name="nama_siswa" id="exampleUpdateName" value="{{ $v->nama_siswa }}" autofocus>
                        </div>
                        <div class="col-md-12 mt-4 user-select-none">
                            <label for="exampleCreateCamp"><i class="bi bi-award me-1"></i> Pelatihan</label>
                            <div class="input-group mb-3 mt-2">
                                <label class="input-group-text" for="UpdateDataPel">
                                    <small class="text-sm">Opsi Ubah:</small>
                                </label>
                                <select class="form-select text-sm" name="pelatihan" id="UpdateDataPel" required>
                                    <option value="" disabled>-- Pilih Pelatihan --</option>
                                    @foreach($PEL as $val)
                                        <option value="{{ $val->nama_pelatihan }}"
                                            {{ $v->pelatihan == $val->nama_pelatihan ? 'selected' : '' }}>
                                            {{ $val->nama_pelatihan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-info gap-3 mt-2">
                        <a type="button" class="btn btn-light btn-sm btncancel" data-bs-dismiss="modal"><i class="bi bi-person-x me-1"></i> Batal</a>
                        <button type="submit" class="btn btn-light btn-sm btnacc"><i class="bi bi-person-check me-1"></i> Setuju</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Pop Up Modal Update-->

    <!-- Pop Up Modal Delete-->
    <div class="modal fade modalmenu" id="ModalDelete-{{ $v->id }}" tabindex="-1" aria-labelledby="ModalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-dark">
                    <h5 class="modal-title user-select-none"><i class="bi bi-trash3 me-1"></i> Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center py-5 user-select-none">
                    <small class="text-muted py-5">Anda yakin ingin menghapus data ID = {{ $v->id }} ?</small>
                </div>
                <div class="modal-footer bg-info gap-3 mt-2">
                    <a type="button" class="btn btn-light btn-sm btncancel" data-bs-dismiss="modal">
                    <i class="bi bi-person-x me-1"></i> Batal</a>
                    <a type="submit" href="{{ url('/data-pelatihan/delete/'.$v->id) }}" class="btn btn-light btn-sm btnacc">
                    <i class="bi bi-person-check me-1"></i> Setuju</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Pop Up Modal Delete-->
    @endforeach


    <script>
        document.addEventListener("DOMContentLoaded", function () {

            let isSearch = {{ request()->has('search') ? 'true' : 'false' }};
            let isEmpty = {{ $data->count() == 0 ? 'true' : 'false' }};

            // Kalau search & hasil kosong, maka hapus semua alert
            if (isSearch && isEmpty) {
                document.querySelectorAll('.alert').forEach(el => el.remove());
            }

        });
    </script>
@endsection
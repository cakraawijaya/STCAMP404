@extends('layout.main')

@section('container')
    <h1><i class="bi bi-clipboard-data-fill me-1"></i> Manajemen Data Pelatihan</h1><hr><br>
    <div class="table-title">
        <div class="row">
            <div class="col"><caption> Data Pelatihan Siswa STCAMP404 :</caption></div>
            <div class="col-sm-12 mt-4">
                <form class="d-flex">
                    <div class="col-sm-8">
                        <a class="btn btn-outline-info text-dark me-2" role="group" data-bs-toggle="modal" data-bs-target="#ModalCreate"><i class="bi bi-person-plus-fill me-1"></i> Tambah</a>
                        <a class="btn btn-outline-info text-dark" role="group" href="{{ url('/data-pelatihan') }}"><i class="bi bi-arrow-clockwise me-1"></i> Refresh</a>
                    </div>
                    <form action="{{ url('/data-pelatihan') }}" method="GET">
                        <input class="form-control me-2" type="search" name="search" placeholder="Cari Data Siswa...." aria-label="Search">
                        <button type="submit" class="btn btn-outline-success btn-group" role="group"><i class="bi bi-search me-1"></i> Cari</button>
                    </form>
                </form>
            </div>
        </div>
    </div>


    <!-- Session Alert Admin -->
    @if ($msgAdmin = Session::get('addAdminNotif'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgAdmin }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($msgAdmin = Session::get('updateAdminNotif'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgAdmin }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($msgAdmin = Session::get('deleteAdminNotif'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgAdmin }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($msgerrCreateAdmin = Session::get('errorCreateAdminNotif'))
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgerrCreateAdmin }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($msgerrUpdateAdmin = Session::get('errorUpdateAdminNotif'))
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgerrUpdateAdmin }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <br>    
    <!-- Akhir Session Alert Admin -->


    <table class="table table-striped table-hover table-bordered caption-top mt-3 col-sm-12 table-responsive">
        <thead class="table-success">
            <tr>
                <th scope="col">Nomor Induk Siswa</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Ambil Pelatihan</th>
                <th scope="col">Dibuat</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $v)
            <tr>
                <td>{{ $v->nis }}</td>
                <td>{{ $v->nama_siswa }}</td>
                <td>{{ $v->pelatihan }}</td>
                <td>{{ $v->updated_at }}</td>
                <td>
                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-warning btn-sm text-dark" data-bs-toggle="modal" data-bs-target="#ModalUpdate-{{ $v->id }}">
                            <i class="bi bi-pencil-square me-1"></i> Ubah</a>
                        <a class="btn btn-outline-danger btn-sm text-dark" data-bs-toggle="modal" data-bs-target="#ModalDelete-{{ $v->id }}">
                            <i class="bi bi-trash3 me-1"></i> Hapus</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}

    <!-- Pop Up Modal Create-->
    <div class="modal fade modalmenu" id="ModalCreate" tabindex="-1" aria-labelledby="ModalCreateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h5 class="modal-title"><i class="bi bi-person-plus-fill me-1"></i> Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-2" action="{{ url('/data-pelatihan/add') }}" method="POST">
                    @csrf                
                        <div class="col-md-12 mt-2">
                            <label for="CreateNIS"><i class="bi bi-building me-1"></i> Nomor Induk Siswa</label>
                            <div class="input-group mb-3 mt-2">
                                <select type="number" class="form-select text-sm" name="nis" id="CreateNIS">
                                    @foreach($NIS as $val)
                                        <option value="{{ $val->nis }}" selected class="text-sm">{{ $val->nis }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @foreach($NAMA as $val)
                            <input type="hidden" name="nama_siswa" value="{{ $val->nama_siswa }}">
                        @endforeach
                        <div class="col-md-12 mt-4">
                            <label for="exampleCreateCamp"><i class="bi bi-award me-1"></i> Pelatihan</label>
                            <div class="input-group mb-3 mt-2">
                                <label class="input-group-text" for="inputGroupSelect01">
                                    <small class="text-sm">Opsi:</small>
                                </label>
                                <select class="form-select text-sm" name="pelatihan" id="inputGroupSelect01">
                                    @foreach($PEL as $val)
                                        <option value="{{ $val->nama_pelatihan }}" selected class="text-sm">{{ $val->nama_pelatihan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-success mt-2">
                        <a class="btn btn-secondary btn-sm btncancel text-light" data-bs-dismiss="modal"><i class="bi bi-person-x me-1"></i> Batal</a>
                        <button type="submit" class="btn btn-primary btn-sm btnacc text-light"><i class="bi bi-person-check me-1"></i> Setuju</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Pop Up Modal Create-->

    <!-- Pop Up Modal Update-->
    @foreach($data as $v)
    <div class="modal fade modalmenu" id="ModalUpdate-{{ $v->id }}" tabindex="-1" aria-labelledby="ModalUpdateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h5 class="modal-title"><i class="bi bi-pencil-square me-1"></i> Ubah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-2" action="{{ url('/data-pelatihan/update/'.$v->id) }}" method="POST">
                        @csrf
                        <div class="col-md-12 mt-2">
                            <label for="exampleUpdateName"><i class="bi bi-person me-1"></i> Nama Pengguna</label>
                            <input type="name" class="form-control mt-2" name="nama_siswa" id="exampleUpdateName" value="{{ $v->nama_siswa }}" autofocus>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="exampleCreateCamp"><i class="bi bi-award me-1"></i> Pelatihan</label>
                            <div class="input-group mb-3 mt-2">
                                <label class="input-group-text" for="UpdateDataPel">
                                    <small class="text-sm">Opsi Ubah:</small>
                                </label>
                                <select class="form-select text-sm" name="pelatihan" id="UpdateDataPel">
                                    @foreach($PEL as $val)
                                        <option value="{{ $val->nama_pelatihan }}" selected class="text-sm">{{ $val->nama_pelatihan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-success mt-2">
                        <a type="button" class="btn btn-secondary btn-sm btncancel text-light" data-bs-dismiss="modal"><i class="bi bi-person-x me-1"></i> Batal</a>
                        <button type="submit" class="btn btn-primary btn-sm btnacc text-light"><i class="bi bi-person-check me-1"></i> Setuju</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Pop Up Modal Update-->

    <!-- Pop Up Modal Delete-->
    <div class="modal fade modalmenu" id="ModalDelete-{{ $v->id }}" tabindex="-1" aria-labelledby="ModalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h5 class="modal-title"><i class="bi bi-trash3 me-1"></i> Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <small class="text-muted">Anda yakin ingin menghapus data yang memiliki ID = "{{ $v->id }}" ini ?</small>
                </div>
                <div class="modal-footer bg-success mt-2">
                    <a type="button" class="btn btn-secondary btn-sm btncancel text-light" data-bs-dismiss="modal">
                    <i class="bi bi-person-x me-1"></i> Batal</a>
                    <a type="submit" href="{{ url('/data-pelatihan/delete/'.$v->id) }}" class="btn btn-primary btn-sm btnacc text-light">
                    <i class="bi bi-person-check me-1"></i> Setuju</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Pop Up Modal Delete-->
    @endforeach
@endsection
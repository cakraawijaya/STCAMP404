@extends('layout.main')

@section('container')
    <h2 class="mt-3 mt-md-0 user-select-none">
        <i class="bi bi-bar-chart-steps me-1"></i> Data Siswa
    </h2><hr>

    <div class="mt-4 pt-1 pt-md-2"><caption> Data Pelatihan Anda :</caption></div>
    <div class="d-flex flex-column flex-md-row align-items-stretch align-items-md-center gap-3 mt-4 pt-2">
        <div class="d-flex gap-4">
            <a class="btn btn-outline-info text-dark w-100 w-md-auto d-inline-flex align-items-center gap-1 justify-content-center justify-content-md-start text-center text-md-start" data-bs-toggle="modal" data-bs-target="#ModalAdd">
                <i class="bi bi-person-plus-fill me-1"></i> Daftar
            </a>
            <a class="btn btn-outline-info text-dark w-100 w-md-auto d-inline-flex align-items-center gap-1 justify-content-center justify-content-md-start text-center text-md-start" href="{{ url('/data-siswa') }}">
                <i class="bi bi-arrow-clockwise me-1"></i> Refresh
            </a>
        </div>
    </div>

    <!-- Session Alert Siswa -->
    @if ($msgSiswa = Session::get('addSiswaNotif'))
        <div class="alert alert-success alert-dismissible fade show mt-4 user-select-none" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgSiswa }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($msgerrSiswa = Session::get('erroraddSiswaNotif'))
        <div class="alert alert-danger alert-dismissible fade show mt-4 user-select-none" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgerrSiswa }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Akhir Session Alert Siswa -->

    <div class="table-responsive mt-4">
        <table class="table table-striped table-hover table-bordered caption-top align-middle">
            <thead class="table-success">
                <tr class="user-select-none">
                    <th>Nomor Induk Siswa</th>
                    <th>Pelatihan yang diikuti</th>
                    <th>Waktu Daftar</th>
                </tr>
            </thead>
            <tbody>
                @if($value->count() > 0)
                    @foreach($value as $v)
                        <tr>
                            <td>{{ $v->nis }}</td>
                            <td>{{ $v->pelatihan }}</td>
                            <td>{{ $v->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="text-center p-4">
                            Data tidak ditemukan....
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center justify-content-md-start mt-4">
        <div class="pagination-wrapper overflow-auto">
            {{ $value->links() }}
        </div>
    </div>


    <!-- Pop Up Modal Add-->
    <div class="modal fade modalmenu" id="ModalAdd" tabindex="-1" aria-labelledby="ModalAddLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h5 class="modal-title user-select-none"><i class="bi bi-person-plus-fill me-1"></i> Daftar Pelatihan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-2" action="{{ url('/data-siswa/add') }}" method="POST">
                      @csrf
                      <div class="col-md-12 mt-3 user-select-none">
                        <label for="AddName"><i class="bi bi-building me-1"></i> Nomor Induk Siswa</label>
                        <input type="text" class="form-control mt-2" value="{{ $LogUser->siswa_id }}" disabled>
                        <input type="hidden" name="siswa_id" value="{{ $LogUser->siswa_id }}">
                      </div>
                      <div class="col-md-12 mt-4 user-select-none">
                        <label for="AddName"><i class="bi bi-person me-1"></i> Nama Pengguna</label>
                        <input type="text" class="form-control mt-2" name="name" value="{{ $LogUser->name }}" disabled>
                        <input type="hidden" name="name" value="{{ $LogUser->name }}">
                      </div>  
                      <div class="col-md-12 mt-4 user-select-none">
                        <label for="AddExercise"><i class="bi bi-award me-1"></i> Pelatihan</label>
                        <div class="input-group mb-3 mt-2">
                            <label class="input-group-text" for="AddExercise">
                                <small class="text-sm">Opsi:</small>
                            </label>
                            <select class="form-select text-sm @error('pelatihan') is-invalid @enderror" name="pelatihan" id="AddExercise">
                                @foreach($PEL as $val)
                                    <option value="{{ $val->nama_pelatihan }}" selected class="text-sm">{{ $val->nama_pelatihan }}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer bg-primary gap-3 mt-2">
                        <a type="button" class="btn btn-light btn-sm btncancel" data-bs-dismiss="modal">
                        <i class="bi bi-person-x me-1"></i> Batal</a>
                        <button type="submit" class="btn btn-light btn-sm btnacc">
                        <i class="bi bi-person-check me-1"></i> Setuju</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Pop Up Modal Add-->
@endsection
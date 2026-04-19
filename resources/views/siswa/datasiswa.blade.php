@extends('layout.main')

@section('container')
    <h1><i class="bi bi-bar-chart-steps me-1"></i> Data Siswa</h1><hr><br>
    <div class="table-title">
        <div class="row">
            <div class="col"><caption> Data Pelatihan Anda :</caption></div>
            <div class="col-sm-12 mt-4">
                <form class="d-flex">
                    <div class="col-sm-8">
                        <a class="btn btn-outline-info text-dark me-2" role="group" data-bs-toggle="modal" data-bs-target="#ModalAdd"><i class="bi bi-person-plus-fill me-1"></i> Daftar</a>
                        <a class="btn btn-outline-info text-dark" role="group" href="{{ url('/data-siswa') }}"><i class="bi bi-arrow-clockwise me-1"></i> Refresh</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Session Alert Siswa -->
    @if ($msgSiswa = Session::get('addSiswaNotif'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgSiswa }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($msgerrSiswa = Session::get('erroraddSiswaNotif'))
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgerrSiswa }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Akhir Session Alert Siswa -->
    <br>

    <table class="table table-striped table-hover table-bordered caption-top mt-3 col-sm-12 table-responsive">
        <thead class="table-success">
            <tr>
                <th scope="col">Nomor Induk Siswa</th>
                <th scope="col">Pelatihan yang diikuti</th>
                <th scope="col">Waktu Daftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($value as $v)
            <tr>
                <td>{{ $v->nis }}</td>
                <td>{{ $v->pelatihan }}</td>
                <td>{{ $v->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $value->links() }}


    <!-- Pop Up Modal Add-->
    <div class="modal fade modalmenu" id="ModalAdd" tabindex="-1" aria-labelledby="ModalAddLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h5 class="modal-title"><i class="bi bi-person-plus-fill me-1"></i> Daftar Pelatihan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-2" action="{{ url('/data-siswa/add') }}" method="POST">
                      @csrf
                      <div class="col-md-12 mt-3">
                        <label for="AddName"><i class="bi bi-building me-1"></i> Nomor Induk Siswa</label>
                        <input type="text" class="form-control mt-2" value="{{ $v->nis }}" disabled>
                        <input type="hidden" name="siswa_id" required>
                      </div>
                      <div class="col-md-12 mt-4">
                        <label for="AddName"><i class="bi bi-person me-1"></i> Nama Pengguna</label>
                        <input type="text" class="form-control mt-2" name="name" value="{{ $v->nama_siswa }}" disabled>
                        <input type="hidden" name="name" required>
                      </div>  
                      <div class="col-md-12 mt-4">
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
    <!-- Akhir Pop Up Modal Add-->
@endsection
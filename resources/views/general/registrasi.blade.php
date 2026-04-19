@extends('layout.main')

@section('container')
    <h1><i class="bi bi-person-lines-fill me-1"></i> Registrasi</h1><hr>

    <!-- Session Alert Register -->
    @if ($msgReg = Session::get('registerNotif'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgReg }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Akhir Session Alert Register -->
    

    <form class="form-group row" action="{{ url('/registrasiUser') }}" method="POST">
        @csrf
        <input name="siswa_id" type="hidden" value="{{ $defid + $jumlah }}">
        <input name="image" type="hidden" value="asset\img\profile\default.jpg">
        <div class="col-xl-12">
            <div class="col-md-6 mt-4 input-sm">
                <label for="name"><i class="bi bi-envelope me-1"></i> Nama</label>
                <input id="name" type="text" class="form-control mt-3 @error('rname') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Masukan nama lengkap anda...">
                @error('rname')
                    <span class="text-danger invalid-feedback" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong> Kesalahan penulisan nama !</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-xl-12">
            <div class="col-md-6 mt-4 input-sm">
                <label for="email"><i class="bi bi-envelope me-1"></i> Email</label>
                <input id="email" type="email" class="form-control mt-3 @error('remail') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukan email anda...">
                @error('remail')
                    <span class="text-danger invalid-feedback" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong> Kesalahan penulisan email !</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mt-4 input-sm me-4">
                <label for="password"><i class="bi bi-key me-1"></i> Kata Sandi</label>
                <div class="input-group mb-3 mt-2">
                    <button onclick="ShowPassRegister()" class="btn btn-outline-secondary" type="button">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                    <input id="rpassword" type="password" class="form-control @error('rpassword') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Masukan kata sandi anda...">
                    @error('rpassword')
                        <span class="text-danger invalid-feedback" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <strong> Password salah: gagal konfirmasi!</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12 mt-2">
                  <a href="#" class="login" data-bs-toggle="modal" data-bs-target="#ModalLogin">
                    Sudah Punya Akun ? Login Sekarang <i class="bi bi-patch-exclamation-fill"></i>
                  </a>
                </div>
            </div>
            <div class="col-md-3 mt-4 input-sm">
                <label for="password-confirm"><i class="bi bi-key me-1"></i> Konfirmasi Sandi</label>
                <div class="input-group mb-3 mt-2">
                    <button onclick="ShowPassConfirmRegister()" class="btn btn-outline-secondary" type="button">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                    <input id="rpassword-confirm" type="password" class="form-control @error('rpassword') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi kata sandi anda...">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mt-4 input-sm">
                <button type="submit" class="btn btn-outline-success btn-sm btnreg"><i class="bi bi-person-lines-fill me-1"></i> Registrasi</button>
            </div>
        </div>
    </form>


    <!-- Show Password-->
    <script>
    function ShowPassRegister() {
        var x = document.getElementById("rpassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function ShowPassConfirmRegister() {
        var x = document.getElementById("rpassword-confirm");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
    <!-- Akhir Show Password-->
@endsection
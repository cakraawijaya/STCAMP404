@extends('layout.main')

@section('container')
    <h2><i class="bi bi-person-lines-fill me-1"></i> Registrasi</h2><hr>

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
    

    <form action="{{ url('/registrasiUser') }}" method="POST">
        @csrf
        <input name="siswa_id" type="hidden" value="{{ $defid + $jumlah }}">
        <input name="image" type="hidden" value="asset\img\profile\default.jpg">
        <div class="row">
            <div class="col-md-4 mt-4 input-sm">
                <label for="name"><i class="bi bi-envelope me-1"></i> Nama</label>
                <input type="text" id="name_registration" name="name" 
                class="form-control mt-3 @error('name') is-invalid @enderror" value="{{ old('name') }}" 
                required autocomplete="name" autofocus placeholder="Masukan nama lengkap anda...">
                @error('name')
                <div class="text-danger small mt-1">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                    <strong>Nama sudah ada di sistem, cari yang lain !!</strong>
                </div>
                @enderror
            </div>
            <div class="col-md-4 mt-4 input-sm">
                <label for="email"><i class="bi bi-envelope me-1"></i> Email</label>
                <input type="email" id="email_registration" name="email" 
                class="form-control mt-3 @error('email') is-invalid @enderror" value="{{ old('email') }}" 
                required autocomplete="email" placeholder="Masukan email anda...">
                @error('email')
                <div class="text-danger small mt-1">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                    <strong>Email sudah ada di sistem, cari yang lain !!</strong>
                </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mt-4 input-sm">
                <label for="password"><i class="bi bi-key me-1"></i> Kata Sandi</label>
                <div class="input-group mt-3">
                    <button onclick="ShowPassRegister()" class="btn btn-outline-secondary" type="button">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                    <input type="password" id="password_registration" name="password" 
                    class="form-control @error('password') is-invalid @enderror"
                    required autocomplete="new-password" placeholder="Masukan kata sandi anda...">
                </div>
                @error('password')
                    <div class="text-danger small mt-1">
                        <i class="bi bi-exclamation-triangle-fill me-1"></i>
                        @if($errors->first('password') == 'error')
                            <strong>Gunakan password terbaru !</strong>
                        @else
                            <strong>Password min.6 karakter !</strong>
                        @endif
                    </div>
                @enderror
            </div>
            <div class="col-md-4 mt-4 input-sm">
                <label for="password-confirm"><i class="bi bi-key me-1"></i> Konfirmasi Sandi</label>
                <div class="input-group mt-3">
                    <button onclick="ShowPassConfirmRegister()" class="btn btn-outline-secondary" type="button">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                    <input type="password" id="password_registration_confirm" name="password_confirmation" 
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    required autocomplete="new-password" placeholder="Konfirmasi kata sandi anda...">
                </div>
                @error('password_confirmation')
                    <div class="text-danger small mt-1">
                        <i class="bi bi-exclamation-triangle-fill me-1"></i>
                        <strong>Konfirmasi password tidak cocok !</strong>
                    </div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-12 mt-5">
            <a href="#" class="login" data-bs-toggle="modal" data-bs-target="#ModalLogin">
            Sudah Punya Akun ? Login Sekarang <i class="bi bi-patch-exclamation-fill"></i>
            </a>
        </div>
        <div class="col-md-12 mt-4 input-sm">
            <button type="submit" class="btn btn-primary btn-md btnreg p-2"><i class="bi bi-person-lines-fill me-1"></i> Registrasi</button>
        </div>
    </form>


    <!-- Show Password-->
    <script>
    function ShowPassRegister() {
        var x = document.getElementById("password_registration");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function ShowPassConfirmRegister() {
        var x = document.getElementById("password_registration_confirm");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
    <!-- Akhir Show Password-->
@endsection
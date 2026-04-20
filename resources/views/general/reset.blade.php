@extends('layout.main')

@section('container')
    <h2 class="user-select-none"><i class="bi bi-universal-access"></i> Reset Password</h2><hr>
    
    @if($data)
        <form class="form-group row" action="{{ url('/resetProcess') }}" method="POST">
            @csrf
            <div class="col-xl-12">
                <div class="mt-5 col-md-6 input-sm user-select-none">
                    <label for="password"><i class="bi bi-envelope me-1"></i> Email</label>
                    <div class="input-group mb-3 mt-2">
                        <input type="email" class="form-control" value="{{ $data->email }}" disabled>
                        <input type="hidden" name="email" value="{{ $data->email }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mt-2 input-sm me-4 user-select-none">
                    <label for="password"><i class="bi bi-key me-1"></i> Kata Sandi Baru</label>
                    <div class="input-group mb-3 mt-2">
                        <button onclick="ShowPassForget()" class="btn btn-outline-secondary" type="button">
                        <i class="bi bi-eye-fill"></i>
                        </button>
                        <input type="password" id="new_password" name="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        placeholder="Masukan kata sandi baru..." required autofocus>
                        @error('password')
                            <span class="text-danger invalid-feedback user-select-none" role="alert">
                                <i class="bi bi-exclamation-triangle-fill mr-1"></i>
                                @if($errors->first('password') == 'error')
                                    <strong>Gunakan password terbaru !</strong>
                                @else
                                    <strong>Password min.6 karakter !</strong>
                                @endif
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3 mt-2 input-sm user-select-none">
                    <label for="password-confirm user-select-none"><i class="bi bi-key me-1"></i> Konfirmasi Sandi Baru</label>
                    <div class="input-group mb-3 mt-2">
                        <button onclick="ShowPassConfirmForget()" class="btn btn-outline-secondary" type="button">
                        <i class="bi bi-eye-fill"></i>
                        </button>
                        <input type="password" id="new_password_confirm" name="password_confirmation" 
                        class="form-control @error('password_confirmation') is-invalid @enderror" 
                        placeholder="Konfirmasi kata sandi baru..." required>
                        @error('password_confirmation')
                            <span class="text-danger invalid-feedback user-select-none" role="alert">
                                <i class="bi bi-exclamation-triangle-fill mr-1"></i>
                                <strong>Konfirmasi password tidak cocok !</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-xl-12 mt-4">
                <div class="input-sm">
                    <button type="submit" class="btn btn-primary btn-md btnreg p-2"><i class="bi bi-pencil-fill me-1"></i> Reset Password</button>
                </div>
            </div>
        </form>
    @endif

    <!-- Show Password-->
    <script>
    function ShowPassForget() {
        var x = document.getElementById("new_password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function ShowPassConfirmForget() {
        var x = document.getElementById("new_password_confirm");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
    <!-- Akhir Show Password-->
@endsection
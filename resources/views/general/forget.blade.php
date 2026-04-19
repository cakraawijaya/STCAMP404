@extends('layout.main')

@section('container')
    <h2><i class="bi bi-patch-question"></i> Lupa Password</h2><hr>

    <form class="form-group row" action="{{ url('/forgetProcess') }}" method="POST">
        @csrf
        <div class="col-xl-12">
            <div class="col-md-6 mt-4 input-sm">
                <label for="email"><i class="bi bi-envelope me-1"></i> Email</label>
                <input type="email" name="email" class="form-control mt-3 @error('email_forget') is-invalid @enderror" 
                value="{{ old('email') }}" placeholder="Masukan email anda..." required autocomplete="email" autofocus>
                @error('email_forget')
                    <span class="text-danger invalid-feedback" role="alert">
                        <i class="bi bi-exclamation-triangle-fill mr-1"></i>
                        <strong> Email salah / belum terdaftar di sistem !</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mt-4 input-sm">
                <button type="submit" class="btn btn-primary btn-md btnreg p-2"><i class="bi bi-envelope-check-fill me-1"></i> Setuju & Lanjutkan</button>
            </div>
        </div>
    </form>


    <!-- Show Password-->
    <script>
    function ShowPassForget() {
        var x = document.getElementById("fpassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function ShowPassConfirmForget() {
        var x = document.getElementById("fpassword-confirm");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
    <!-- Akhir Show Password-->
@endsection
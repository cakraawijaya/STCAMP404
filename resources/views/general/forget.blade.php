@extends('layout.main')

@section('container')
    <h1><i class="bi bi-patch-question"></i> Lupa Password</h1><hr>

    <!-- Session Alert Forget Failed -->
    @if ($msgForget = Session::get('forgetFailNotif'))
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            <small class="text-muted"><i class="bi bi-info-square-fill me-1"></i>
                {{ $msgForget }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Session Alert Forget Failed -->
    

    <form class="form-group row" action="{{ url('/forgetProcess') }}" method="POST">
        @csrf
        <div class="col-xl-12">
            <div class="col-md-6 mt-4 input-sm">
                <label for="email"><i class="bi bi-envelope me-1"></i> Email</label>
                <input id="femail" type="email" class="form-control mt-3" name="email" placeholder="Masukan email anda..." autofocus required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mt-4 input-sm">
                <button type="submit" class="btn btn-outline-success btn-md btnreg"><i class="bi bi-envelope-check-fill me-1"></i> Setuju & Lanjutkan</button>
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
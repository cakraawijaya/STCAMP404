<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light mainnavcolor">
  <div class="container-fluid">
    @if(Session()->has('LogSession'))
      <a class="navbar-brand nav-link fw-bold" href="{{ url('/home') }}"><i class="bi bi-book-half me-2"></i> {{ config('app.name', 'STCAMP404') }}</a>
    @else
      <a class="navbar-brand nav-link fw-bold" href="{{ url('/') }}"><i class="bi bi-book-half me-2"></i> {{ config('app.name', 'STCAMP404') }}</a>
    @endif
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        @if(Session()->has('LogSession'))
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}"><i class="bi bi-house-fill me-1"></i> Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard') }}"><i class="bi bi-person-rolodex me-1"></i> Dashboard</a>
          </li>
        @endif
      </ul>
      <form class="d-flex">
        @if(Session()->has('LogSession'))
          <a class="btn btn-outline-success keluar" href="{{ url('/logout') }}"><i class="bi bi-door-closed me-1"></i> Keluar</a>
        @else
          <a class="btn btn-outline-success masuk" data-bs-toggle="modal" data-bs-target="#ModalLogin"><i class="bi bi-door-open me-1"></i> Masuk</a>
        @endif
      </form>
    </div>
  </div>
</nav>
<!-- Navbar Akhir -->

<!-- Pop Up Modal 1-->
<div class="modal fade modallogin" id="ModalLogin" tabindex="-1" aria-labelledby="ModalLoginLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h5 class="modal-title"><i class="bi bi-door-open me-1"></i> Masuk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-2" method="POST" action="{{ url('/login') }}">
          @csrf
          <div class="col-md-12">
            <label for="email" class="col-form-label text-md-end"><i class="bi bi-envelope me-1"></i> Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
            name="email" value="{{ old('email') }}" placeholder="Masukan email anda..." required autocomplete="email" autofocus>
            @error('email')
              <i class="bi bi-exclamation-triangle-fill me-2"></i>
              <span class="text-danger invalid-feedback" role="alert">
                <strong> Kesalahan penulisan email !</strong>
              </span>
            @enderror
          </div>
          <div class="col-md-6 mt-2">
            <label for="password" class="col-form-label text-md-end"><i class="bi bi-key me-1"></i> Kata Sandi</label>
            <div class="input-group mb-3">
              <button onclick="ShowPassLogin()" class="btn btn-outline-secondary" type="button">
                <i class="bi bi-eye-fill"></i>
              </button>
              <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
              required autocomplete="current-password" placeholder="Masukan kata sandi anda...">
              @error('password')
                <span class="text-danger invalid-feedback" role="alert">
                  <strong class="me-2">Password salah! </strong><i class="bi bi-exclamation-triangle-fill"></i>
                </span>
              @enderror
            </div>
              <div class="col-md-12 mt-2">
                <a class="lupas" href="{{ url('/forgot-password') }}">
                  Lupa Password <i class="bi bi-patch-question"></i>
                </a>
              </div>
            </div>
            <div class="col-md-6 mt-4" style="padding: 32px">
              <div class="form-group form-check icheck-primary">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Setuju & Ingat!!
                </label>
              </div>
            </div>
          </div>
          <div class="modal-footer bg-success">
              <a type="button" class="btn btn-outline-warning btn-sm btnreg" href="{{ url('/registrasi') }}">
              <i class="bi bi-person-lines-fill me-1"></i> <span class="fontreg">Registrasi</span></a>
              <button type="submit" class="btn btn-outline-info btn-sm btnmasuk">
              <i class="bi bi-door-open me-1"></i> <span class="fontmasuk">Masuk</span></button>
          </div>
        </form>
    </div>
  </div>
</div>
<!-- Akhir Pop Up Modal 1-->

<!-- Show Password-->
<script>
function ShowPassLogin() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<!-- Akhir Show Password-->
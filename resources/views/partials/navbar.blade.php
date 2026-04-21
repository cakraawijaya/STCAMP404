<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light mainnavcolor p-3 mb-3 pb-2">
  <div class="container-fluid">

    @if(Session()->has('LogSession'))
      <a class="navbar-brand fw-bold me-lg-5 user-select-none" onclick="openLink('#')">
        <i class="bi bi-book-half me-2"></i> {{ config('app.name', 'STCAMP404') }}
      </a>
    @else
      <a class="navbar-brand fw-bold me-lg-5 user-select-none" href="{{ url('/') }}">
        <i class="bi bi-book-half me-2"></i> {{ config('app.name', 'STCAMP404') }}
      </a>
    @endif

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
      aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse mt-4 mt-lg-0 mb-3 mb-lg-0 px-0" id="navbarScroll">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @if(Session()->has('LogSession'))
          <li class="nav-item">
            <a class="nav-link user-select-none" href="{{ url('/home') }}">
              <i class="bi bi-house-fill me-1"></i> Beranda
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link user-select-none" href="{{ url('/dashboard') }}">
              <i class="bi bi-person-rolodex me-1"></i> Dashboard
            </a>
          </li>
        @endif
      </ul>

      <div class="d-flex align-items-lg-center mt-2 mt-lg-0">
        @if(Session()->has('LogSession'))
          <a class="btn btn-primary keluar user-select-none w-100 w-lg-auto"
             href="{{ url('/logout') }}">
            <i class="bi bi-door-closed me-1"></i> Keluar
          </a>
        @else
          <a class="btn btn-primary masuk user-select-none w-100 w-lg-auto"
             data-bs-toggle="modal" data-bs-target="#ModalLogin">
            <i class="bi bi-door-open me-1"></i> Masuk
          </a>
        @endif
      </div>
    </div>
  </div>
</nav>
<!-- Navbar Akhir -->

<!-- Pop Up Modal 1-->
<div class="modal fade modallogin" id="ModalLogin" tabindex="-1" aria-labelledby="ModalLoginLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <h5 class="modal-title user-select-none"><i class="bi bi-door-open me-1"></i> Masuk</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('/login') }}">
          @csrf

          <!-- EMAIL -->
          <div class="mb-3 user-select-none">
            <label class="form-label">
              <i class="bi bi-envelope me-1"></i> Email
            </label>

            <input type="email" id="email_login" name="email"
              class="form-control @error('email_login') is-invalid @enderror"
              pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$" 
              oninput="this.value = this.value.toLowerCase()"
              value="{{ old('email') }}"
              placeholder="Masukan email anda..."
              required>

            @error('email_login')
              <div class="text-danger small mt-1 user-select-none">
                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                Email salah / belum terdaftar di sistem !
              </div>
            @enderror
          </div>

          <!-- PASSWORD -->
          <div class="mb-2 user-select-none">
            <label class="form-label">
              <i class="bi bi-key me-1"></i> Kata Sandi
            </label>

            <div class="input-group">
              <button onclick="ShowPassLogin()" class="btn btn-outline-secondary" type="button">
                <i class="bi bi-eye-fill"></i>
              </button>

              <input type="password" id="password_login" name="password"
                class="form-control @error('password_login') is-invalid @enderror"
                placeholder="Masukan kata sandi anda..."
                required>
            </div>

            @error('password_login')
              <div class="text-danger small mt-1 user-select-none">
                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                Password salah !
              </div>
            @enderror
          </div>

          <div class="d-flex justify-content-between align-items-center mt-4">

            <div class="form-check m-0 user-select-none">
              <input class="form-check-input" type="checkbox" id="remember" name="remember">
              <label class="form-check-label" for="remember">
                Ingat saya
              </label>
            </div>

            <a class="lupas user-select-none" href="{{ url('/forgot-password') }}">
              Lupa Password <i class="bi bi-patch-question"></i>
            </a>

          </div>
        </div>

        <div class="modal-footer bg-primary gap-2 text-white mt-4">
          <a class="btn btn-light btn-sm" href="{{ url('/registrasi') }}">
            <i class="bi bi-person-lines-fill me-1"></i> Registrasi
          </a>

          <button type="submit" class="btn btn-light btn-sm">
            <i class="bi bi-door-open me-1"></i> Masuk
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Pop Up Modal 1-->

<!-- Show Password-->
<script>
function ShowPassLogin() {
  var x = document.getElementById("password_login");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<!-- Akhir Show Password-->

@if($errors->has('email_login') || $errors->has('password_login'))
<script>
    window.onload = function () {
        var modalElement = document.getElementById('ModalLogin');

        if (modalElement) {
            var modal = new bootstrap.Modal(modalElement);
            modal.show();
        }
    };
</script>
@endif
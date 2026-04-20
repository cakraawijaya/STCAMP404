    <!-- Footer -->
    <footer class="footer-custom mt-5">
        <div class="container py-4">
            <div class="row align-items-center text-center text-md-start">
                <div class="footer-brand col-12 col-md-6 mb-3 mb-md-0 d-flex flex-md-row 
                align-items-center justify-content-center justify-content-md-start gap-2">
                    <a href="#" class="text-muted text-decoration-none disabled d-none d-md-flex">
                        <i class="bi bi-book-half text-dark"></i>
                    </a>
                    <span class="text-dark small">
                        Sekolah Tinggi CAMP404
                    </span>
                </div>
                <div class="sosmed col-12 col-md-6">
                    <ul class="nav justify-content-center justify-content-md-end gap-3">
                        <li class="mx-2">
                            <a href="#" class="text-muted" data-toast="DefToast1" onclick="event.preventDefault()">
                                <i class="bi bi-twitter text-dark"></i>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="#" class="text-muted" data-toast="DefToast1" onclick="event.preventDefault()">
                                <i class="bi bi-instagram text-dark"></i>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="#" class="text-muted" data-toast="DefToast1" onclick="event.preventDefault()">
                                <i class="bi bi-facebook text-dark"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-address bg-primary text-center p-4 p-sm-3">
            © 2022 STCAMP404. All Rights Reserved | Alamat: Jl. Mampang Prapatan Raya, No. 73A Lantai 3, Jakarta Selatan 12790
        </div>
    </footer>
    <!-- Akhir Footer -->

    <!-- Toast -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="DefToast1" class="toast mb-2" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-primary">
                <strong class="me-auto text-light">
                    <i class="bi bi-exclamation-octagon"></i> STCAMP404
                </strong>
                <small class="text-light">informasi</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                <i class="bi bi-caret-right-fill"></i> Fungsi belum ditambahkan oleh admin!
            </div>
        </div>

        <div id="DefToast2" class="toast mb-2" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-primary">
                <strong class="me-auto text-light">
                    <i class="bi bi-exclamation-octagon"></i> STCAMP404
                </strong>
                <small class="text-light">informasi</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                <i class="bi bi-caret-right-fill"></i> Fungsi belum ditambahkan oleh admin!
            </div>
        </div>

        <div id="DefToast3" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-primary">
                <strong class="me-auto text-light">
                    <i class="bi bi-exclamation-octagon"></i> STCAMP404
                </strong>
                <small class="text-light">informasi</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                <i class="bi bi-caret-right-fill"></i> Fungsi belum ditambahkan oleh admin!
            </div>
        </div>
    </div>
    <!-- Akhir Toast -->

    <!-- JS -->
    <script src="bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap-5.2.0/js/popper.min.js"></script>
    <!-- JS Akhir -->
</body>
</html>

<script>
    document.querySelectorAll('[data-toast]').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            const toastId = this.getAttribute('data-toast');
            const toastEl = document.getElementById(toastId);

            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    });
</script>
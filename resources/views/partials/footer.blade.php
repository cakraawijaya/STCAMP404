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
                            <a href="#" class="text-muted" id="ToastDefault1">
                                <i class="bi bi-twitter text-dark"></i>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="#" class="text-muted" id="ToastDefault2">
                                <i class="bi bi-instagram text-dark"></i>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="#" class="text-muted" id="ToastDefault3">
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

    <!-- Toast 1 -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="DefToast1" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <strong class="me-auto text-light"><i class="bi bi-exclamation-octagon"></i> STCAMP404</strong>
                <small class="text-light">informasi</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <i class="bi bi-caret-right-fill"></i> Fungsi belum ditambahkan oleh admin!
            </div>
        </div>
    </div>
    <!-- Akhir Toast 1 -->

    <!-- Toast 2 -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="DefToast2" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <strong class="me-auto text-light"><i class="bi bi-exclamation-octagon"></i> STCAMP404</strong>
                <small class="text-light">informasi</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <i class="bi bi-caret-right-fill"></i> Fungsi belum ditambahkan oleh admin!
            </div>
        </div>
    </div>
    <!-- Akhir Toast 2 -->

    <!-- Toast 3 -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="DefToast3" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <strong class="me-auto text-light"><i class="bi bi-exclamation-octagon"></i> STCAMP404</strong>
                <small class="text-light">informasi</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <i class="bi bi-caret-right-fill"></i> Fungsi belum ditambahkan oleh admin!
            </div>
        </div>
    </div>
    <!-- Akhir Toast 3 -->

    <!-- JS -->
    <script src="bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap-5.2.0/js/popper.min.js"></script>
    <!-- JS Akhir -->
</body>
</html>

<script>
    const toastTrigger1 = document.getElementById('ToastDefault1')
    const toastLiveExample1 = document.getElementById('DefToast1')
    if (toastTrigger1) {
        toastTrigger1.addEventListener('click', () => {
            const toast1 = new bootstrap.Toast(toastLiveExample1)
            toast1.show()
        })
    }

    const toastTrigger2 = document.getElementById('ToastDefault2')
    const toastLiveExample2 = document.getElementById('DefToast2')
    if (toastTrigger2) {
        toastTrigger2.addEventListener('click', () => {
            const toast2 = new bootstrap.Toast(toastLiveExample2)
            toast2.show()
        })
    }

    const toastTrigger3 = document.getElementById('ToastDefault3')
    const toastLiveExample3 = document.getElementById('DefToast3')
    if (toastTrigger3) {
        toastTrigger3.addEventListener('click', () => {
            const toast3 = new bootstrap.Toast(toastLiveExample3)
            toast3.show()
        })
    }
</script>
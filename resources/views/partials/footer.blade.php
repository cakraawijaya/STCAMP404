    <!-- Footer -->
    <footer class="footer-custom mt-5">
        <div class="container py-4">
            <div class="row align-items-center text-center text-md-start">
                <div class="footer-brand col-12 col-md-6 mb-3 mb-md-0 d-flex flex-md-row user-select-none 
                align-items-center justify-content-center justify-content-md-start gap-2">
                    <a href="#" class="text-muted text-decoration-none disabled d-none d-md-flex">
                        <i class="bi bi-book-half text-dark"></i>
                    </a>
                    <span class="text-dark small">
                        <strong>Studi Kasus:</strong> Sekolah Tinggi CAMP404
                    </span>
                </div>
                <div class="sosmed col-12 col-md-6">
                    <ul class="nav justify-content-center justify-content-md-end gap-3">
                        <li class="mx-2">
                            <a class="text-muted" data-toast="DefToast1"
                            onclick="openLink(null, true, this.dataset.toast)">
                                <i class="bi bi-twitter text-dark"></i>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a class="text-muted" data-toast="DefToast2"
                            onclick="openLink(null, true, this.dataset.toast)">
                                <i class="bi bi-instagram text-dark"></i>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a class="text-muted" data-toast="DefToast3"
                            onclick="openLink(null, true, this.dataset.toast)">
                                <i class="bi bi-facebook text-dark"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-address bg-primary text-center p-4 p-sm-3 user-select-none">
            © 2022 STCAMP404. All Rights Reserved | Alamat: Jl. Mampang Prapatan Raya, No. 73A Lantai 3, Jakarta Selatan 12790
        </div>
    </footer>
    <!-- Akhir Footer -->

    <!-- Toast -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="DefToast1" class="toast bg-light mb-2 user-select-none" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-primary">
                <strong class="me-auto text-light">
                    <i class="bi bi-exclamation-octagon"></i> STCAMP404
                </strong>
                <small class="text-light me-1">informasi</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                <i class="bi bi-caret-right-fill"></i> Twitter dinonaktifkan oleh admin !!
            </div>
        </div>

        <div id="DefToast2" class="toast bg-light mb-2 user-select-none" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-primary">
                <strong class="me-auto text-light">
                    <i class="bi bi-exclamation-octagon"></i> STCAMP404
                </strong>
                <small class="text-light me-1">informasi</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                <i class="bi bi-caret-right-fill"></i> Instagram dinonaktifkan oleh admin !!
            </div>
        </div>

        <div id="DefToast3" class="toast bg-light mb-2 user-select-none" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-primary">
                <strong class="me-auto text-light">
                    <i class="bi bi-exclamation-octagon"></i> STCAMP404
                </strong>
                <small class="text-light me-1">informasi</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                <i class="bi bi-caret-right-fill"></i> Facebook dinonaktifkan oleh admin !!
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
    window.openLink = function (url, openInNewTab = true, toastId = null) {

        if (!url || typeof url !== "string" || url.trim() === "" || url.startsWith("#")) {
            if (toastId) {
                const toastEl = document.getElementById(toastId);
                if (toastEl) {
                    new bootstrap.Toast(toastEl).show();
                }
            }
            return false;
        }

        if (url.startsWith("mailto:")) {
            window.location.href = url;
            return true;
        }

        if (openInNewTab) {
            window.open(url, "_blank", "noopener,noreferrer");
        } else {
            window.location.href = url;
        }

        return true;
    };
</script>
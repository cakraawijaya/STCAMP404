    <!-- Footer -->
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top border-success p-5 mt-5">
        <div class="col-md-5 d-flex align-items-center">
            <a href="#" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1 btn disabled">
                <i class="bi bi-book-half"></i>
            </a>
            <span class="text-muted monospace">© 2022 STCAMP404 | All Rights Reserved</span>
        </div>

        <ul class="nav col-md-3 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a type="submit" class="text-muted" id="ToastDefault1">
                <i class="bi bi-twitter"></i>
            </a></li>
            <li class="ms-3"><a type="submit" class="text-muted" id="ToastDefault2">
                <i class="bi bi-instagram"></i>
            </a></li>
            <li class="ms-3"><a type="submit" class="text-muted" id="ToastDefault3">
                <i class="bi bi-facebook"></i>
            </a></li>
        </ul>
        <div class="col-md-5 d-flex align-items-center mt-1">
            Jl. Gunung Anyar, No. 28, Surabaya, Jawa Timur
        </div>
    </footer>
    <!-- Footer Akhir -->

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
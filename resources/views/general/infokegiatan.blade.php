@extends('layout.main')

@section('container')
    <h1><i class="bi bi-megaphone-fill me-1"></i> Info Kegiatan</h1><hr><br>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="bi bi-bookmarks-fill me-1"></i> Bootstrap 5
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body mt-2">
                    <strong>Pengumuman :</strong><br><br><strong><code> Pelatihan bootstrap 5</code>
                    </strong> akan diadakan pada tanggal <strong><code>02/10/2022</code></strong>.
                    Bagi peserta pelatihan tersebut harap memperhatikan waktu agar tidak ketinggalan kelas. 
                    Informasi lebih lanjut akan disampaikan melalui grup telegram.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <i class="bi bi-bookmarks-fill me-1"></i> Git
            </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body mt-2">
                    <strong>Pengumuman :</strong><br><br><strong><code> Pelatihan git</code>
                    </strong> akan diadakan pada tanggal <strong><code>20/10/2022</code></strong>.
                    Bagi peserta pelatihan tersebut harap memperhatikan waktu agar tidak ketinggalan kelas. 
                    Informasi lebih lanjut akan disampaikan melalui grup telegram.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <i class="bi bi-bookmarks-fill me-1"></i> Laravel 8
            </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body mt-2">
                    <strong>Pengumuman :</strong><br><br><strong><code> Pelatihan laravel 8</code>
                    </strong> akan diadakan pada tanggal <strong><code>12/11/2022</code></strong>.
                    Bagi peserta pelatihan tersebut harap memperhatikan waktu agar tidak ketinggalan kelas. 
                    Informasi lebih lanjut akan disampaikan melalui grup telegram.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <i class="bi bi-bookmarks-fill me-1"></i> Codeigniter 4
            </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body mt-2">
                    <strong>Pengumuman :</strong><br><br><strong><code> Pelatihan codeigniter 4</code>
                    </strong> akan diadakan pada tanggal <strong><code>05/12/2022</code></strong>.
                    Bagi peserta pelatihan tersebut harap memperhatikan waktu agar tidak ketinggalan kelas. 
                    Informasi lebih lanjut akan disampaikan melalui grup telegram.
                </div>
            </div>
        </div>
    </div>
@endsection
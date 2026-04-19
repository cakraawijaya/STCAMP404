[![Open Source Love](https://badges.frapsoft.com/os/v1/open-source.svg?style=flat)](https://github.com/ellerbrock/open-source-badges/)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg?logo=github&color=%23F7DF1E)](https://opensource.org/licenses/MIT)
![GitHub last commit](https://img.shields.io/github/last-commit/cakraawijaya/STCAMP404?logo=Codeforces&logoColor=white&color=%23F7DF1E)
![Project](https://img.shields.io/badge/Project-Website-light.svg?style=flat&logo=googlechrome&logoColor=white&color=%23F7DF1E)
![Type](https://img.shields.io/badge/Type-Course-light.svg?style=flat&logo=gitbook&logoColor=white&color=%23F7DF1E)

# STCAMP404
<p>STCAMP404 adalah hasil dari pelatihan reguler CAMP404 Batch 15 yang saya sesuaikan.</p>

<br><br>

## Kebutuhan Proyek
| Bagian | Deskripsi |
| --- | --- |
| Fitur | • Masuk<br>• Buat<br>• Baca<br>• Ubah<br>• Hapus<br>• Validasi<br>• Paginasi<br>• Pencarian<br>• Grafik<br>• Hak akses<br>• DLL |
| Pustaka | Highchartjs |
| Kerangka Kerja | • Laravel 8<br>• Bootstrap 5 |
| Peralatan | • Visual Studio Code<br>• Xampp<br>• Git |

<br><br>

## Unduh & Instal
1. XAMPP dengan PHP versi 7.4

   <table><tr><td width="810">

   ```
   https://bit.ly/XAMPP_PHP7_Installer
   ```

   </td></tr></table><br>

2. Visual Studio Code

   <table><tr><td width="810">

   ```
   https://bit.ly/VScode_Installer
   ```

   </td></tr></table><br>

3. Git

   <table><tr><td width="810">

   ```
   https://bit.ly/GIT_Installer
   ```

   </td></tr></table>

<br><br>

## Basis data
1. Buka ``` XAMPP ```, lalu tekan tombol mulai di bagian ``` Apache ``` & ``` MySQL ```. Hal ini bertujuan untuk dapat mendukung website secara optimal.<br><br>

2. Akses peramban terlebih dahulu untuk membuka panel admin basis data, silakan salin tautan berikut: ``` localhost/phpmyadmin/ ```.<br><br>

3. Buat basis data bernama ``` stcamp404 ``` di lokal.<br><br>

4. Buka basis data ``` stcamp404 ``` dan Impor ``` stcamp404_db.sql ``` di direktori ``` STCAMP404/public/sql ```.<br><br>

5. Kemudian buka berkas XAMP: ``` php.ini ``` -> hapus ``` titik koma (;) ``` di depan ``` extension=intl ``` -> simpan.

<br><br>

## Akun Bawaan
| Peran | Surel | Nama Lengkap | Kata Sandi |
| --- | --- | --- | --- |
| Admin | admin@stcamp404.ac.id | Anastasya Geralda | 123456 |
| Siswa | 20220101@stcamp404.ac.id | Jaya Mangunati | 123456 |
| Siswa | 20220102@stcamp404.ac.id | Jadiyan Marto | 123456 |

<br><br>

## Memulai
1. Unduh  dan ekstrak repositori ini.<br><br>

2. Buka direktori ``` STCAMP404 ```, lalu buka ``` GitBash ``` di dalam direktori tersebut.
   <ul>
       <li>Pertama, periksa apakah ada masalah atau tidak, jika masih ada kesalahan, sesuaikan saja dengan situasinya.</li><br>
       <li>Kedua, langkah ini wajib dilakukan, jadi silakan salin perintah berikut ini:<br><br></li>
       
   <table><tr><td width="780">
     
   ````bash
   php artisan serve
   ````

   </td></tr></table>
   </ul><br>
   
3. Buka ``` peramban ``` anda (Tab baru), lalu ketik -> ``` http://127.0.0.1:8000/ ``` atau sesuaikan dengan yang ada di ``` GitBash ``` anda.<br><br>

4. Silakan masuk dan akses fitur-fiturnya, selamat menikmati [Selesai].

<br><br>

## Sorotan
<table>
<tr>
<th width="280">Tampilan Beranda</th>
<th width="280">Tampilan Info Kegiatan</th>
<th width="280">Tampilan Dasbor</th>
</tr>
<tr>
<td><img src="documentation/Home.jpg" alt="home"></td>
<td><img src="documentation/Activity Information.jpg" alt="activity-information"></td>
<td><img src="documentation/Dashboard.jpg" alt="dashboard"></td>
</tr>
</table>
<table>
<tr>
<th width="280">Tampilan Registrasi</th>
<th width="280">Tampilan Lupa Password</th>
<th width="280">Tampilan Pelatihan Pengguna</th>
</tr>
<tr>
<td><img src="documentation/Registration.jpg" alt="registration"></td>
<td><img src="documentation/Forgot Password.jpg" alt="forgot-password"></td>
<td><img src="documentation/User Training.jpg" alt="user-training"></td>
</tr></table>
<table>
<tr>
<th width="280">Tampilan Data Pelatihan</th>
<th width="280">Tampilan Data Siswa</th>
<th width="280">Tampilan Ubah Data</th>
</tr>
<tr>
<td><img src="documentation/Training Data.jpg" alt="training-data"></td>
<td><img src="documentation/Student Data.jpg" alt="student-data"></td>
<td><img src="documentation/Change Data.jpg" alt="change-data"></td>
</tr></table>

<br><br>

## Pengingat
<p>Jika penambahan otomatis basis data masih belum beres, maka anda dapat melakukan hal berikut ini di phpMyAdmin:</p>

<table><tr><td width="840">

```sql
SET  @num := 0;
UPDATE your_table SET id = @num := (@num+1);
ALTER TABLE your_table AUTO_INCREMENT =1;
```

</td></tr></table>

<br><br>

## Apresiasi
Jika karya ini bermanfaat bagi anda, maka dukunglah karya ini sebagai bentuk apresiasi kepada penulis dengan mengklik tombol ``` ⭐Bintang ``` di bagian atas repositori.

<br><br>

## Penafian
Aplikasi ini merupakan hasil karya saya sendiri dan bukan merupakan hasil plagiat dari penelitian atau karya orang lain, kecuali yang berkaitan dengan layanan pihak ketiga yang meliputi: pustaka, kerangka kerja, dan lain sebagainya.

<br><br>

## LISENSI 
LISENSI MIT - Hak Cipta © 2020 - Devan C. M. Wijaya

Dengan ini diberikan izin tanpa biaya kepada siapa pun yang mendapatkan salinan perangkat lunak ini dan file dokumentasi terkait perangkat lunak untuk menggunakannya tanpa batasan, termasuk namun tidak terbatas pada hak untuk menggunakan, menyalin, memodifikasi, menggabungkan, mempublikasikan, mendistribusikan, mensublisensikan, dan/atau menjual salinan Perangkat Lunak ini, dan mengizinkan orang yang menerima Perangkat Lunak ini untuk dilengkapi dengan persyaratan berikut:

Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus menyertai semua salinan atau bagian penting dari Perangkat Lunak.

DALAM HAL APAPUN, PENULIS ATAU PEMEGANG HAK CIPTA DI SINI TETAP MEMILIKI HAK KEPEMILIKAN PENUH. PERANGKAT LUNAK INI DISEDIAKAN SEBAGAIMANA ADANYA, TANPA JAMINAN APAPUN, BAIK TERSURAT MAUPUN TERSIRAT, OLEH KARENA ITU JIKA TERJADI KERUSAKAN, KEHILANGAN, ATAU LAINNYA YANG TIMBUL DARI PENGGUNAAN ATAU URUSAN LAIN DALAM PERANGKAT LUNAK INI, PENULIS ATAU PEMEGANG HAK CIPTA TIDAK BERTANGGUNG JAWAB, KARENA PENGGUNAAN PERANGKAT LUNAK INI TIDAK DIPAKSAKAN SAMA SEKALI, SEHINGGA RISIKO ADALAH MILIK ANDA SENDIRI.

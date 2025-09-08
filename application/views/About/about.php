<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= BASEURL?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $Data['kontenabout']; ?></li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-light"><?= $Data['kontenabout']; ?></h6>
            </div>
        </div>
        <div class="card-body">
            <div class="card-text">
                <h5># CRUD PHP MVC + MySQL (Belajar)</h5>
                <p>Aplikasi ini CRUD sederhana menggunakan PHP + MySQL, yang digunakan untuk belajar</p>

                <h6>Instalasi</h6>
                <ol>
                    <li>Simpan project ke dalam direktori lokal XAMPP (htdocs).</li>
                    <li>Buat database dengan nama: <i>crud_mvc_v1</i>.</li>
                    <li>Import database yang ada di: <i>crud_mvc_nwarsyh_v1/asset/database/crud_mvc_v1.sql</i></li>
                    <li>Ubah file <b>crud_mvc_nwarsyh_v1/.htaccess</b> pada baris: <b>RewriteBase /crud_mvc_nwarsyh_v1/</b> <i>Sesuaikan dengan lokasi project.</i> ;</li>
                    <li>Ubah file <b>crud_mvc_nwarsyh_v1/application/config.php</b> pada baris: <b>define('BASEURL', 'http://localhost/crud_mvc_nwarsyh_v1')</b> <i>Sesuaikan dengan lokasi project.</i> ;</li>
                </ol>


                <h6>Fitur</h6>
                    <ol>
                        <li>Routing aplikasi pada core seperti : <b>ApplicationCore, ControllerCore, DatabaseCore, AlertCore</b> ;</li>
                        <li>Penggunaan <b>Model</b> Setiap File Proses SQL;</li>
                        <li>Penggunaan <b>Controler</b> Untuk Konfigurasi Laman ;</li>
                        <li>Menampilkan data dengan <b>DataTable</b> ;</li>
                        <li>Menambah data dengan <b>Modal Form</b> ;</li>
                        <li>Mengupdate data dengan <b>Modal Form</b> ;</li>
                        <li>Menghapus data ;</li>
                        <li>Alert bootstrap setiap aksi simpan, edit dan hapus;</li>
                        <li>Relasi sederhana dua tabel ;</li>
                        <li>Upload Foto dan Update Foto sebagai foto profil ;</li>
                        <li>Dan lainnya.</li>
                    </ol>

                <h6>Teknologi</h6>
                <ol>
                    <li>PHP 7 ke aatas</li>
                    <li>MySQL (PDO)</li>
                    <li>Bootstrap</li>
                    <li>DataTable</li>
                    <li>SB Admin 2 Templates</li>
                </ol>
                <h6>Sumber Referensi</h6>
                <ul>
                    <li>Template: [SB Admin 2](<a href="https://startbootstrap.com/theme/sb-admin-2">https://startbootstrap.com/theme/sb-admin-2</a>)</li>
                    <li>Tutorial MVC : [WPU](<a href="https://www.youtube.com/@sandhikagalihWPU"> https://www.youtube.com/@sandhikagalihWPU)</a></li>
                    <li>Serta hasil belajar dari berbagai sumber lainnya</li>
                </ul>
                <h6>Tujuan</h6>
                    <p>Repository ini dibuat untuk **pembelajaran pribadi** dan **latihan menggunakan GitHub**.<br>
                        Semoga bisa bermanfaat bagi yang mau belajar, silahkan kembangkan lebi lanjut 🙌</p>

                <h6>License</h6>
                    <p>Proyek ini dirilis dengan lisensi **MIT**, dan dibuat khusus untuk tujuan pembelajaran.<br>
                        Boleh dipelajari, digunakan, dan dikembangkan lebih lanjut selama tetap mencantumkan kredit.</p>
                <h5>Terima Kasih</h5>


            </div>
        </div>
    </div>
</div>

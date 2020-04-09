<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])) {
    echo "<script type='text/javascript'>alert('Anda harus login terlebih dahulu!');</script>
          <meta http-equiv='refresh' content='0; url=../../index.php'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {

    if (isset($_POST['wedding'])) {
        // ambil data hasil submit dari form

        // echo $nama        = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
        // echo "<br>";
        // echo $jurusan     = mysqli_real_escape_string($mysqli, trim($_POST['jurusan']));
        // echo "<br>";
        // echo $wa          = mysqli_real_escape_string($mysqli, trim($_POST['wa']));
        // echo "<br>";
        // echo $paket       = mysqli_real_escape_string($mysqli, trim($_POST['paket']));
        // echo "<br>";
        // echo $fs_jw       = mysqli_real_escape_string($mysqli, trim($_POST['fs_jw']));
        // echo "<br>";
        // echo $fs_kk       = mysqli_real_escape_string($mysqli, trim($_POST['fs_kk']));
        // echo "<br>";
        // echo $fkb         = mysqli_real_escape_string($mysqli, trim($_POST['fkb']));
        // echo "<br>";
        // echo $fkk_jw      = mysqli_real_escape_string($mysqli, trim($_POST['fkk_jw']));
        // echo "<br>";
        // echo $fkk_kk      = mysqli_real_escape_string($mysqli, trim($_POST['fkk_kk']));
        // echo "<br>";
        // echo $fdt         = mysqli_real_escape_string($mysqli, trim($_POST['fdt']));
        // echo "<br>";
        // echo $fdo_jw      = mysqli_real_escape_string($mysqli, trim($_POST['fdo_jw']));
        // echo "<br>";
        // echo $fdo_kk      = mysqli_real_escape_string($mysqli, trim($_POST['fdo_kk']));
        // echo "<br>";
        // echo $dll         = mysqli_real_escape_string($mysqli, trim($_POST['dll']));
        // echo "<br>";
        echo $nama_file   = $_FILES['fupload']['name'];
        echo "<br>";
        echo $ukuran_file = $_FILES['fupload']['size'];
        echo "<br>";
        echo $tipe_file   = $_FILES['fupload']['type'];
        echo "<br>";
        echo $tmp_file    = $_FILES['fupload']['tmp_name'];
        echo "<br>";
        exit;
        //$tmp_file_satu      = $_FILES['fuploadd']['tmp_name'];	
        //$nama_file		     = $_FILES['fuploadd']['name'];    	


        // tentuka extension yang diperbolehkan
        $allowed_extensions = array('jpg', 'jpeg', 'png');
        // Set path folder tempat menyimpan gambarnya
        $path               = "../../images/edit/" . $nama_file;
        // check extension
        $file               = explode(".", $nama_file);
        $extension          = array_pop($file);
        if (in_array($extension, $allowed_extensions)) {
            // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
            if ($ukuran_file <= 100000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 100 MB
                // Jika ukuran file kurang dari sama dengan 100MB, lakukan :                    // Proses upload
                if (move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
                    // Jika gambar berhasil diupload, Lakukan :                         // perintah query untuk menyimpan data ke tabel barang
                    $sql = "INSERT INTO tbl_konsumen_upload (   nama,
                                                                jurusan,
                                                                wa,
                                                                paket,
                                                                fs_jw,
                                                                fs_kk,
                                                                fkb,
                                                                fkk_jw,
                                                                fkk_kk,
                                                                fdt,
                                                                fdo_jw,
                                                                fdo_kk,
                                                                dll,
                                                                gambar)
                                                                VALUES(
                                                                    '$nama',
                                                                    '$jurusan',
                                                                    '$wa',
                                                                    '$paket',
                                                                    '$fs_jw',
                                                                    '$fs_kk',
                                                                    '$fkb',
                                                                    '$fkk_jw',
                                                                    '$fkk_kk',
                                                                    '$fdt',
                                                                    '$fdo_jw',
                                                                    '$fdo_kk',
                                                                    '$dll',
                                                                    '$nama_file')";
                    $query = mysqli_query($mysqli, $sql) or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil simpan data
                        header("location: ../../main.php?page=wedding&alert=2");
                    }
                } else {
                    // Jika gambar gagal diupload, tampilkan pesan gagal upload
                    header("location: ../../main.php?page=wedding&alert=3");
                }
            } else {
                // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                header("location: ../../main.php?page=wedding&alert=4");
            }
        } else {
            // Jika tipe file yang diupload bukan JPG / JPEG / PNG, tampilkan pesan gagal upload
            header("location: ../../main.php?page=wedding&alert=5");
        }
    }
}

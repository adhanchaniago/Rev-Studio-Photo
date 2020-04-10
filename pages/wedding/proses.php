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

        $paket = mysqli_real_escape_string($mysqli, trim($_POST['paket']));

        if ($paket == "Shapire") {

            // ambil data hasil submit dari form
            $id_konsumen = mysqli_real_escape_string($mysqli, trim($_POST['id_konsumen']));
            $nama        = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $jurusan     = mysqli_real_escape_string($mysqli, trim($_POST['jurusan']));
            $wa          = mysqli_real_escape_string($mysqli, trim($_POST['wa']));
            $paket       = mysqli_real_escape_string($mysqli, trim($_POST['paket']));
            $fs_jw       = mysqli_real_escape_string($mysqli, trim($_POST['fs_jw']));
            $fs_kk       = mysqli_real_escape_string($mysqli, trim($_POST['fs_kk']));
            $fkb         = mysqli_real_escape_string($mysqli, trim($_POST['fkb']));
            $fkk_jw      = mysqli_real_escape_string($mysqli, trim($_POST['fkk_jw']));
            $fkk_kk      = mysqli_real_escape_string($mysqli, trim($_POST['fkk_kk']));
            $fdt         = mysqli_real_escape_string($mysqli, trim($_POST['fdt']));
            $fdo_jw      = mysqli_real_escape_string($mysqli, trim($_POST['fdo_jw']));
            $fdo_kk      = mysqli_real_escape_string($mysqli, trim($_POST['fdo_kk']));
            $dll         = mysqli_real_escape_string($mysqli, trim($_POST['dll']));

            $R10       = $_FILES['10R']['name'];
            $R16       = $_FILES['16R']['name'];
            $LokasiR10 = $_FILES['10R']['tmp_name'];
            $LokasiR16 = $_FILES['16R']['tmp_name'];

            move_uploaded_file($LokasiR10, "../../images/edit/" . $R10);
            move_uploaded_file($LokasiR16, "../../images/edit/" . $R16);

            $sql = "INSERT INTO tbl_konsumen_upload (   id_konsumen,
                                                    nama,
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
                                                    5r,
                                                    10r,
                                                    16r,
                                                    20r,
                                                    24r)
                                                    VALUES(
                                                        '$id_konsumen',
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
                                                        '$R5',
                                                        '$R10',
                                                        '$R16',
                                                        '$R20',
                                                        '$R24')";

            $query = mysqli_query($mysqli, $sql) or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?page=wedding&alert=2");
            } else {
                echo "<script>
                alert('Gagal Simpan')
                </script>";
            }
        } elseif ($paket == "Emerald") {

            // ambil data hasil submit dari form
            $id_konsumen = mysqli_real_escape_string($mysqli, trim($_POST['id_konsumen']));
            $nama        = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $jurusan     = mysqli_real_escape_string($mysqli, trim($_POST['jurusan']));
            $wa          = mysqli_real_escape_string($mysqli, trim($_POST['wa']));
            $paket       = mysqli_real_escape_string($mysqli, trim($_POST['paket']));
            $fs_jw       = mysqli_real_escape_string($mysqli, trim($_POST['fs_jw']));
            $fs_kk       = mysqli_real_escape_string($mysqli, trim($_POST['fs_kk']));
            $fkb         = mysqli_real_escape_string($mysqli, trim($_POST['fkb']));
            $fkk_jw      = mysqli_real_escape_string($mysqli, trim($_POST['fkk_jw']));
            $fkk_kk      = mysqli_real_escape_string($mysqli, trim($_POST['fkk_kk']));
            $fdt         = mysqli_real_escape_string($mysqli, trim($_POST['fdt']));
            $fdo_jw      = mysqli_real_escape_string($mysqli, trim($_POST['fdo_jw']));
            $fdo_kk      = mysqli_real_escape_string($mysqli, trim($_POST['fdo_kk']));
            $dll         = mysqli_real_escape_string($mysqli, trim($_POST['dll']));

            $jumlah = 3;
            $hasil = [];
            for ($i = 0; $i < $jumlah; $i++) {
                $R5Name = $_FILES['5R']['name'][$i];
                $R5Tmp = $_FILES['5R']['tmp_name'][$i];
                move_uploaded_file($R5Tmp, "../../images/edit/" . $R5Name);
                $hasil[] = $R5Name;
            }
            $R5All = implode(',',  $hasil);

            // $jumlah = count($_FILES['5R']['name']);

            $R10       = $_FILES['10R']['name'];
            $LokasiR10 = $_FILES['10R']['tmp_name'];

            $R16       = $_FILES['16R']['name'];
            $LokasiR16 = $_FILES['16R']['tmp_name'];

            move_uploaded_file($LokasiR10, "../../images/edit/" . $R10);
            move_uploaded_file($LokasiR16, "../../images/edit/" . $R16);

            $sql = "INSERT INTO tbl_konsumen_upload (   id_konsumen,
                                                    nama,
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
                                                    5r,
                                                    10r,
                                                    16r,
                                                    20r,
                                                    24r)
                                                    VALUES(
                                                        '$id_konsumen',
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
                                                        '$R5All',
                                                        '$R10',
                                                        '$R16',
                                                        '$R20',
                                                        '$R24')";

            $query = mysqli_query($mysqli, $sql) or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?page=wedding&alert=2");
            } else {
                echo "<script>
                alert('Gagal Simpan')
                </script>";
            }
        } elseif ($paket == "Diamond") {

            // ambil data hasil submit dari form
            $id_konsumen = mysqli_real_escape_string($mysqli, trim($_POST['id_konsumen']));
            $nama        = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $jurusan     = mysqli_real_escape_string($mysqli, trim($_POST['jurusan']));
            $wa          = mysqli_real_escape_string($mysqli, trim($_POST['wa']));
            $paket       = mysqli_real_escape_string($mysqli, trim($_POST['paket']));
            $fs_jw       = mysqli_real_escape_string($mysqli, trim($_POST['fs_jw']));
            $fs_kk       = mysqli_real_escape_string($mysqli, trim($_POST['fs_kk']));
            $fkb         = mysqli_real_escape_string($mysqli, trim($_POST['fkb']));
            $fkk_jw      = mysqli_real_escape_string($mysqli, trim($_POST['fkk_jw']));
            $fkk_kk      = mysqli_real_escape_string($mysqli, trim($_POST['fkk_kk']));
            $fdt         = mysqli_real_escape_string($mysqli, trim($_POST['fdt']));
            $fdo_jw      = mysqli_real_escape_string($mysqli, trim($_POST['fdo_jw']));
            $fdo_kk      = mysqli_real_escape_string($mysqli, trim($_POST['fdo_kk']));
            $dll         = mysqli_real_escape_string($mysqli, trim($_POST['dll']));

            $jumlah = 3;
            $hasil = [];
            for ($i = 0; $i < $jumlah; $i++) {
                $R5Name = $_FILES['5R']['name'][$i];
                $R5Tmp = $_FILES['5R']['tmp_name'][$i];
                move_uploaded_file($R5Tmp, "../../images/edit/" . $R5Name);
                $hasil[] = $R5Name;
            }

            $R5All = implode(',',  $hasil);

            // $jumlah = count($_FILES['5R']['name']);

            $R10       = $_FILES['10R']['name'];
            $LokasiR10 = $_FILES['10R']['tmp_name'];

            $R16       = $_FILES['16R']['name'];
            $LokasiR16 = $_FILES['16R']['tmp_name'];

            $R20       = $_FILES['20R']['name'];
            $LokasiR20 = $_FILES['20R']['tmp_name'];

            move_uploaded_file($LokasiR10, "../../images/edit/" . $R10);
            move_uploaded_file($LokasiR16, "../../images/edit/" . $R16);
            move_uploaded_file($LokasiR20, "../../images/edit/" . $R20);

            $sql = "INSERT INTO tbl_konsumen_upload (   id_konsumen,
                                                    nama,
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
                                                    5r,
                                                    10r,
                                                    16r,
                                                    20r,
                                                    24r)
                                                    VALUES(
                                                        '$id_konsumen',
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
                                                        '$R5All',
                                                        '$R10',
                                                        '$R16',
                                                        '$R20',
                                                        '$R24')";

            $query = mysqli_query($mysqli, $sql) or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?page=wedding&alert=2");
            } else {
                echo "<script>
                alert('Gagal Simpan')
                </script>";
            }
        } elseif ($paket == "Gold") {

            // ambil data hasil submit dari form
            $id_konsumen = mysqli_real_escape_string($mysqli, trim($_POST['id_konsumen']));
            $nama        = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $jurusan     = mysqli_real_escape_string($mysqli, trim($_POST['jurusan']));
            $wa          = mysqli_real_escape_string($mysqli, trim($_POST['wa']));
            $paket       = mysqli_real_escape_string($mysqli, trim($_POST['paket']));
            $fs_jw       = mysqli_real_escape_string($mysqli, trim($_POST['fs_jw']));
            $fs_kk       = mysqli_real_escape_string($mysqli, trim($_POST['fs_kk']));
            $fkb         = mysqli_real_escape_string($mysqli, trim($_POST['fkb']));
            $fkk_jw      = mysqli_real_escape_string($mysqli, trim($_POST['fkk_jw']));
            $fkk_kk      = mysqli_real_escape_string($mysqli, trim($_POST['fkk_kk']));
            $fdt         = mysqli_real_escape_string($mysqli, trim($_POST['fdt']));
            $fdo_jw      = mysqli_real_escape_string($mysqli, trim($_POST['fdo_jw']));
            $fdo_kk      = mysqli_real_escape_string($mysqli, trim($_POST['fdo_kk']));
            $dll         = mysqli_real_escape_string($mysqli, trim($_POST['dll']));

            $jumlah = 3;
            $hasil = [];
            for ($i = 0; $i < $jumlah; $i++) {
                $R5Name = $_FILES['5R']['name'][$i];
                $R5Tmp = $_FILES['5R']['tmp_name'][$i];
                // move_uploaded_file($R5Tmp, "../../images/edit/" . $R5Name);
                $hasil[] = $R5Name;
            }
            $R5All = implode(',',  $hasil);

            // $jumlah = count($_FILES['5R']['name']);

            $R10       = $_FILES['10R']['name'];
            $LokasiR10 = $_FILES['10R']['tmp_name'];

            $R16       = $_FILES['16R']['name'];
            $LokasiR16 = $_FILES['16R']['tmp_name'];

            $R20       = $_FILES['20R']['name'];
            $LokasiR20 = $_FILES['20R']['tmp_name'];

            $R24       = $_FILES['24R']['name'];
            $LokasiR24 = $_FILES['24R']['tmp_name'];

            move_uploaded_file($LokasiR10, "../../images/edit/" . $R10);
            move_uploaded_file($LokasiR16, "../../images/edit/" . $R16);
            move_uploaded_file($LokasiR20, "../../images/edit/" . $R20);
            move_uploaded_file($LokasiR24, "../../images/edit/" . $R24);

            $sql = "INSERT INTO tbl_konsumen_upload (   id_konsumen,
                                                    nama,
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
                                                    5r,
                                                    10r,
                                                    16r,
                                                    20r,
                                                    24r)
                                                    VALUES(
                                                        '$id_konsumen',
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
                                                        '$R5All',
                                                        '$R10',
                                                        '$R16',
                                                        '$R20',
                                                        '$R24')";

            $query = mysqli_query($mysqli, $sql) or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?page=wedding&alert=2");
            } else {
                echo "<script>
                alert('Gagal Simpan')
                </script>";
            }
        }





        // echo $ukuran_file = $_FILES['10R']['size'];

        // echo $tipe_file   = $_FILES['10R']['type'];

        // echo $tmp_file    = $_FILES['10R']['tmp_name'];

        // $jumlah = count($_FILES['5R']['name']);

        // for ($i = 0; $i < $jumlah; $i++) {
        //     $namaFoto   = $_FILES['5R']['name'][$i];
        //     $lokasiFoto = $_FILES['5R']['tmp_name'][$i];
        //     $simpanFoto = "../../images/edit/" . $namaFoto;


        //     move_uploaded_file($lokasiFoto, $path);
        // }


        //$tmp_file_satu         = $_FILES['fuploadd']['tmp_name'];	
        //$nama_file		     = $_FILES['fuploadd']['name'];    	


        // // tentuka extension yang diperbolehkan
        // $allowed_extensions = array('jpg', 'jpeg', 'png');
        // // Set path folder tempat menyimpan gambarnya
        // $path               = "../../images/edit/" . $nama_file;
        // // check extension
        // $file               = explode(".", $nama_file);
        // $extension          = array_pop($file);
        // if (in_array($extension, $allowed_extensions)) {
        //     // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
        //     if ($ukuran_file <= 100000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 100 MB
        //         // Jika ukuran file kurang dari sama dengan 100MB, lakukan :                    // Proses upload
        //         if (move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
        //             // Jika gambar berhasil diupload, Lakukan :                         // perintah query untuk menyimpan data ke tabel barang
        //             $sql = "INSERT INTO tbl_konsumen_upload (   nama,
        //                                                         jurusan,
        //                                                         wa,
        //                                                         paket,
        //                                                         fs_jw,
        //                                                         fs_kk,
        //                                                         fkb,
        //                                                         fkk_jw,
        //                                                         fkk_kk,
        //                                                         fdt,
        //                                                         fdo_jw,
        //                                                         fdo_kk,
        //                                                         dll,
        //                                                         5r,
        //                                                         10r,
        //                                                         16r,
        //                                                         20r,
        //                                                         24r)
        //                                                         VALUES(
        //                                                             '$nama',
        //                                                             '$jurusan',
        //                                                             '$wa',
        //                                                             '$paket',
        //                                                             '$fs_jw',
        //                                                             '$fs_kk',
        //                                                             '$fkb',
        //                                                             '$fkk_jw',
        //                                                             '$fkk_kk',
        //                                                             '$fdt',
        //                                                             '$fdo_jw',
        //                                                             '$fdo_kk',
        //                                                             '$R5',
        //                                                             '$R10',
        //                                                             '$R16',
        //                                                             '$R20',
        //                                                             '$R24')";

        //             $query = mysqli_query($mysqli, $sql) or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

        //             // cek query
        //             if ($query) {
        //                 // jika berhasil tampilkan pesan berhasil simpan data
        //                 header("location: ../../main.php?page=wedding&alert=2");
        //             }
        //         } else {
        //             // Jika gambar gagal diupload, tampilkan pesan gagal upload
        //             header("location: ../../main.php?page=wedding&alert=3");
        //         }
        //     } else {
        //         // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
        //         header("location: ../../main.php?page=wedding&alert=4");
        //     }
        // } else {
        //     // Jika tipe file yang diupload bukan JPG / JPEG / PNG, tampilkan pesan gagal upload
        //     header("location: ../../main.php?page=wedding&alert=5");
        // }
    }
}

<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])){
    echo "<script type='text/javascript'>alert('Anda harus login terlebih dahulu!');</script>
          <meta http-equiv='refresh' content='0; url=../../index.php'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
 
        if (isset($_POST['wedding'])) {
	// ambil data hasil submit dari form
	$nama       = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
	$jurusan 	= mysqli_real_escape_string($mysqli, trim($_POST['jurusan']));
	$wa      	= mysqli_real_escape_string($mysqli, trim($_POST['wa']));
	$paket      = mysqli_real_escape_string($mysqli, trim($_POST['paket']));
	$fs_jw      = mysqli_real_escape_string($mysqli, trim($_POST['fs_jw']));
	$fs_kk      = mysqli_real_escape_string($mysqli, trim($_POST['fs_kk']));
	$fkb     	 = mysqli_real_escape_string($mysqli, trim($_POST['fkb']));
	$fkk_jw      = mysqli_real_escape_string($mysqli, trim($_POST['fkk_jw']));
	$fkk_kk      = mysqli_real_escape_string($mysqli, trim($_POST['fkk_kk']));
	$fdt      	= mysqli_real_escape_string($mysqli, trim($_POST['fdt']));
	$fdo_jw      = mysqli_real_escape_string($mysqli, trim($_POST['fdo_jw']));
	$fdo_kk      = mysqli_real_escape_string($mysqli, trim($_POST['fdo_kk']));
	$dll     	 = mysqli_real_escape_string($mysqli, trim($_POST['dll']));
	  
            $nama_file          = $_FILES['fupload']['name'];    	
			//$nama_file		     = $_FILES['fuploadd']['name'];    	
            $ukuran_file        = $_FILES['fupload']['size'];		
            $tipe_file          = $_FILES['fupload']['type'];
            $tmp_file           = $_FILES['fupload']['tmp_name'];	
          //  $tmp_file_satu      = $_FILES['fuploadd']['tmp_name'];	

		
// tentuka extension yang diperbolehkan
            $allowed_extensions = array('jpg','jpeg','png');
// Set path folder tempat menyimpan gambarnya
            $path               = "../../images/edit/".$nama_file;
// check extension
            $file               = explode(".", $nama_file);
            $extension          = array_pop($file);
			if(in_array($extension, $allowed_extensions)) {
// Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
            if($ukuran_file <= 1000000)  { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :                    // Proses upload
            if(move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
                        // Jika gambar berhasil diupload, Lakukan :                         // perintah query untuk menyimpan data ke tabel barang
                  		$query = mysqli_query($mysqli, "INSERT INTO tbl_konsumen_upload(nama,jurusan,wa,paket,fs_jw,fs_kk,fkb,fkk_jw,fkk_kk,fdt,fdo_jw,fdo_kk,dll,gambar)
										VALUES('$nama','$jurusan','$wa','$paket','$fs_jw','$fs_kk','$fkb','$fkk_jw','$fkk_kk','$fdt','$fdo_jw','$fdo_kk','$dll','$nama_file')")	
										or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli)); 

                        // cek query
                        if ($query) 	{
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
		
?>
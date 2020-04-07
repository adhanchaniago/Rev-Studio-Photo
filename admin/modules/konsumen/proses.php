<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk ubah password
elseif ($_GET['act']=='update') {
	if (isset($_POST['simpan'])) {
		// ambil data hasil submit dari form
		$id_konsumen   = mysqli_real_escape_string($mysqli, trim($_POST['id_konsumen']));
		$nama_konsumen = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
		$alamat        = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
		$kabkota       = mysqli_real_escape_string($mysqli, trim($_POST['kabkota']));
		$provinsi      = mysqli_real_escape_string($mysqli, trim($_POST['provinsi']));
		$kode_pos      = mysqli_real_escape_string($mysqli, trim($_POST['kode_pos']));
		$telepon       = mysqli_real_escape_string($mysqli, trim($_POST['telepon']));
		$email         = mysqli_real_escape_string($mysqli, trim($_POST['email']));

		// maka jalankan perintah query untuk mengubah data pada tabel konsumen
		$query = mysqli_query($mysqli, "UPDATE tbl_konsumen SET nama_konsumen   = '$nama_konsumen',
	                                                            alamat   		= '$alamat',
	                                                            kota     		= '$kabkota',
	                                                            provinsi       	= '$provinsi',
	                                                            kode_pos        = '$kode_pos',
	                                                            telepon         = '$telepon',
	                                                            email           = '$email'
	                                                   WHERE    id_konsumen     = '$id_konsumen'")
	                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

        // cek query
     if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=konsumen&alert=1");
                    } 
	}	
	}
	
    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_konsumen = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel barang
            $query = mysqli_query($mysqli, "DELETE FROM tbl_konsumen WHERE id_konsumen='$id_konsumen'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
             header("location: ../../main.php?module=konsumen&alert=2");
            }
        }
    }
?>
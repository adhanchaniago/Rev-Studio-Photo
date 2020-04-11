<?php
$id = $_GET['id'];
$query = mysqli_query($mysqli, "DELETE FROM tbl_konsumen_upload WHERE id_upload = '$id'")
	or die('Ada kesalahan pada query tampil data konsumen: ' . mysqli_error($mysqli));

if ($query) {
	echo "
		<script>
		alert('Data berhasil di hapus');
		window.location='main.php?module=foto';
		</script>
		";
} else {
	echo "
	<script>
	alert('Data gagal di hapus');
	window.location='main.php?module=foto';
	</script>
	";
}

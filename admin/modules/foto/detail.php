<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i class="ace-icon fa fa-user"></i> Data Upload Foto Konsumen
		</h1>

	</div><!-- /.page-header -->

	<?php
	// fungsi untuk menampilkan pesan
	// jika alert = "" (kosong)
	// tampilkan pesan "" (kosong)
	if (empty($_GET['alert'])) {
	}
	// jika alert = 1
	// tampilkan pesan "data barang baru berhasil disimpan"
	elseif ($_GET['alert'] == 1) { ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>
			<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
			Data Baru Berhasil disimpan.
			<br>
		</div>
	<?php
	}
	// jika alert = 2
	// tampilkan pesan Sukses "data barang berhasil diubah"
	elseif ($_GET['alert'] == 2) { ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>
			<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
			Data Berhasil Di Hapus.
			<br>
		</div>
	<?php
	}
	// jika alert = 3
	// tampilkan pesan Sukses "barang berhasil dihapus"
	elseif ($_GET['alert'] == 3) { ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>
			<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
			data berhasil dihapus.
			<br>
		</div>
	<?php
	}
	// jika alert = 4
	// tampilkan pesan Upload Gagal "pastikan file yang diupload sudah benar"
	elseif ($_GET['alert'] == 4) { ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>
			<strong><i class="ace-icon fa fa-times-circle"></i> Upload Gagal! </strong><br>
			pastikan file yang diupload sudah benar.
			<br>
		</div>
	<?php
	}
	// jika alert = 5
	// tampilkan pesan Upload Gagal "pastikan ukuran foto tidak lebih dari 1MB"
	elseif ($_GET['alert'] == 5) { ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>
			<strong><i class="ace-icon fa fa-times-circle"></i> Upload Gagal! </strong><br>
			pastikan ukuran foto tidak lebih dari 1MB.
			<br>
		</div>
	<?php
	}
	// jika alert = 6
	// tampilkan pesan Upload Gagal "pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG"
	elseif ($_GET['alert'] == 6) { ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>
			<strong><i class="ace-icon fa fa-times-circle"></i> Upload Gagal! </strong><br>
			pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG.
			<br>
		</div>
	<?php
	}
	?>

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
					<div class="table-header">
						Data Upload Foto Konsumen
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<div class="table-responsive">
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th width="20px">No.</th>
										<th>Nama konsumen</th>
										<th>Paket</th>
										<th>R5</th>
										<th>R5</th>
										<th>R5</th>
										<th>R10</th>
										<th>R16</th>
										<th>R20</th>
										<th>R24</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$no = 1;
									$konsumen_yang_upload = $_GET['id'];
									// fungsi query untuk menampilkan data dari tabel konsumen
									$query = mysqli_query($mysqli, "SELECT * FROM tbl_konsumen_upload
																JOIN tbl_konsumen
																ON tbl_konsumen_upload.id_konsumen =tbl_konsumen.id_konsumen
																WHERE tbl_konsumen_upload.id_konsumen = '$konsumen_yang_upload '
																")
										or die('Ada kesalahan pada query tampil data konsumen: ' . mysqli_error($mysqli));

									while ($data = mysqli_fetch_assoc($query)) {
										$pecah5R = explode(',', $data['5r']);
									?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $data['nama_konsumen'] ?></td>
											<td><?php echo $data['paket'] ?></td>
											<?php
											foreach ($pecah5R as $pecah) {
											?>
												<td><img width="100px" src="../images/edit/<?php echo $pecah ?>" alt="No Img"></td>
											<?php } ?>
											<td><img width="100px" src="../images/edit/<?php echo $data['10r'] ?>" alt="No Img"></td>
											<td><img width="100px" src="../images/edit/<?php echo $data['16r'] ?>" alt="No Img"></td>
											<td><img width="100px" src="../images/edit/<?php echo $data['20r'] ?>" alt="No Img"></td>
											<td><img width="100px" src="../images/edit/<?php echo $data['24r'] ?>" alt="No Img"></td>
										</tr>
									<?php
										$no++;
									} ?>
								</tbody>
							</table>
						</div>

					</div>
				</div>
			</div><!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
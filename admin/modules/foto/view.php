<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i class="ace-icon fa fa-user"></i> Data Upload Foto Konsumen
			<a href="?module=konsumenadd">
				<button class="btn btn-primary pull-right">
					<i class="ace-icon fa fa-plus"></i> Tambah
				</button>
			</a>
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
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama dan Gelar</th>
									<th>Jurusan</th>
									<th>Telepon/Wa</th>
									<th>Paket</th>
									<th>FOTO SENDIRI ( Jubah Wisuda )</th>
									<th>FOTO KELUARGA KANDUNG ( Jubah Wisuda )</th>
									<th>FOTO DENGAN ORANG TUA ( Jubah Wisuda )</th>
									<th>FOTO SENDIRI ( Kebaya / Kemeja )</th>
									<th>FOTO KELUARGA KANDUNG ( Kebaya / Kemeja )</th>
									<th>FOTO DENGAN ORANG TUA ( Kebaya / Kemeja )</th>
									<th>FOTO KELUARGA BESAR</th>
									<th>FOTO DENGAN TEMAN - TEMAN</th>
									<th class="hidden-480">LAIN - LAIN</th>
									<th></th>
								</tr>
							</thead>

							<tbody>
								<?php
								$no = 1;
								// fungsi query untuk menampilkan data dari tabel konsumen
								$query = mysqli_query($mysqli, "SELECT * FROM tbl_konsumen_upload as d 
																INNER JOIN tbl_konsumen as a
																ON d.id_konsumen = a.id_konsumen
																INNER JOIN tbl_kabkota as b 
																INNER JOIN tbl_provinsi as c 
																ON a.kota=b.id_kabkota 
																AND a.provinsi=c.id_provinsi
																ORDER BY d.id_upload DESC")
									or die('Ada kesalahan pada query tampil data konsumen: ' . mysqli_error($mysqli));

								while ($data = mysqli_fetch_assoc($query)) {
									$tgl            = substr($data['tanggal_daftar'], 0, 10);
									$exp            = explode('-', $tgl);
									$tanggal_daftar = $exp[2] . "-" . $exp[1] . "-" . $exp[0];
									// var_dump($data);

									if ($data['fs_jw'] == !null) {
										$fs_jw = "Ya";
									}

									if (($data['fs_kk']) == !null) {
										$fs_kk = "Ya";
									}

									if (($data['fkb']) == !null) {
										$fkb = "Ya";
									}

									if (($data['fkk_jw']) == !null) {
										$fkk_jw = "Ya";
									}

									if (($data['fkk_kk']) == !null) {
										$fkk_kk = "Ya";
									}

									if (($data['fdt']) == !null) {
										$fdt = "Ya";
									}

									if (($data['fdo_jw']) == !null) {
										$fdo_jw = "Ya";
									}

									if (($data['fdo_kk']) == !null) {
										$fdo_kk = "Ya";
									}

									if (($data['dll']) == !null) {
										$dll = "Ya";
									}
								?>
									<tr>
										<td width="30" class="center"><?php echo $no; ?></td>
										<td width="180"><?php echo $data['nama']; ?></td>
										<td width="180"><?php echo $data['jurusan']; ?></td>
										<td width="60" align="center"> <a href="https://api.whatsapp.com/send?phone=<?php echo $data['telepon']; ?>/" target="_blank"><?php echo $data['telepon']; ?></a></td>
										<td width="60"><?php echo $data['paket']; ?></td>
										<td><?php echo $data['fs_jw'] == null ? 'Tidak' : 'Ya' ?></td>
										<td><?php echo $data['fs_kk'] == null ? 'Tidak' : 'Ya' ?></td>
										<td><?php echo $data['fkb'] == null ? 'Tidak' : 'Ya' ?></td>
										<td><?php echo $data['fkk_jw'] == null ? 'Tidak' : 'Ya' ?></td>
										<td><?php echo $data['fkk_kk'] == null ? 'Tidak' : 'Ya' ?></td>
										<td><?php echo $data['fdt'] == null ? 'Tidak' : 'Ya' ?></td>
										<td><?php echo $data['fdo_jw'] == null ? 'Tidak' : 'Ya' ?></td>
										<td><?php echo $data['fdo_kk'] == null ? 'Tidak' : 'Ya' ?></td>
										<td><?php echo $data['dll'] == null ? 'Tidak' : 'Ya' ?></td>
										<td width="60" class="center">
											<div class="action-buttons">
												<a data-rel="tooltip" data-placement="top" title="Lihat Foto" style="margin-right:5px" class="blue tooltip-info" href="?module=detail&id=<?php echo $data['id_konsumen']; ?>">
													<i class="ace-icon fa fa-search bigger-130"></i>
												</a>
											</div>
										</td>
										</td>
									</tr>
								<?php
									$no++;
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
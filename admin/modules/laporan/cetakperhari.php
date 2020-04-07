<?php include "../../../config/database.php" ;
include "../../tglindo.php" ;
$tgl = date('d M Y');
?>
<body onLoad="javascript:print()"> 
	<style type="text/css">
	.style3 {font-size: 12px}
	.style5 {font-size: 24px}
</style>

<div class="panel-heading">
	<table width="100%">
		<tr>
			<td><div align="center">
				<div align="center">
					Shafa Studio<br>Laporan Data Orderan<br><hr> Tanggal : <?= date('d F Y',strtotime($_POST['hari'])) ?></div>
				</td>
			</tr>
		</table>
	</div>

	<table id='theList' border=1 width='100%' class='table table-bordered table-striped' cellspacing="0">
		<tr><th >No.</th>
			<th>Id Order</th>
			<th>Nama Customer</th>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Total Harga</th>
		</tr>
		<?php
		$sql = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi, tbl_transaksi_detail, tbl_barang, tbl_konsumen WHERE tbl_transaksi.id_transaksi = tbl_transaksi_detail.id_transaksi AND tbl_transaksi_detail.id_barang = tbl_barang.id_barang AND tbl_konsumen.id_konsumen=tbl_transaksi.id_konsumen AND tbl_transaksi.tanggal_transaksi LIKE '$_POST[hari]%' order by tbl_transaksi.id_transaksi asc");
		$no=1;
		$total=0;
		while($r = mysqli_fetch_array($sql)){ ?>
			<tr>
				<td class='td' align='center'><span class="style3"><?php echo $no; ?></span></td>
				<td align="center"><?php echo $r['id_transaksi']; ?></td>
				<td><?php echo $r['nama_konsumen']; ?></td>
				<td><?php echo $r['nama_barang']; ?></td>
				<td align="center"><?php echo $r['jumlah_beli']; ?></td>
				<td align="right">Rp.<?php echo number_format($r['harga'], 2, ".", ","); ?></td>
				<td align="right">Rp.<?php echo number_format($r['total_bayar'], 2, ".", "."); ?></td>
			</tr>
			<?php
			$no++;
			$total=$total+$r['total_bayar'];
		}
		?>
		<tr>
			<td colspan="6">
				<div align="center">Total Keseluruhan </div></td>
				<td align="right">Rp.<?php echo number_format($total, 2, ".", ","); ?> </td>
			</tr>
		</table>
		<br>


		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
			<tr>
				<td width="63%" bgcolor="#FFFFFF">
					<p align="center"><br/>
					</td>
					<td width="37%" bgcolor="#FFFFFF"><div align="center"> <?php $tgl = date('d M Y');
					echo " $tgl";?><br/>
					Pemilik
					<br/><br/>
					<br/><br/>
					(...............................)
					<br/>
				</div>
			</td>
		</tr></table> 


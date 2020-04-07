<?php include "../../../config/database.php" ;
include "../../tglindo.php" ;
$tgl = date('M Y');
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
					RC Pesta<br>Laporan Data Penjualan<br><hr>Bulan : <?= $_POST['bulan'] ?></div>
				</td>
			</tr>
		</table>
	</div>

	<table id='theList' border=1 width='100%' class='table table-bordered table-striped' cellspacing="0">
		<tr><th >No.</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Total Harga</th>
		</tr>
		<?php
		//$sql = mysqli_query($mysqli,"SELECT *, DATE_FORMAT(tbl_transaksi.tanggal_transaksi,'%d/%m/%Y') AS niceDate FROM tbl_transaksi, tbl_transaksi_detail, tbl_barang, tbl_konsumen WHERE tbl_transaksi.id_transaksi = tbl_transaksi_detail.id_transaksi AND tbl_transaksi_detail.id_barang = tbl_barang.id_barang AND tbl_konsumen.id_konsumen=tbl_transaksi.id_konsumen AND tbl_transaksi.tanggal_transaksi LIKE '$_POST[bulan]%' group by DAY(tbl_transaksi.tanggal_transaksi)	 order by tbl_transaksi.id_transaksi asc ");
		$sql = mysqli_query($mysqli,"SELECT DATE_FORMAT(tbl_transaksi.tanggal_transaksi,'%d/%m/%Y') AS niceDate, COUNT(tbl_transaksi_detail.jumlah_beli) AS Jumlah, SUM(tbl_transaksi.total_bayar) As Total FROM tbl_transaksi, tbl_transaksi_detail WHERE tbl_transaksi.id_transaksi = tbl_transaksi_detail.id_transaksi AND tbl_transaksi.tanggal_transaksi LIKE '$_POST[bulan]%' group by date(tbl_transaksi.tanggal_transaksi)	 order by tbl_transaksi.id_transaksi asc ");
		$no=1;
		$total=0;
		while($r = mysqli_fetch_array($sql)){ ?>
			<tr>
				<td class='td' align='center'><span class="style3"><?php echo $no; ?></span></td>
				<td align="center"><?php echo $r['niceDate']; ?></td>
				<td align="center"><?php echo $r['Jumlah']; ?></td>
				<td align="right">Rp.<?php echo number_format($r['Total'], 2, ".", ","); ?></td>
			</tr>
			<?php
			$no++;
			$total=$total+$r['Total'];
		}
		?>
		<tr>
			<td colspan="3">
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
					<td width="37%" bgcolor="#FFFFFF"><div align="center"> <?php $tgl = date('d F Y');
					echo " $tgl";?><br/>
					Pemilik
					<br/><br/>
					<br/><br/>
					(...............................)
					<br/>
				</div>
			</td>
		</tr>
	</table> 

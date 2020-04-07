<?php include "../../../config/database.php" ;
include "../../tglindo.php" ;
$tgl = date('Y');
?>
<body onLoad="javascript:print()"> 
<style type="text/css">
<!--
.style3 {font-size: 12px}
-->
.style5 {font-size: 24px}
</style>

<div class="panel-heading">
                            <table width="100%">
							<tr>
							<td><div align="center">
							<div align="center">
						       RC Pesta<br>Laporan Data Penjualan<br><hr>Tahun : <?php echo " $_POST[tahun]";?></div>
							 </td>
							</tr>
							</table>
</div>

<table id='theList' border=1 width='60%' class='table table-bordered table-striped' cellspacing="0" align="center">
				<tr><th >No.</th>
				<th>Bulan</th>
				<th>Jumlah</th>
				<th>Total Bayar</th>
				
</tr>
<?php
$sql = mysqli_query($mysqli, "SELECT tbl_transaksi.tanggal_transaksi, tbl_transaksi.total_bayar, SUM(tbl_transaksi.total_bayar) as sumtot , SUM(tbl_transaksi_detail.jumlah_beli) as jumlah FROM tbl_transaksi,tbl_transaksi_detail WHERE tbl_transaksi.id_transaksi=tbl_transaksi_detail.id_transaksi and tbl_transaksi.tanggal_transaksi LIKE '$_POST[tahun]%' group by month(tbl_transaksi.tanggal_transaksi)");
$no=1;
$total = 0;
while($r = mysqli_fetch_array($sql)){
	$tanggal = $r['tanggal_transaksi'];
?>
<tr>
					<td class='td' align='center'><span class="style3"><?php echo $no; ?></span></td>

                    <td align="center"><?php $tgl = strtotime($tanggal); // konversi tgl jadi satuan detik
						$namabulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"); // buat bulan dalam indonesia
						$bulan = date('n', $tgl)-1; // ambil bulan didatabase dgn format angka 
						//echo $bulan; 
						echo $namabulan[$bulan]; ?></td>
						<td class='td' align='center'><span class="style3"><?php echo $r['jumlah']; ?></span></td>

					<td align="right">Rp.    <?php echo number_format($r['sumtot'], 2, ".", "."); ?></td>
					
</tr>
<?php
$no++;
$total=$total+$r['sumtot'];
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

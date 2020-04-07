<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-md-3">
         
        <!-- panggil file "sidebar-kanan.php" untuk menampilkan menu -->
        <?php include "sidebar-kiri-home.php" ?>

    </div>

    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-header">
                    Paket Terbaru
                </h4>

                <div class="row">
                <?php
                // fungsi query untuk menampilkan data dari tabel barang
                $query = mysqli_query($mysqli, "SELECT * FROM tbl_barang ORDER BY id_barang DESC LIMIT 6")
                                                or die('Ada kesalahan pada query tampil data barang baru : '.mysqli_error($mysqli));

                while($data = mysqli_fetch_assoc($query)) {
                ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="?page=detail&produk=<?php echo $data['id_barang']; ?>">
                                <img style="height:200px" src="images/barang/<?php echo $data['gambar']; ?>" alt="Produk Terlaris">
                            </a>
                            <div style="border-top:1px solid #eee;margin-top:10px" class="caption">
                                <h4 style="font-size:17px"><?php echo $data['nama_barang']; ?></h4>
                                <p>Rp. <?php echo format_rupiah_nol($data['harga']); ?></p>
                                <p>
                                <?php  
                                if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])) { ?>
                                    <a style="width:80px" href="javascript:void(0);" onclick="alert('Anda harus login terlebih dahulu!');" class="btn btn-primary" role="button">
                                        <i class="fa fa-shopping-cart"></i> Pesan
                                    </a> 
                                <?php
                                }
                                // jika user sudah login, maka jalankan perintah untuk ubah password
                                else { ?>
                                    <a style="width:80px" href="?page=beli&produk=<?php echo $data['id_barang']; ?>" class="btn btn-primary" role="button">
                                        <i class="fa fa-shopping-cart"></i> Pesan
                                    </a> 
                                <?php  
                                }
                                ?>
                                    <a style="width:80px" href="?page=detail&produk=<?php echo $data['id_barang']; ?>" class="btn btn-default" role="button"><i class="fa fa-eye"></i> Detail</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php  
                }
                ?>
                </div>

                <a class="btn btn-default btn-block" href="?page=terbaru">Tampilkan Lainnya</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-header">
                    Paket Terlaris
                </h4>

                <div class="row">
                <?php
                // fungsi query untuk menampilkan data dari tabel barang
                $query = mysqli_query($mysqli, "SELECT * FROM tbl_barang ORDER BY terjual DESC LIMIT 6")
                                                or die('Ada kesalahan pada query tampil data barang baru : '.mysqli_error($mysqli));

                while($data = mysqli_fetch_assoc($query)) {
                ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="?page=detail&produk=<?php echo $data['id_barang']; ?>">
                                <img style="height:180px" src="images/barang/<?php echo $data['gambar']; ?>" alt="Produk Terlaris">
                            </a>
                            <div style="border-top:1px solid #eee;margin-top:10px" class="caption">
                                <h4 style="font-size:17px"><?php echo $data['nama_barang']; ?></h4>
                                <p>Rp. <?php echo format_rupiah_nol($data['harga']); ?></p>
                                <p>
                                <?php  
                                if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])) { ?>
                                    <a style="width:80px" href="javascript:void(0);" onclick="alert('Anda harus login terlebih dahulu!');" class="btn btn-primary" role="button">
                                        <i class="fa fa-shopping-cart"></i> Pesan
                                    </a> 
                                <?php
                                }
                                // jika user sudah login, maka jalankan perintah untuk ubah password
                                else { ?>
                                    <a style="width:00px" href="?page=beli&produk=<?php echo $data['id_barang']; ?>" class="btn btn-primary" role="button">
                                        <i class="fa fa-shopping-cart"></i> Pesan
                                    </a> 
                                <?php  
                                }
                                ?>
                                    <a style="width:80px" href="?page=detail&produk=<?php echo $data['id_barang']; ?>" class="btn btn-default" role="button"><i class="fa fa-eye"></i> Detail</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php  
                }
                ?>
                </div>
                    
                <a class="btn btn-default btn-block" href="?page=terlaris">Tampilkan Lainnya</a>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

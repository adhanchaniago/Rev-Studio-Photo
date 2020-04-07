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
                    Detail Paket
                </h4>
                
                <?php  
                $query = mysqli_query($mysqli, "SELECT * FROM tbl_barang WHERE id_barang='$_GET[produk]'")
                                            or die('Ada kesalahan pada query tampil data barang : '.mysqli_error($mysqli));

                $data = mysqli_fetch_assoc($query);
                    $deskripsi = $data['deskripsi'];
                ?>
                <div style="text-align:justify;margin-top:35px;margin-bottom:35px;" class="row">
                    <div class="col-md-6">
                        <img style="border:1px solid #eee;border-radius:2px" class="img-responsive img-hover" src="images/barang/<?php echo $data['gambar']; ?>" width="400" alt="">
                    </div>
                    <div class="col-md-6">
                        <h3><?php echo $data['nama_barang']; ?></h3>
                        <?php echo $deskripsi; ?>
                        <br>
                        <p><strong>Price : Rp. <?php echo format_rupiah_nol($data['harga']); ?></strong></p>
      
                        <br>
                        
                        <?php  
                        if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])) { ?>
                            <a style="width:100px" href="javascript:void(0);" onclick="alert('Anda harus login terlebih dahulu!');" class="btn btn-primary" role="button">
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
                    </div>
                </div>
            </div>
        </div>

        <hr>
        
        <h4>Produk Lainnya</h4>

        <hr>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                <?php
                // fungsi query untuk menampilkan data dari tabel barang
                $query = mysqli_query($mysqli, "SELECT * FROM tbl_barang ORDER BY RAND() ASC LIMIT 3")
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
            </div>
        </div>

        <hr>
        
        <h4><i class="fa fa-comments"></i> Komentar</h4>

        <hr>

        <!-- Komentar -->
        <div class="row">
            <div class="col-md-12">
            <?php
            // fungsi query untuk menampilkan data dari tabel diskusi
            $query = mysqli_query($mysqli, "SELECT * FROM tbl_komentar as a INNER JOIN tbl_konsumen as b 
                                            ON a.id_konsumen=b.id_konsumen
                                            WHERE a.id_barang='$_GET[produk]' AND a.balas='0' ORDER BY a.id_komentar ASC")
                                            or die('Ada kesalahan pada query tampil data komentar: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
                $tgl     = substr($data['tanggal'],0,10);
                $exp     = explode('-',$tgl);
                $tanggal = $exp[2]."-".$exp[1]."-".$exp[0];
            ?>
                <div class="media">
                    <div class="media-left">
                        <h1 style="border:1px solid #ddd;border-radius:100%;padding:11px 15px;" class="media-heading"><i class="fa fa-user"></i></h1>
                        <small><?php echo $tanggal; ?></small>
                    </div>

                    <div class="media-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4 class="media-heading"><?php echo $data['nama_konsumen']; ?> <small>(<?php echo $data['email']; ?>)</small></h4>
                                <p><?php echo $data['komentar']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php  
                // fungsi query untuk menampilkan data dari tabel diskusi
                $query2 = mysqli_query($mysqli, "SELECT * FROM tbl_komentar as a INNER JOIN tbl_konsumen as b 
                                                ON a.id_konsumen=b.id_konsumen 
                                                WHERE a.id_barang='$_GET[produk]' AND a.balas='$data[id_komentar]' ORDER BY a.id_komentar ASC")
                                                or die('Ada kesalahan pada query tampil data komentar: '.mysqli_error($mysqli));
                $row = mysqli_num_rows($query2);
                if ($row>0) {
                    $data2 = mysqli_fetch_assoc($query2);

                    $tgl2     = substr($data2['tanggal'],0,10);
                    $exp      = explode('-',$tgl2);
                    $tanggal2 = $exp[2]."-".$exp[1]."-".$exp[0];

                    $nama_konsumen = $data2['nama_konsumen'];
                    $email         = $data2['email'];
                    $komentar      = $data2['komentar'];
                ?>
                    <div style="margin-left: 50px" class="media">
                        <div class="media-left">
                            <h1 style="border:1px solid #ddd;border-radius:100%;padding:11px 15px;" class="media-heading"><i class="fa fa-user"></i></h1>
                            <small><?php echo $tanggal2; ?></small>
                        </div>

                        <div class="media-body">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h4 class="media-heading"><?php echo $nama_konsumen; ?> <small>(<?php echo $email; ?>)</small></h4>
                                    <p><?php echo $komentar; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } 
            ?>
            </div>
        </div>
        <!-- /.row -->
        <hr>

        <h4><i class="fa fa-edit"></i> Berikan Komentar</h4>
        
        <hr>
        <!-- Form Komentar -->
        <div class="row">
            <div class="col-md-8">
                <form action="pages/produk/submit.php?act=insert" method="POST">

                    <input type="hidden" name="id_barang" value="<?php echo $_GET['produk']; ?>" >
                    <input type="hidden" name="id_konsumen" value="<?php echo $_SESSION['id_konsumen']; ?>" >

                    <div class="form-group">
                        <textarea class="form-control" name="komentar" rows="5" placeholder="Komentar" required></textarea>
                    </div>
                <?php  
                if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])) { ?>
                    <a style="width:100px" href="javascript:void(0);" onclick="alert('Anda harus login terlebih dahulu!');" class="btn btn-primary" role="button">
                        Submit
                    </a> 
                <?php
                }
                // jika user sudah login, maka jalankan perintah untuk ubah password
                else { ?>
                    <input style="width:100px" type="submit" class="btn btn-primary" name="submit" value="Submit" />
                <?php  
                }
                ?>
                    
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
<!-- /.row -->

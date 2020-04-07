    <div style="margin-top:45px" class="panel panel-default">
        <div class="panel-body">
            <p style="margin-bottom:5px;font-size:17px;border-bottom:2px solid #eee;padding-bottom:5px">Kategori Paket</p>

        <?php  
        $query = mysqli_query($mysqli, "SELECT * FROM tbl_kategori ORDER BY id_kategori DESC")
                            or die('Ada kesalahan pada query tampil data kategori : '.mysqli_error($mysqli));

        while($data = mysqli_fetch_assoc($query)) {
        ?>
            <div class="media">
                <div class="media-body">
                    <i class="fa fa-angle-double-right"></i>
                    <a class="media-heading" href="?page=kategori&kategori=<?php echo $data['id_kategori']; ?>"><?php echo $data['nama_kategori']; ?></a>
                </div>
            </div>
            <div style="border-bottom:1px dotted #eee;padding-bottom:5px"></div>
        <?php
        }
        ?>
        </div>
    </div>

    <div style="margin-top:25px" class="panel panel-default">
        <div class="panel-body">
            <p style="margin-bottom:5px;font-size:17px;border-bottom:2px solid #eee;padding-bottom:5px">Koleksi Kami</p>
        
        <?php
        // fungsi query untuk menampilkan data dari tabel barang
        $query = mysqli_query($mysqli, "SELECT * FROM tbl_barang ORDER BY RAND() DESC LIMIT 7")
                                        or die('Ada kesalahan pada query tampil data barang : '.mysqli_error($mysqli));

        while($data = mysqli_fetch_assoc($query)) {
        ?>
            <div class="media">
                <div class="media-left">
                    <a href="?page=detail&produk=<?php echo $data['id_barang']; ?>">
                        <img style="margin-top: 5px" class="media-object" src="images/barang/<?php echo $data['gambar']; ?>" width="100" alt="Warta Terbaru">
                    </a>
                </div>
                <div class="media-body">
                    <a class="media-heading" href="?page=detail&produk=<?php echo $data['id_barang']; ?>"><?php echo $data['nama_barang']; ?></a>
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
                    </p>
                </div>
            </div>
            <div style="border-bottom:1px dotted #eee;padding-bottom:15px"></div>
        <?php
        }
        ?>
        </div>
    </div>
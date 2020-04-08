<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                    <i style="margin-right:6px" class="fa fa-upload"></i>
                    Upload Foto Yang Akan Diedit Berdasarkan Paket Yang Anda Pilih
                </h3>
                <ol class="breadcrumb">
                    <li><a href="?page=home">Beranda</a>
                    </li>
                    <li class="active">Upload Photo Yang Akan Diedit</li>
                </ol>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-12">
                <?php
                // fungsi untuk menampilkan pesan
                // jika alert = "" (kosong)
                // tampilkan pesan "" (kosong) 
                if (empty($_GET['alert'])) {
                    echo "";
                }
                // jika alert = 1
                // tampilkan pesan Gagal "email sudah terdaftar"
                elseif ($_GET['alert'] == 1) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><i class="glyphicon glyphicon-alert"></i> Gagal!</strong> email sudah terdaftar.
                    </div>
                <?php
                }
                // jika alert = 2
                // tampilkan pesan Sukses "pendaftaran Anda berhasil, silahkan login melalui menu Login"
                elseif ($_GET['alert'] == 2) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><i class="glyphicon glyphicon-ok-circle"></i> Sukses!</strong> Foto Anda berhasil Di Upload, silahkan hubungi admin.
                    </div>
                <?php
                }

                // jika alert = 4
                // tampilkan pesan Upload Gagal "pastikan file yang diupload sudah benar"
                elseif ($_GET['alert'] == 3) { ?>
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
                elseif ($_GET['alert'] == 4) { ?>
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
                elseif ($_GET['alert'] == 5) { ?>
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

                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- tampilan form hubungi kami -->
                        <form class="form-horizontal" role="form" method="POST" action="pages/wedding/proses.php" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama dan Gelar</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nama" autocomplete="off" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyz., ',this)" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Juruan Kuliah</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="jurusan" autocomplete="off" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyz., ',this)" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nomor WA</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="wa" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Paket Yang Diambil</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="paket" autocomplete="off" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyz., ',this)" required>
                                </div>
                            </div>




                            <div class="form-group">
                                <label class="col-sm-10 control-label"><i>"Centang Komposisi (Momen) Dibawah dengan Sesuai Paket Yang Dipilih (Shapire 2, Emerald 5, Diamond 6, Gold 7)"</i></label>
                            </div>

                            <div class="col-sm-4">
                                <input type="checkbox" name="fs_jw" value="FOTO SENDIRI ( Jubah Wisuda )" /> FOTO SENDIRI ( Jubah Wisuda )</p>
                            </div>

                            <div class="col-sm-4">
                                <input type="checkbox" name="fs_kk" value="FOTO SENDIRI ( Kebaya / Kemeja )" /> FOTO SENDIRI ( Kebaya / Kemeja )</p>
                            </div>

                            <div class="col-sm-4">
                                <input type="checkbox" name="fkb" value="FOTO KELUARGA BESAR" /> FOTO KELUARGA BESAR</p>
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" name="fkk_jw" value="FOTO KELUARGA KANDUNG ( Jubah Wisuda )" /> FOTO KELUARGA KANDUNG ( Jubah Wisuda )</p>
                            </div>

                            <div class="col-sm-4">
                                <input type="checkbox" name="fkk_kk" value="FOTO KELUARGA KANDUNG ( Kebaya / Kemeja )" /> FOTO KELUARGA KANDUNG ( Kebaya / Kemeja )</p>
                            </div>

                            <div class="col-sm-4">
                                <input type="checkbox" name="fdt" value="FOTO DENGAN TEMAN - TEMAN" /> FOTO DENGAN TEMAN - TEMAN</p>
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" name="fdo_jw" value="FOTO DENGAN ORANG TUA ( Jubah Wisuda )" /> FOTO DENGAN ORANG TUA ( Jubah Wisuda )</p>
                            </div>

                            <div class="col-sm-4">
                                <input type="checkbox" name="fdo_kk" value="FOTO DENGAN ORANG TUA ( Kebaya / Kemeja )" /> FOTO DENGAN ORANG TUA ( Kebaya / Kemeja )</p>
                            </div>

                            <div class="col-sm-4">
                                <input type="checkbox" name="dll" value="LAIN - LAIN" /> LAIN - LAIN</p>
                            </div>


                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>

                            <div class="form-group">
                                <label class="col-sm-10 control-label"><i>"Foto Pilihan : Isi pilihan dibawah ini dengan file foto pilihan anda sesuai dengan paket yang anda pilih"</i></label>
                            </div>


                            <div>
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover" align="center">
                                    <thead>
                                        <tr>

                                            <th></th>
                                            <th>Shapire</th>
                                            <th>Emerald</th>
                                            <th>Diamond</th>
                                            <th>Gold</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td>5R (3bh)+Album</td>
                                            <td></td>
                                            <td> <input type="file" id="gambar" name="fupload" />
                                            <td><input type="file" id="gambar_diamon" name="fuploadd" />
                                            <td><input type="file" name="gambar" />
                                        </tr>

                                        <tr>
                                            <td>10 R+</td>
                                            <td><input type="file" name="gambar" /></td>
                                            <td><input type="file" name="gambar" /></td>
                                            <td><input type="file" name="gambar" /></td>
                                            <td><input type="file" name="gambar" /></td>

                                        </tr>

                                        <td>16 R+</td>
                                        <td><input type="file" name="gambar" /></td>
                                        <td><input type="file" name="gambar" /></td>
                                        <td><input type="file" name="gambar" /></td>
                                        <td><input type="file" name="gambar" /></td>


                                        </tr>

                                        <td width="150">20 R+</td>
                                        <td></td>
                                        <td></td>
                                        <td><input type="file" name="gambar" /></td>
                                        <td><input type="file" name="gambar" /></td>
                                        </tr>

                                        <td width="150">24 R+</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><input type="file" name="gambar" /></td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input style="width:150px" type="submit" class="btn btn-primary btn-lg btn-submit" name="wedding" value="UPLOAD">
                                    </div>
                                </div>

                            </div>
                    </div>

                    <hr />

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.row -->
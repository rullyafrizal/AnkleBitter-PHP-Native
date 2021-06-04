<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-plus"></i> Tambah Produk</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?pages=profile">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?pages=produk">Data Produk</a></li>
                    <li class="breadcrumb-item active">Tambah Produk</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Produk</h3>
            <div class="card-tools">
                <a href="index.php?pages=produk" class="btn btn-sm btn-warning float-right">
                    <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        </br></br>
        <div class="col-sm-10">
            <?php if ((!empty($_GET['notif'])) && (!empty($_GET['jenis']))) { ?>
                <?php if ($_GET['notif'] == "tambahkosong") { ?>
                    <div class="alert alert-danger" role="alert">Maaf data
                        <?= $_GET['jenis']; ?> wajib di isi
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <form class="form-horizontal" action="index.php?pages=konfirmasitambahproduk" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <label for="foto" class="col-sm-3 col-form-label">Gambar Produk</label>
                    <div class="col-sm-7">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="gambar" id="customFile">
                            <label class="custom-file-label" for="customFile">Pilih Gambar Produk</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="title" id="title" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Produk</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nama" id="nama" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">
                        Deskripsi
                    </label>
                    <div class="col-sm-7">
                        <textarea name="deskripsi" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;"></textarea>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="harga" class="col-sm-3 col-form-label">Harga Produk</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" name="harga" id="harga" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok" class="col-sm-3 col-form-label">Stok Produk</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" name="stok" id="stok" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kategori" class="col-sm-3 col-form-label">Kategori Produk</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="kategori" name="kategori_produk">
                            <option value="">- Pilih Kategori -</option>
                            <?php
                            $sql_k = "SELECT `id_kategori_produk`,`kategori` FROM `kategori_produk` ORDER BY `id_kategori_produk`";
                            $query_k = mysqli_query($koneksi, $sql_k);
                            while ($data_k = mysqli_fetch_row($query_k)) {
                                $id_kat = $data_k[0];
                                $kat = $data_k[1];
                            ?>
                                <option value="<?= $id_kat; ?>"><?= $kat; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="brand" class="col-sm-3 col-form-label">Brand Produk</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="brand" name="brand">
                            <option value="">- Pilih Brand -</option>
                            <?php
                            $sql_t = "SELECT `id_brand_produk`,`brand` FROM `brand_produk` ORDER BY `brand`";
                            $query_t = mysqli_query($koneksi, $sql_t);
                            while ($data_t = mysqli_fetch_row($query_t)) {
                                $id_brand = $data_t[0];
                                $brand = $data_t[1];
                            ?>
                                <option value="<?php echo $id_brand; ?>"><?php echo $brand; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


            </div>
    </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Tambah Produk</button>
        </div>
    </div>
    <!-- /.card-footer -->
    </form>
    </div>
    <!-- /.card -->

</section>

</html>
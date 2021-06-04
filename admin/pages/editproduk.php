<?php
if (isset($_GET['data'])) {
  $id_produk = $_GET['data'];
  $_SESSION['id_produk'] = $id_produk;
  $sql_a = "SELECT `p`.`title`, `p`.`nama`, `p`.`deskripsi`, `p`.`harga`, `p`.`stok`,
  `p`.`gambar`, `p`.`created_at`, `p`.`updated_at`, `k`.`id_kategori_produk`, `k`.`kategori`,
  `b`.`id_brand_produk`, `b`.`brand`, `a`.`nama` FROM `produk` `p`
  INNER JOIN `kategori_produk` `k` ON `p`.`id_kategori_produk` = `k`.`id_kategori_produk` 
  INNER JOIN `brand_produk` `b` ON `p`.`id_brand_produk` = `b`.`id_brand_produk`
  INNER JOIN `user` `a` ON `p`.`user_id` = `a`.`id_user` 
  WHERE `id_produk` = '$id_produk'";
  // $sql_a = "SELECT `title`, `nama`, `deskripsi`,
  // `harga`, `stok`, `gambar`, `created_at`, `updated_at`, `id_kategori_produk`, `id_brand_produk`
  // FROM `produk` WHERE `id_produk` = '$id_produk'";
  $query_a = mysqli_query($koneksi, $sql_a);
  while ($data_a = mysqli_fetch_row($query_a)) {
    $title = $data_a[0];
    $nama = $data_a[1];
    $deskripsi = $data_a[2];
    $harga = $data_a[3];
    $stok = $data_a[4];
    $gambar = $data_a[5];
    $masuk = $data_a[6];
    $update = $data_a[7];
    $id_kategori_produk= $data_a[8];
    $id_brand_produk = $data_a[10];
  }

}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-edit"></i>Edit Produk</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?pages=profile">Home</a></li>
          <li class="breadcrumb-item"><a href="index.php?pages=produk">Edit Data Produk</a></li>
          <li class="breadcrumb-item active">Edit Produk</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Produk</h3>
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
        <?php if ($_GET['notif'] == "editkosong") { ?>
          <div class="alert alert-danger" role="alert">Maaf data
            <?= $_GET['jenis'] . " produk"; ?> wajib di isi</div>
        <?php } ?>
      <?php } ?>
    </div>
    <form class="form-horizontal" action="index.php?pages=konfirmasieditproduk" method="post" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group row">
          <label for="foto" class="col-sm-3 col-form-label">Gambar Produk</label>
          <div class="col-sm-7">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="gambar" id="customFile">
              <label class="custom-file-label" for="customFile"></label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="Title" class="col-sm-3 col-form-label">Title</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="title" id="Title" value="<?= $title; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama Produk</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="nama" id="nama" value="<?= $nama; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Deskripsi</label>
          <div class="col-sm-7">
            <textarea class="textarea" name="deskripsi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;"><?php echo $deskripsi; ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="Harga" class="col-sm-3 col-form-label">Harga Produk</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="harga" id="Harga" value="<?= $harga; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="Stok" class="col-sm-3 col-form-label">Stok Produk</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="stok" id="Stok" value="<?= $stok; ?>">
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
                <!-- <option value="<?= $id_kat; ?>"><?= $kat; ?></option> -->
                <option value="<?= $id_kat; ?>" <?php if ($id_kat == $id_kategori_produk) { ?> selected <?php } ?>><?= $kat; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        
        <div class="form-group row">
          <label for="Brand" class="col-sm-3 col-form-label">Brand Produk</label>
          <div class="col-sm-7">
            <select class="form-control" id="Brand" name="brand">
              <option value="">- Pilih Brand -</option>
              <?php
              $sql_t = "SELECT `id_brand_produk`,`brand` FROM `brand_produk` ORDER BY `brand`";
              $query_t = mysqli_query($koneksi, $sql_t);
              while ($data_t = mysqli_fetch_row($query_t)) {
                $id_brand = $data_t[0];
                $brand = $data_t[1];
              ?>
                <option value="<?= $id_brand; ?>" <?php if ($id_brand == $id_brand_produk) { ?> selected <?php } ?>><?= $brand; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        
        <div class="form-group row">
          <label for="Masuk" class="col-sm-3 col-form-label">Tanggal Masuk</label>
          <div class="col-sm-7">
            <input readonly type="text" class="form-control" name="masuk" id="Masuk" value="<?= $masuk; ?>">
          </div>
        </div>

        <div class="form-group row">
          <label for="Update" class="col-sm-3 col-form-label">Tanggal Diupdate</label>
          <div class="col-sm-7">
            <input readonly type="text" class="form-control" name="update" id="Update" value="<?= $update; ?>">
          </div>
        </div>

      </div>
  </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <div class="col-sm-12">
      <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Edit Produk</button>
    </div>
  </div>
  <!-- /.card-footer -->
  </form>
  </div>
  <!-- /.card -->

</section>
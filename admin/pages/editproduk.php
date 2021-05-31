<?php
if (isset($_GET['data'])) {
  $id_produk = $_GET['data'];
  $_SESSION['id_produk'] = $id_produk;
  $sql_a = "SELECT * FROM `produk` WHERE `id_produk` = '$id_produk'";
  $query_a = mysqli_query($koneksi, $sql_a);
  while ($data_a = mysqli_fetch_row($query_a)) {
    $id_produk = $data_a[0];
    $title = $data_a[1];
    $nama = $data_a[2];
    $deskripsi = $data_a[3];
    $harga = $data_a[4];
    $stok = $data_a[5];
    $kategori_produk = $data_a[6];
    $kategori_brand = $data_a[7];
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
            <?= $_GET['jenis']." produk"; ?> wajib di isi</div>
        <?php } ?>
      <?php } ?>
    </div>
    <form class="form-horizontal" action="index.php?pages=konfirmasieditproduk" method="post" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group row">
          <label for="title" class="col-sm-3 col-form-label">Title</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="title" id="title" value="<?= $title; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama Produk</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="nama" id="nama" value="<?= $nama; ?>">
          </div>
        </div>
          <div class="form-group row">
              <div class="col-sm-3 col-form-label">
                  Deskripsi
              </div>
              <div class="col-sm-7">
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;"><?php echo $deskripsi;?></textarea>
              </div>
          </div>
        <div class="form-group row">
          <label for="harga" class="col-sm-3 col-form-label">Harga Produk</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="harga" id="harga" value="<?= $harga; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="stok" class="col-sm-3 col-form-label">Stok Produk</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="stok" id="stok" value="<?= $stok; ?>">
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
                <option value="<?= $id_brand; ?>"><?= $brand; ?></option>
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
      <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Edit Produk</button>
    </div>
  </div>
  <!-- /.card-footer -->
  </form>
  </div>
  <!-- /.card -->

</section>
<?php
if (isset($_GET['data'])) {
  $id_produk = $_GET['data'];
  $sql = "SELECT `p`.`id_produk`, `p`.`title`, `p`.`nama`, `p`.`deskripsi`, `p`.`harga`, `p`.`stok`,
  `p`.`gambar`, `p`.`created_at`, `p`.`updated_at`, `k`.`kategori`,`b`.`brand`, `a`.`nama` FROM `produk` `p`
  INNER JOIN `kategori_produk` `k` ON `p`.`id_kategori_produk` = `k`.`id_kategori_produk` 
  INNER JOIN `brand_produk` `b` ON `p`.`id_brand_produk` = `b`.`id_brand_produk`
  INNER JOIN `user` `a` ON `p`.`user_id` = `a`.`id_user` 
  WHERE `id_produk` = '$id_produk'";
  //$sql = "SELECT * FROM `produk` WHERE `id_produk` = '$id_produk'";
  $query = mysqli_query($koneksi, $sql);
  while ($data = mysqli_fetch_row($query)) {
      $id_produk = $data[0];
      $title = $data[1];
      $nama = $data[2];
      $deskripsi = $data[3];
      $harga = $data[4];
      $stock = $data[5];
      $gambar = $data[6];
      $created_at = $data[7];
      $updated_at = $data[8];
      $produk = $data[9];
      $brand = $data[10];
      $admin = $data[11];
  }
}
?>

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3><i class="fas fa-user-tie"></i> Detail Data Produk</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php?pages=profile">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php?pages=produk">Data Produk</a></li>
                <li class="breadcrumb-item active">Detail Data Blog</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="card">
          <div class="card-header">
            <div class="card-tools">
              <a href="index.php?pages=produk" class="btn btn-sm btn-warning float-right">
                <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
                <tr>
                  <td width="20%"><strong>Gambar Produk<strong></td>
                  <td width="80%"><img width="300px" src="foto/produk/<?= $gambar; ?>" alt="gambar produk"></td>
                </tr>
              <tbody>
                <tr>
                  <td width="20%"><strong>Title<strong></td>
                  <td width="80%"><?= $title; ?></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Nama Produk<strong></td>
                  <td width="80%"><?= $nama; ?></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Deskripsi Produk<strong></td>
                  <td width="80%"><?= $deskripsi; ?></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Harga Produk<strong></td>
                  <td width="80%"><?= $harga; ?></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Stock Produk<strong></td>
                  <td width="80%"><?= $stock; ?></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Kategori Produk<strong></td>
                  <td width="80%"><?= $produk; ?></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Brand Produk<strong></td>
                  <td width="80%"><?= $brand; ?></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Tanggal Ditambahkan<strong></td>
                  <td width="80%"><?= $created_at; ?></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Tanggal Diubah<strong></td>
                  <td width="80%"><?= $updated_at; ?></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Executed By<strong></td>
                  <td width="80%"><?= $admin; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">&nbsp;</div>
        </div>
        <!-- /.card -->

      </section>

<?php
if (isset($_GET['data'])) {
  $id_produk = $_GET['data'];
  $sql = "SELECT `p`.`id_produk`, `p`.`title`, `p`.`nama`, `p`.`deskripsi`, `p`.`harga`, `p`.`stok`,`k`.`kategori`,`b`.`brand` FROM `produk` `p`
  INNER JOIN `kategori_produk` `k` ON `p`.`id_kategori_produk` = `k`.`id_kategori_produk` 
  INNER JOIN `brand_produk` `b` ON `p`.`id_brand_produk` = `b`.`id_brand_produk`";
  $query = mysqli_query($koneksi, $sql);
  while ($data = mysqli_fetch_row($query)) {
      $id_produk = $data[0];
      $title = $data[1];
      $nama = $data[2];
      $deskripsi = $data[3];
      $harga = $data[4];
      $stock = $data[5];
      $kategori = $data[6];
      $brand = $data[7];
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
                  <td width="80%">Belum diedit di codingan</td>
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
                  <td width="80%"><?= $kategori; ?></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Brand Produk<strong></td>
                  <td width="80%"><?= $brand; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">&nbsp;</div>
        </div>
        <!-- /.card -->

      </section>

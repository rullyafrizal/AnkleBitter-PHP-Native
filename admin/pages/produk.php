<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_produk = $_GET['data'];
    $sql_a = "delete from `produk` where `id_produk` = '$id_produk'";
    mysqli_query($koneksi, $sql_a);
  }
}
if (isset($_POST["katakunci"])) {
  $katakunci_kategori = $_POST["katakunci"];
  $_SESSION['katakunci_kategori'] = $katakunci_kategori;
}
if (isset($_SESSION['katakunci_kategori'])) {
  $katakunci_kategori = $_SESSION['katakunci_kategori'];
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-shopping-bag"></i> Data Produk</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?pages=profile">Home</a></li>
          <li class="breadcrumb-item active"> Data Produk</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Produk</h3>
      <div class="card-tools">
        <a href="index.php?pages=tambahproduk" class="btn btn-sm btn-info float-right">
          <i class="fas fa-plus"></i> Tambah Produk</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="col-md-12">
        <form method="post" action="index.php?pages=produk">
          <div class="row">
            <div class="col-md-4 bottom-10">
              <input type="text" class="form-control" id="kata_kunci" name="katakunci">
            </div>
            <div class="col-md-5 bottom-10">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i> Search</button>
            </div>
          </div><!-- .row -->
        </form>
      </div><br>
      <div class="col-sm-12">
        <?php if (!empty($_GET['notif'])) { ?>
          <?php if ($_GET['notif'] == "tambahberhasil") { ?>
            <div class="alert alert-success" role="alert">
              Data Berhasil Ditambahkan</div>
          <?php } else if ($_GET['notif'] == "editberhasil") { ?>
            <div class="alert alert-success" role="alert">
              Data Berhasil Diubah</div>
          <?php } else if ($_GET['notif'] == "hapusberhasil") { ?>
            <div class="alert alert-success" role="alert">
              Data Berhasil Dihapus</div>
          <?php } ?>
        <?php } ?>
      </div>
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th width="10%">
                <center>Id Produk</center>
                </center>
              </th>
              <th width="15%">
                <center>Nama Produk</center>
              </th>
              <th width="10%">
                <center>Harga</center>
              </th>
              <th width="10%">
                <center>Stock</center>
              </th>
              <th width="10%">
                <center>Kategori Produk</center>
              </th>
              <th width="10%">
                <center>Brand</center>
              </th>
              <th width="12%">
                <center>Aksi</center>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $batas = 5;
            if (!isset($_GET['halaman'])) {
              $posisi = 0;
              $halaman = 1;
            } else {
              $halaman = $_GET['halaman'];
              $posisi = ($halaman - 1) * $batas;
            }
            //hitung jumlah semua data
            $sql_jum = "SELECT `p`.`id_produk`, `p`.`nama`, `p`.`harga`, `p`.`stok`,`k`.`kategori`,`b`.`brand` FROM `produk` `p`
                    INNER JOIN `kategori_produk` `k` ON `p`.`id_kategori_produk` = `k`.`id_kategori_produk` 
                    INNER JOIN `brand_produk` `b` ON `p`.`id_brand_produk` = `b`.`id_brand_produk`";
            if (!empty($katakunci_kategori)) {
              $sql_jum .= " AND `nama` LIKE '%$katakunci_kategori%'";
            }
            $sql_jum .= " order by `nama`";
            $query_jum = mysqli_query($koneksi, $sql_jum);
            $jum_data = mysqli_num_rows($query_jum);
            $jum_halaman = ceil($jum_data / $batas);

            $sql = "SELECT `p`.`id_produk`, `p`.`nama`, `p`.`harga`, `p`.`stok`,`k`.`kategori`,`b`.`brand` FROM `produk` `p`
                    INNER JOIN `kategori_produk` `k` ON `p`.`id_kategori_produk` = `k`.`id_kategori_produk` 
                    INNER JOIN `brand_produk` `b` ON `p`.`id_brand_produk` = `b`.`id_brand_produk`";
            if (!empty($katakunci_kategori)) {
              $sql .= " AND `id_produk` LIKE '%$katakunci_kategori%'";
            }
            $sql .= " ORDER BY `id_produk` DESC limit $posisi, $batas";
            $query_k = mysqli_query($koneksi, $sql);
            //$no = $posisi + 1;
            while ($data_k = mysqli_fetch_row($query_k)) {
              $id_produk = $data_k[0];
              $nama = $data_k[1];
              $harga = $data_k[2];
              $stock = $data_k[3];
              $kategori = $data_k[4];
              $brand = $data_k[5];
            ?>
              <tr>
                <td>
                  <center><?= $id_produk; ?><center>
                </td>
                <td>
                  <center><?= $nama; ?><center>
                </td>
                <td>
                  <center><?= $harga; ?><center>
                </td>
                <td>
                  <center><?= $stock; ?><center>
                </td>
                <td>
                  <center><?= $kategori; ?><center>
                </td>
                <td>
                  <center><?= $brand; ?><center>
                </td>
                <td align="center">
                  <a href="index.php?pages=editproduk&data=<?= $id_produk; ?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                  <a href="index.php?pages=detailproduk&data=<?= $id_produk; ?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>

                  <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?= $nama; ?>?'))window.location.href='index.php?pages=produk&aksi=hapus&data=<?= $id_produk; ?>&notif=hapusberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i>
                    Hapus</a>
                </td>
              </tr>
            <?php
            } ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          <?php
          if ($jum_halaman == 0) {
            //tidak ada halaman
          } else if ($jum_halaman == 1) {
            echo "<li class='page-item'><a class='page-link'>1</a></li>";
          } else {
            $sebelum = $halaman - 1;
            $setelah = $halaman + 1;
            if ($halaman != 1) {
              echo "<li class='page-item'>
            <a class='page-link'href='index.php?pages=produk&halaman=1'>First</a></li>";
              echo "<li class='page-item'>
            <a class='page-link'href='index.php?pages=produk&halaman=$sebelum'>«</a></li>";
            }
            for ($i = 1; $i <= $jum_halaman; $i++) {
              if ($i > $halaman - 5 and $i < $halaman + 5) {
                if ($i != $halaman) {
                  echo "<li class='page-item'>
                <a class='page-link'href='index.php?pages=produk&halaman=$i'>$i</a></li>";
                } else {
                  echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                }
              }
            }
            if ($halaman != $jum_halaman) {
              echo "<li class='page-item'>
            <a class='page-link'href='index.php?pages=produk&halaman=$setelah'>»</a></li>";
              echo "<li class='page-item'>
            <a class='page-link'href='index.php?pages=produk&halaman=$jum_halaman'>Last</a></li>";
            }
          } ?>
        </ul>
      </div>
    </div>
    <!-- /.card -->
</section>
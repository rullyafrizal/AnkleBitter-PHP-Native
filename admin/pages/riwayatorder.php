<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_order = $_GET['data'];
    $sql_b = "delete from `order` where `id_order` = '$id_order'";
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
        <h3><i class="fas fa-credit-card"></i> List Riwayat Order</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?pages=profile">Home</a></li>
          <li class="breadcrumb-item active">List Riwayat Order</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Riwayat Order</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="col-md-12">
        <form method="post" action="index.php?pages=riwayatorder">
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
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th width="10%">
                <center>Id Order</center>
                </center>
              </th>
              <th width="15%">
                <center>Alamat Pengiriman</center>
              </th>
              <th width="10%">
                <center>Status</center>
              </th>
              <th width="10%">
                <center>Total Harga</center>
              </th>
              <th width="10%">
                <center>Nomor Rekening</center>
              </th>
              <th width="10%">
                <center>Nama</center>
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
            $sql_jum = "SELECT `o`.`id_order`, `o`.`alamat_pengiriman`, `o`.`status`, `o`.`total_harga`,`r`.`nomor_rekening`, `c`.`nama` FROM `order` `o`
                    INNER JOIN `rekening_pembayaran` `r` ON `o`.`id_rekening_pembayaran` = `r`.`id_rekening_pembayaran` 
                    INNER JOIN `customer` `c` ON `o`.`id_customer` = `c`.`id_customer`";
            if (!empty($katakunci_kategori)) {
              $sql_jum .= " AND `id_order` LIKE '%$katakunci_kategori%'";
            }
            $sql_jum .= "where `status`='Pesanan Diterima'  order by `id_order`";
            $query_jum = mysqli_query($koneksi, $sql_jum);
            $jum_data = mysqli_num_rows($query_jum);
            $jum_halaman = ceil($jum_data / $batas);

            $sql = "SELECT `o`.`id_order`, `o`.`alamat_pengiriman`, `o`.`status`, `o`.`total_harga`,`r`.`nomor_rekening`, `c`.`nama` FROM `order` `o`
                    INNER JOIN `rekening_pembayaran` `r` ON `o`.`id_rekening_pembayaran` = `r`.`id_rekening_pembayaran` 
                    INNER JOIN `customer` `c` ON `o`.`id_customer` = `c`.`id_customer`";
            if (!empty($katakunci_kategori)) {
              $sql .= " AND `id_order` LIKE '%$katakunci_kategori%'";
            }
            $sql .= "WHERE `status`='Pesanan Diterima' ORDER BY `id_order` limit $posisi, $batas";
            $query_k = mysqli_query($koneksi, $sql);
            //$no = $posisi + 1;
            while ($data_k = mysqli_fetch_row($query_k)) {
              $id_order = $data_k[0];
              $alamat = $data_k[1];
              $status = $data_k[2];
              $total_harga = $data_k[3];
              $nomor_rekening = $data_k[4];
              $nama = $data_k[5];
            ?>
              <tr>
                <td>
                  <center><?= $id_order; ?><center>
                </td>
                <td>
                  <center><?= $alamat; ?><center>
                </td>
                <td>
                  <center><?= $status; ?><center>
                </td>
                <td>
                  <center><?= $total_harga; ?><center>
                </td>
                <td>
                  <center><?= $nomor_rekening; ?><center>
                </td>
                <td>
                  <center><?= $nama; ?><center>
                </td>
                <td align="center">
                  <a href="index.php?pages=detailriwayatorder&data=<?= $id_order; ?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                  <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?= $id_order; ?>?'))window.location.href='index.php?pages=riwayatorder&aksi=hapus&data=<?= $id_order; ?>&notif=hapusberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i>
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
            <a class='page-link'href='index.php?pages=riwayatorder&halaman=1'>First</a></li>";
              echo "<li class='page-item'>
            <a class='page-link'href='index.php?pages=riwayatorder&halaman=$sebelum'>«</a></li>";
            }
            for ($i = 1; $i <= $jum_halaman; $i++) {
              if ($i > $halaman - 5 and $i < $halaman + 5) {
                if ($i != $halaman) {
                  echo "<li class='page-item'>
                <a class='page-link'href='index.php?pages=riwayatorder&halaman=$i'>$i</a></li>";
                } else {
                  echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                }
              }
            }
            if ($halaman != $jum_halaman) {
              echo "<li class='page-item'>
            <a class='page-link'href='index.php?pages=riwayatorder&halaman=$setelah'>»</a></li>";
              echo "<li class='page-item'>
            <a class='page-link'href='index.php?pages=riwayatorder&halaman=$jum_halaman'>Last</a></li>";
            }
          } ?>
        </ul>
      </div>
    </div>
    <!-- /.card -->
</section>
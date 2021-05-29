<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_customer = $_GET['data'];
    //hapus kategori buku
    $sql_dh = "delete from `customer` where `id_customer` = '$id_customer'";
    mysqli_query($koneksi, $sql_dh);
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
        <h3><i class="fas fa-user-tie"></i> Data User</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active"> Data User</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar User</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="col-md-12">
        <form method="post" action="index.php?pages=customer">
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
          <?php if ($_GET['notif'] == "editberhasil") { ?>
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
                <center>Id Customer</center>
                </center>
              </th>
              <th width="15%">
                <center>Nama</center>
              </th>
              <th width="15%">
                <center>Alamat</center>
              </th>
              <th width="10%">
                <center>Kode Pos</center>
              </th>
              <th width="15%">
                <center>Nomor Telepon</center>
              </th>
              <th width="8%">
                <center>Aksi</center>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $batas = 3;
            if (!isset($_GET['halaman'])) {
              $posisi = 0;
              $halaman = 1;
            } else {
              $halaman = $_GET['halaman'];
              $posisi = ($halaman - 1) * $batas;
            }
            $sql_jum = "SELECT `c`. `id_customer`, `u`.`nama`, `c`.`alamat`, `c`.`kode_pos`, `c`.`nomor_telepon` 
            FROM `customer` `c` INNER JOIN `user` `u` ON `c`. `id_user` = `u`.`id_user`";
            if (!empty($katakunci_kategori)) {
              $sql_jum .= " AND `id_customer` LIKE '%$katakunci_kategori%'";
            }
            $sql_jum .= " order by `id_customer`";
            $query_jum = mysqli_query($koneksi, $sql_jum);
            $jum_data = mysqli_num_rows($query_jum);
            $jum_halaman = ceil($jum_data / $batas);

            $sql = "SELECT `c`. `id_customer`, `u`.`nama`, `c`.`alamat`, `c`.`kode_pos`, `c`.`nomor_telepon` 
            FROM `customer` `c` INNER JOIN `user` `u` ON `c`. `id_user` = `u`.`id_user` ";
            if (!empty($katakunci_kategori)) {
              $sql .= " AND `id_customer` LIKE '%$katakunci_kategori%'";
            }
            $sql .= " ORDER BY `id_customer` limit $posisi, $batas";
            $query_k = mysqli_query($koneksi, $sql);
            $no = $posisi + 1;
            while ($data_k = mysqli_fetch_row($query_k)) {
              $id_customer = $data_k[0];
              $nama = $data_k[1];
              $alamat = $data_k[2];
              $kode_pos = $data_k[3];
              $nomor_telepon = $data_k[4];
            ?>
              <tr>
                <td><center><?= $id_customer; ?></center></td>
                <td><center><?= $nama; ?></center></td>
                <td><center><?= $alamat; ?></center></td>
                <td><center><?= $kode_pos; ?></center></td>
                <td><center><?= $nomor_telepon; ?></center></td>
                <td align="center">
                  <a href="index.php?pages=detailcustomer&data=<?= $id_customer; ?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                  <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?= $nama; ?>?'))window.location.href='index.php?pages=customer&aksi=hapus&data=<?= $id_customer; ?>&notif=hapusberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i>
                    Hapus</a>
                </td>
              </tr>
            <?php $no++;
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
            <a class='page-link'href='index.php?pages=customer&halaman=1'>First</a></li>";
              echo "<li class='page-item'>
            <a class='page-link'href='index.php?pages=customer&halaman=$sebelum'>«</a></li>";
            }
            for ($i = 1; $i <= $jum_halaman; $i++) {
              if ($i > $halaman - 5 and $i < $halaman + 5) {
                if ($i != $halaman) {
                  echo "<li class='page-item'>
                <a class='page-link'href='index.php?pages=customer&halaman=$i'>$i</a></li>";
                } else {
                  echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                }
              }
            }
            if ($halaman != $jum_halaman) {
              echo "<li class='page-item'>
            <a class='page-link'href='index.php?pages=customer&halaman=$setelah'>»</a></li>";
              echo "<li class='page-item'>
            <a class='page-link'href='index.php?pages=customer&halaman=$jum_halaman'>Last</a></li>";
            }
          } ?>
        </ul>
      </div>
    </div>
    <!-- /.card -->

</section>
<?php
if (isset($_GET['data'])) {
  $id_order = $_GET['data'];
  $sql_b ="SELECT `o`.`id_order`, `o`.`ordered_at`, `o`.`alamat_pengiriman`, `o`.`status`, `o`.`total_harga`, 
  `o`. `resi_pengiriman`, `o`.`catatan` ,`r`.`nomor_rekening`, `r`.`id_rekening_pembayaran`, `c`.`nama`, `c`.`id_customer` FROM `order` `o`
  INNER JOIN `rekening_pembayaran` `r` ON `o`.`id_rekening_pembayaran` = `r`.`id_rekening_pembayaran` 
  INNER JOIN `customer` `c`  ON `o`.`id_customer` = `c`.`id_customer` WHERE `id_order` = '$id_order'";
  $query_b = mysqli_query($koneksi, $sql_b);
  while ($data_b = mysqli_fetch_row($query_b)) {
    $id_order = $data_b[0];
    $tanggal = $data_b[1];
    $alamat = $data_b[2];
    $status = $data_b[3];
    $harga = $data_b[4];
    $resi = $data_b[5];
    $catatan = $data_b[6];
    $rek = $data_b[7];
    $id_rek = $data_b[8];
    $customer = $data_b[9];
    $id_customer = $data_b[10];
  }
}
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-user-tie"></i> Detail Data Order</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?pages=profile">Home</a></li>
          <li class="breadcrumb-item"><a href="index.php?pages=order">Data Order</a></li>
          <li class="breadcrumb-item active">Detail Data Order</li>
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
        <a href="index.php?pages=order" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
      <tr>
          <td width="20%"><strong>ID Order<strong></td>
          <td width="80%"><?= $id_order; ?></td>
        </tr>
        <tr>
          <td width="20%"><strong>Nama Customer<strong></td>
          <td width="80%"><?= $customer; ?></td>
        </tr>
        <tbody>
          <tr>
            <td width="20%"><strong>Total Harga Order<strong></td>
            <td width="80%"><?= $harga; ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Status<strong></td>
            <td width="80%"><?= $status; ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Tanggal Order<strong></td>
            <td width="80%"><?= $tanggal; ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Alamat Pengiriman<strong></td>
            <td width="80%"><?= $alamat; ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Rekening Pembayaran<strong></td>
            <td width="80%"><?= $rek; ?></td>
          </tr>
          <tr>
            <?php 
            $sql = "SELECT `foto` FROM `bukti_pembayaran` WHERE `id_order` = '$id_order'";
            $query = mysqli_query($koneksi, $sql);
            $jumlah = mysqli_num_rows($query);
            while($data = mysqli_fetch_row($query)){
              $foto = $data[0];
            }
            ?>
            <td width="20%"><strong>Bukti Pembayaran<strong></td>
              <?php
                if ($jumlah !== 0) {
                    ?>
                    <td width="80%"><img width="300px" src="../user/assets/images/bukti_bayar/<?= $foto; ?>"></td>
                    <?php
                } else {
                    ?>
                    <td width="80%">-</td>
                    <?php
                }
              ?>
          </tr>
          <tr>
            <td width="20%"><strong>Catatan Customer<strong></td>
            <td width="80%"><?= $catatan; ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Resi Pengiriman<strong></td>
            <td width="80%"><img width="300px" src="foto/resi/<?php if($resi == ''){
                                                  echo 'default.png';  
                                                  } else {
                                                    echo $resi;
                                                  }
                                                  ?>">
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">&nbsp;</div>
  </div>
  <!-- /.card -->

</section>
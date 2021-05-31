<?php
if (isset($_GET['data'])) {
  $id_order = $_GET['data'];
  $_SESSION['id_order'] = $id_order;
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
  $_SESSION['id_rek'] = $id_rek;
  $_SESSION['id_customer'] = $id_customer;
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-edit"></i> Edit Order </h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?pages=order">Data Order</a></li>
          <li class="breadcrumb-item active">Edit Order</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Order</h3>
      <div class="card-tools">
        <a href="index.php?pages=order" class="btn btn-sm btn-warning float-right">
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
            <?= $_GET['jenis']; ?> wajib di isi</div>
        <?php } ?>
      <?php } ?>
    </div>
    <form class="form-horizontal" action="index.php?pages=konfirmasieditorder" method="post" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama Customer</label>
          <div class="col-sm-7">
            <input readonly type="text" class="form-control" name="customer" id="nama" value="<?= $customer; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="harga" class="col-sm-3 col-form-label">Total Harga</label>
          <div class="col-sm-7">
            <input readonly type="text" class="form-control" name="harga" id="harga" value="<?= $harga; ?>">
          </div>
        </div>
        <div class="form-group row">
            <label for="Status" class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-7">
              <select class="form-control" id="Status" name="status">
                  <option value="">--Status Pesanan--</option>
                  <option value="Menunggu Bukti Pembayaran">Menunggu Bukti Pembayaran</option>
                  <option value="Sedang Dikonfirmasi">Sedang Diverifikasi</option>
                  <option value="Pesanan Diproses">Pesanan Diproses</option>
                  <option value="Pesanan Dikirim">Pesanan Dikirim</option>
                  <option value="Pesanan Diterima">Pesanan Diterima</option>
              </select>
            </div>
        </div>
        <div class="form-group row">
          <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Order</label>
          <div class="col-sm-7">
            <div class="input-group-append">
              <input readonly type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $tanggal; ?>">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="address" class="col-sm-3 col-form-label">Alamat Pengiriman</label></label>
          <div class="col-sm-7">
            <input readonly type="text" class="form-control" name="alamat" id="address" value="<?= $alamat; ?>">
          </div>
        </div>
          <div class="form-group row">
              <label for="rekening" class="col-sm-3 col-form-label">Rekening Pembayaran</label>
              <div class="col-sm-7">
                  <select readonly class="form-control" name="rek" id="rekening">
                      <option value="">-- Pilih Rekening --</option>
                      <?php
                      $sql_k = "SELECT `id_rekening_pembayaran`,`nomor_rekening` FROM `rekening_pembayaran` ORDER BY `id_rekening_pembayaran`";
                      $query_k = mysqli_query($koneksi, $sql_k);
                      while ($data_k = mysqli_fetch_row($query_k)) {
                          $id_rekening_pembayaran = $data_k[0];
                          $nomor_rekening = $data_k[1];
                          ?>
                          <option value="<?php echo $id_rekening_pembayaran; ?>"
                              <?php if ($id_rekening_pembayaran == $id_rek) { ?>
                                  selected <?php } ?>><?php echo $nomor_rekening; ?></option>
                      <?php } ?>
                  </select>
              </div>
          </div>
        <div class="form-group row">
          <label for="Catatan" class="col-sm-3 col-form-label">Catatan</label>
          <div class="col-sm-7">
            <textarea readonly class="form-control" name="catatan" id="editor1" rows="12"><?= $catatan; ?></textarea>
          </div>
        </div>

        <div class="form-group row">
          <label for="foto" class="col-sm-3 col-form-label">Resi Pengiriman
          </label>
          <div class="col-sm-7">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="resi" id="customFile">
              <label class="custom-file-label" for="customFile">Pilih Gambar</label>
            </div>
          </div>
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Edit Order</button>
          </div>
        </div>
        <!-- /.card-footer -->
    </form>
  </div>
  <!-- /.card -->
</section>
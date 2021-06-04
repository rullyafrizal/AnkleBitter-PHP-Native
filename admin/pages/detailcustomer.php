<?php
if (isset($_GET['data'])) {
  $id_customer = $_GET['data'];
  //get data customer
  $sql_m = "SELECT * FROM `customer` WHERE `id_customer`='$id_customer'";
  $query_m = mysqli_query($koneksi, $sql_m);
  while ($data_m = mysqli_fetch_row($query_m)) {
    $cust = $data_m[0];
    $nama = $data_m[1];
    $alamat = $data_m[2];
    $kodepos = $data_m[3];
    $telp = $data_m[4];
  }
}
?>
<!DOCTYPE html>
<html>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data Konten</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?pages=profile">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?pages=customer">Data Customer</a></li>
              <li class="breadcrumb-item active">Detail Data Customer</li>
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
                  <a href="index.php?pages=customer" class="btn btn-sm btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>                
                      <tr>
                        <td width="20%"><strong>ID Customer<strong></td>
                        <td width="80%"><?= $cust; ?></td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Nama Customer<strong></td>
                        <td width="80%"><?= $nama; ?></td></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Alamat Customer<strong></td>
                        <td width="80%"><?= $alamat; ?></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Kode Pos<strong></td>
                        <td width="80%"><?= $kodepos; ?></td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Nomor Telepon<strong></td>
                        <td width="80%"><?= $telp; ?></td>
                      </tr>
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>
</html>

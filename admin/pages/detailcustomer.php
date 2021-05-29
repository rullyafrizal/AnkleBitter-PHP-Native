<?php
if (isset($_GET['data'])) {
  $id_konten = $_GET['data'];
  $_SESSION['id_konten'] = $id_konten;
  //get data konten
  $sql_m = "SELECT `tanggal`,`judul`,`isi` FROM `konten` WHERE `id_konten`='$id_konten'";
  $query_m = mysqli_query($koneksi, $sql_m);
  while ($data_m = mysqli_fetch_row($query_m)) {
    $tanggal = $data_m[0];
    $judul = $data_m[1];
    $isi = $data_m[2];
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
              <li class="breadcrumb-item"><a href="index.php?include=profil">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?include=konten">Data Konten</a></li>
              <li class="breadcrumb-item active">Detail Data Konten</li>
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
                  <a href="index.php?include=konten" class="btn btn-sm btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>                
                      <tr>
                        <td width="20%"><strong>Tanggal<strong></td>
                        <td width="80%"><?= $tanggal; ?></td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Judul<strong></td>
                        <td width="80%"><?= $judul; ?></td></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Sinopsis<strong></td>
                        <td width="80%"><?= $isi; ?></td>
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

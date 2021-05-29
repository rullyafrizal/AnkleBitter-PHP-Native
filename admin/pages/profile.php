
<?php
$id_user = $_SESSION['id_user'];
//get profil
$sql = "select `nama`, `email`,`foto` from `user`
where `id_user`='$id_user'";
//echo $sql;
$query = mysqli_query($koneksi, $sql);
while($data = mysqli_fetch_row($query)){
$nama = $data[0];
$email = $data[1];
$foto = $data[2];
}
?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Profil</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Profil</li>
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
                  <a href="index.php?pages=editprofile&data=<? $id_user; ?>" class="btn btn-sm btn-info float-right"><i class="fas fa-edit"></i> Edit Profil</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-sm-12">
                    <!-- <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                </div> -->
                <?php if(!empty($_GET['notif'])){
                 if($_GET['notif']=="editberhasil"){?>
                 <div class="alert alert-success" role="alert">
                 Data Berhasil Diubah</div>
                 <?php }?>
                 <?php }?>
                <table class="table table-bordered">
                    <tbody>  
                      <tr>
                        <td colspan="2"><i class="fas fa-user-circle"></i> <strong>PROFIL<strong></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Foto<strong></td>
                        <td width="80%"><img src="foto/<?php if($foto == ''){
                                                            echo 'default.png';
                                                          }else{
                                                            echo $foto;
                                                          }
                                                            ?>" 
                          class="img-fluid" width="200px;"></td>
                      </tr>                
                      <tr>
                        <td width="20%"><strong>Nama<strong></td>
                        <td width="80%"><?= $nama; ?></td>
                      </tr>                
                      <tr>
                        <td width="20%"><strong>Email<strong></td>
                        <td width="80%"><?= $email; ?></td>
                      </tr> 
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>
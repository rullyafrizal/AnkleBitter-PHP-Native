<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('./partials/head.php');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include('./partials/navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('./partials/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Data Riwayat Order</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Data Riwayat Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  Riwayat Oder</h3>
                <div class="card-tools">
                  <a href="tambahuser.php" class="btn btn-sm btn-info float-right">
                  <i class="fas fa-plus"></i> Tambah  Riwayat Order</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                 <form method="get" action="user.php">
                    <div class="row">
                    <div class="col-md-4 bottom-10">
                    <input type="text" class="form-control" id="kata_kunci"
                    name="katakunci">
                    </div>
                    <div class="col-md-5 bottom-10">
                    <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Search</button>
                    </div>
                    </div><!-- .row -->
                  </form>
                </div><br>
              <!-- <div class="col-sm-12">
                  <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
                  <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
              </div> -->
              <div class="col-sm-12">
                     <!-- <?php if(!empty($_GET['notif'])){?>
                     <?php if($_GET['notif']=="tambahberhasil"){?>
                     <div class="alert alert-success" role="alert">
                     Data Berhasil Ditambahkan</div>
                     <?php } else if($_GET['notif']=="editberhasil"){?>
                     <div class="alert alert-success" role="alert">
                     Data Berhasil Diubah</div>
                     <?php } else if($_GET['notif']=="hapusberhasil"){?>
                     <div class="alert alert-success" role="alert">
                     Data Berhasil Dihapus</div>
                     <?php } ?>
                     <?php } ?>
                </div> -->
              <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th width="5%">No</th>
                        <th width="30%">Nama</th>
                        <th width="30%">Email</th>
                        <th width="20%">Level</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <!-- <tbody>
                    <?php
                    $batas = 2;
                    if(!isset($_GET['halaman'])){
                    $posisi = 0;
                    $halaman = 1;
                    }else{
                    $halaman = $_GET['halaman'];
                    $posisi = ($halaman-1) * $batas;
                    }
                    //hitung jumlah semua data
                    $id_user = $_SESSION['id_user'];
                    $sql_jum = "SELECT `id_user`, `nama`, `email`, `level` FROM `user` where `id_user` != '$id_user' ";
                    if (isset($_GET["katakunci"])){
                    $katakunci_kategori = $_GET["katakunci"];
                    $sql_jum .= " AND `nama` LIKE '%$katakunci_kategori%'";
                    }
                    $sql_jum .= " order by `nama`";
                    $query_jum = mysqli_query($koneksi,$sql_jum);
                    $jum_data = mysqli_num_rows($query_jum);
                    $jum_halaman = ceil($jum_data/$batas);

                    
                     // $sql = "SELECT * from `user` where `id_user` != '$id_user' ORDER BY `nama`";
                    $sql = "SELECT `id_user`, `nama`, `email`, `level` FROM `user` where `id_user` != '$id_user' ";
                        if (isset($_GET["katakunci"])){
                        $katakunci_kategori = $_GET["katakunci"];
                        $sql .= " AND `nama` LIKE '%$katakunci_kategori%'";
                        }
                        $sql .= " ORDER BY `nama` limit $posisi, $batas";
                     $query_k = mysqli_query($koneksi,$sql);
                     $no = $posisi + 1;
                     while($data_k = mysqli_fetch_row($query_k)){
                     $user = $data_k[0];
                     $nama = $data_k[1];
                     $email = $data_k[2];
                     $level = $data_k[3];
                     ?>
                     <tr>
                     <td><?= $no;?></td>
                     <td><?= $nama;?></td>
                     <td><?= $email; ?></td>
                     <td><?= $level; ?></td>
                     <td align="center">
                     <a href="edituser.php?data=<?= $user;?>"
                     class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                     <a href="detailuser.php?data=<?=$user;?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>

                     <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?= $nama; ?>?'))window.location.href='user.php?aksi=hapus&data=<?= $user;?>&notif=hapusberhasil'"
                     class="btn btn-xs btn-warning"><i class="fas fa-trash"></i>
                     Hapus</a>
                     </td>
                     </tr>
                     <?php $no++;}?>
                    </tbody> -->
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                <!-- <?php 
                if($jum_halaman==0){
                //tidak ada halaman
                }else if($jum_halaman==1){
                echo "<li class='page-item'><a class='page-link'>1</a></li>";

                }else{
                $sebelum = $halaman-1;
                $setelah = $halaman+1;
                if (isset($_GET["katakunci"])){
                  $katakunci_kategori = $_GET["katakunci"];
                if($halaman!=1){
                echo "<li class='page-item'>
                <a class='page-link' href='user.php?halaman=1'>
                First</a></li>";
                echo "<li class='page-item'>
                <a class='page-link' href='user.php?halaman=$sebelum'>
                «</a></li>";
                }

                for($i=1; $i<=$jum_halaman; $i++){
                  if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                if($i!=$halaman){
                echo "<li class='page-item'>
                <a class='page-link' href='user.php?halaman=$i'>
                $i</a></li>";
                }else{
                echo "<li class='page-item'>
                <a class='page-link'>$i</a></li>";
                }
                }
              }

                if($halaman!=$jum_halaman){
                echo "<li class='page-item'>
                <a class='page-link' href='user.php?halaman=$setelah'>
                »</a></li>";
                echo "<li class='page-item'>
                <a class='page-link' href='user.php?halaman=$jum_halaman'>Last</a></li>";
                }
                }else{
                  if($halaman!=1){
                  echo "<li class='page-item'><a class='page-link'
                  href='user.php?halaman=1'>First</a></li>";
                  echo "<li class='page-item'><a class='page-link'
                  href='user.php?halaman=$sebelum'>«</a></li>";
                  }
                  for($i=1; $i<=$jum_halaman; $i++){
                    if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                    if($i!=$halaman){
                    echo "<li class='page-item'><a class='page-link'
                    href='user.php?halaman=$i'>$i</a></li>";
                    }else{
                    echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                    }
                    }
                  }
                    if($halaman!=$jum_halaman){
                    echo "<li class='page-item'><a class='page-link'
                    href='user.php?halaman=$setelah'>
                    »</a></li>";
                    echo "<li class='page-item'><a class='page-link'
                    href='user.php?
                    halaman=$jum_halaman'>Last</a></li>";
                    }
                  }
                  }?> -->
                 </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
<?php include('./partials/footer.php'); ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include('./partials/script.php');?>
</body>
</html>
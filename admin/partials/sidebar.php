<?php
$id_user = $_SESSION['id_user'];
//get profil
$sql = "select `nama`,`foto` from `user` where `id_user`='$id_user'";
//echo $sql;
$query = mysqli_query($koneksi, $sql);
while ($data = mysqli_fetch_row($query)) {
    $nama = $data[0];
    $foto = $data[1];
}
?>
<aside class="main-sidebar sidebar-dark-primary elevation-5">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin AnkleBitter</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="foto/logo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="index.php?pages=profile" class="d-block"><?= $nama; ?>
                <!-- <?  if ($nama == "Bernardus Angelo Johan Fernandy"){
                            echo "Lilo";
                    }else{
                        echo $nama;
                    }
                ?> -->
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="index.php?pages=produk" class="nav-link">
                        <i class="fa fa-shopping-bag nav-icon"></i>
                        <p>Produk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?pages=order" class="nav-link">
                        <i class="fa fa-shopping-basket nav-icon"></i>
                        <p>Order</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?pages=riwayatorder" class="nav-link">
                        <i class="fa fa-credit-card nav-icon"></i>
                        <p>Riwayat Order</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?pages=customer" class="nav-link">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Pengaturan Customer</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?pages=signout" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Signout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
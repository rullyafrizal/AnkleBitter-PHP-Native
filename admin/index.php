<?php
session_start();
include('../koneksi/koneksi.php');
if (isset($_GET["pages"])) {
    $include = $_GET["pages"];
    if ($include == "konfirmasilogin") {
        include("pages/konfirmasilogin.php");
    } else if ($include == "konfirmasieditprofile") {
        include("pages/konfirmasieditprofile.php");
    } else if ($include == "konfirmasitambahproduk") {
        include("pages/konfirmasitambahproduk.php");
    } else if ($include == "konfirmasieditproduk") {
        include("pages/konfirmasieditproduk.php");
    } else if ($include == "konfirmasieditorder") {
        include("pages/konfirmasieditorder.php");
    } else if ($include == "signout") {
        include("pages/signout.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('partials/head.php'); ?>
</head>
<?php
//cek ada get include
if (isset($_GET["pages"])) {
    $include = $_GET["pages"];
    //cek apakah ada session id admin
    if (isset($_SESSION['id_user']) && $_SESSION['role'] === 'admin') {
?>

        <body class="hold-transition sidebar-mini layout-fixed">
            <div class="wrapper">
                <!-- Navbar -->
                <?php include('partials/navbar.php'); ?>
                <!-- /.navbar -->

                <!-- Main Sidebar Container -->
                <?php include('partials/sidebar.php'); ?>

                <div class="content-wrapper">
                    <?php
                    if ($include == "editprofile") {
                        include("pages/editprofile.php");
                    } else if($include == "produk"){
                        include("pages/produk.php");
                    } else if($include == "tambahproduk"){
                        include("pages/tambahproduk.php");
                    } else if($include == "editproduk"){
                        include("pages/editproduk.php");
                    } else if($include == "detailproduk"){
                        include("pages/detailproduk.php");
                    } else if ($include == "order") {
                        include("pages/order.php");
                    } else if ($include == "tambahorder") {
                        include("pages/tambahorder.php");
                    } else if ($include == "editorder") {
                        include("pages/editorder.php");
                    } else if ($include == "detailorder") {
                        include("pages/detailorder.php");
                    } else if ($include == "riwayatorder") {
                        include("pages/riwayatorder.php");
                    } else if ($include == "detailriwayatorder") {
                        include("pages/detailriwayatorder.php");
                    } else if ($include == "customer") {
                        include("pages/customer.php");
                    } else if ($include == "signout") {
                        include("pages/signout.php");
                    } else {
                        include("pages/profile.php");
                    }
                    ?>
                </div>
                <!-- /.content-wrapper -->
                <?php include('partials/footer.php'); ?>

                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                </aside>
                <!-- /.control-sidebar -->
            </div>
            <!-- ./wrapper -->

            <?php include('partials/script.php'); ?>
        </body>

    <?php
    } else {
        //pemanggilan halaman form login
        include("pages/login.php");
    }
} else {
    if (isset($_SESSION['id_user'])) {
        //pemanggilan ke halaman-halaman profil jika ada session
    ?>

        <body class="hold-transition sidebar-mini layout-fixed">
            <div class="wrapper">
                <!-- Navbar -->
                <?php include('partials/navbar.php'); ?>
                <!-- /.navbar -->

                <!-- Main Sidebar Container -->
                <?php include('partials/sidebar.php'); ?>

                <div class="content-wrapper">
                    <?php
                    //pemanggilan profil
                    include("pages/profile.php");
                    ?>
                </div>
                <!-- /.content-wrapper -->
                <?php include('partials/footer.php'); ?>

                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                </aside>
                <!-- /.control-sidebar -->
            </div>
            <!-- ./wrapper -->

            <?php include('partials/script.php'); ?>
        </body>
<?php
    } else {
        //pemanggilan halaman form login
        include("pages/login.php");
    }
}
?>
</html>
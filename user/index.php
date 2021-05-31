<?php
    session_start();
    include('../koneksi/koneksi.php');
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page === 'konfirmasi-login') {
            include('./pages/konfirmasiLogin.php');
        } else if ($page === 'logout') {
            include('./pages/logout.php');
        } else if ($page === 'konfirmasi-registrasi') {
            include('./pages/konfirmasiRegistrasi.php');
        } else if ($page === 'konfirmasi-cart') {
            include('./pages/konfirmasiCart.php');
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <?php include('./partials/head.php'); ?>
</head>
<body>
    <?php include('./partials/navbar.php');?>

    <?php
        if(isset($_GET['page'])) {
            $page = $_GET['page'];

            if ($page === 'login') {
                include('./pages/login.php');
            } else if ($page === 'register') {
                include('./pages/register.php');
            } else if ($page === 'categories') {
                include('./pages/categories.php');
            } else if ($page === 'categories-certain') {
                include('./pages/categoriesCertain.php');
            } else if ($page === 'brands') {
                include('./pages/brands.php');
            } else if ($page === 'brand-certain') {
                include('./pages/brandsCertain.php');
            } else if ($page === 'product') {
                include('./pages/productDetails.php');
            } else if ($page === 'cart') {
                include('./pages/cart.php');
            }
        } else {
            include('./pages/home.php');
        }
    ?>



    <?php include('./partials/footer.php');?>
    <?php include('./partials/scripts.php');?>
</body>
</html>

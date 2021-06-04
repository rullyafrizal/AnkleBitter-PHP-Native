<?php
    session_start();
    include('../koneksi/koneksi.php');
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        if($page === 'konfirmasi-edit-akun') {
            include('./pages/dashboard/konfirmasiEditAccount.php');
        }
    }

    if (isset($_SESSION['id_user'])) {
        if($_SESSION['role'] !== 'customer') {
            echo "<script>
                    alert('Access Restricted, anda bukan customer');
                    window.location.href = '/user/index.php';
                    </script>";
        } else {
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <?php include('./partials/dashboard/head.php'); ?>
            </head>

            <body>
            <div class="page-dashboard">
                <div class="d-flex" id="wrapper" data-aos="fade-right">

                    <?php include('./partials/dashboard/sidebar.php'); ?>

                    <!-- Page Content -->
                    <div id="page-content-wrapper">
                        <?php include('./partials/dashboard/navbar.php'); ?>

                        <?php
                        if(isset($_GET['page'])) {
                            $page = $_GET['page'];

                            if ($page === 'index') {
                                include('./pages/dashboard/index.php');
                            } else if ($page === 'account') {
                                include('./pages/dashboard/account.php');
                            } else if ($page === 'transactions') {
                                include('./pages/dashboard/transactions.php');
                            } else if ($page === 'transaction-details') {
                                include('./pages/dashboard/transactionDetails.php');
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
            <?php
            include('./partials/dashboard/scripts.php');
            ?>
            </body>
            </html>
            <?php
        }
    } else {
        echo "<script>
                alert('Access Restricted');
                window.location.href = '/user/index.php';
                </script>";
    }

?>



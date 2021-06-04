<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
    <div class="container-fluid">
        <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
            &laquo; Menu
        </button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
                $id_user = $_SESSION['id_user'];
                $sql = "SELECT `nama` FROM `user` WHERE `id_user`='$id_user'";
                $query = mysqli_query($koneksi, $sql);
                while ($data = mysqli_fetch_row($query)) {
                    $nama = $data[0];
                }
            ?>
            <!-- Desktop Menu -->
            <ul class="navbar-nav d-none d-lg-flex ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <img src="./assets/images/icon-user.png" alt="" width="35px" class="rounded-circle mr-2 profile-picture"/>
                        Hi, <?= $nama; ?>
                    </a>
                    <div class="dropdown-menu">
                        <a href="dashboard.php?page=index" class="dropdown-item">Dashboard</a>
                        <a href="dashboard.php?page=account" class="dropdown-item">
                            Account Settings
                        </a>
                        <a href="dashboard.php?page=transactions" class="dropdown-item">
                            Transactions
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?page=logout">
                            Logout
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=cart" class="nav-link d-inline-block mt-2">
                        <?php
                        $sql_cust = "SELECT `id_customer` FROM `customer` WHERE `id_user`='$id_user'";
                        $query_cust = mysqli_query($koneksi, $sql_cust);
                        while ($data = mysqli_fetch_row($query_cust)) {
                            $id_cust = $data[0];
                        }
                        $_SESSION['id_customer'] = $id_cust;
                        $sql_cart = "SELECT COUNT(`id_customer`) FROM `keranjang_belanja` WHERE `id_customer`='$id_cust'";
                        $query_cart = mysqli_query($koneksi, $sql_cart);
                        while($data_cart = mysqli_fetch_row($query_cart)) {
                            $jumlah_cart = $data_cart[0];
                        }

                        if ((int) $jumlah_cart === 0) {
                            echo '<img src="./assets/images/icon-cart-empty.svg" alt=""/>';
                        } else if ((int) $jumlah_cart > 0) {
                            echo '<img src="./assets/images/icon-cart-filled.svg" alt=""/>
                                                        <div class="card-badge">' . $jumlah_cart .'</div>';
                        }
                        ?>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                    <a href="dashboard.php?page=index" class="nav-link">
                        Hi, <?= $nama; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=cart" class="nav-link d-inline-block">
                        Cart
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
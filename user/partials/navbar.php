<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a href="index.php" class="navbar-brand">
            <img src="./assets/images/logo.png" width="55px" alt="Logo"/>
            <strong>AnkleBitter</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=categories" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=brands" class="nav-link">Brands</a>
                </li>
                <?php
                if (!isset($_SESSION['id_customer'])) {
                    echo '<li class="nav-item">
                            <a href="index.php?page=register" class="nav-link">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=login" class="btn btn-success nav-link px-4 text-white">Sign In</a>
                        </li>';
                    }
                ?>

            </ul>

            <?php
                if (isset($_SESSION['id_customer'])) {
                    $id = $_SESSION['id_customer'];
                    $sql = "SELECT `nama` FROM `user` WHERE `id_user`='$id'";
                    $query = mysqli_query($koneksi, $sql);
                    while ($data = mysqli_fetch_row($query)) {
                        $nama = $data[0];
                    }

                    echo '<ul class="navbar-nav d-none d-lg-flex">
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                                    <img src="./assets/images/icon-user.png" alt="" width="40px" class="rounded-circle mr-2 profile-picture"/>
                                    Hi, ' . $nama . '
                                </a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Dashboard</a>
                                    <a href="#" class="dropdown-item">Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="index.php?page=logout">
                                        Logout
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link d-inline-block mt-2">
                                    <!--                        <img src="./assets/images/icon-cart-filled.svg" alt=""/>-->
                                    <div class="card-badge">0</div>
                                    <img src="./assets/images/icon-cart-empty.svg" alt=""/>
                                </a>
                            </li>
                        </ul>';
                }
            ?>


<!--            <ul class="navbar-nav d-block d-lg-none">-->
<!--                <li class="nav-item">-->
<!--                    <a href="#" class="nav-link">-->
<!--                        Hi, Rully Afrizal Alwin-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a href="#" class="nav-link d-inline-block">-->
<!--                        Cart-->
<!--                    </a>-->
<!--                </li>-->
<!--            </ul>-->

        </div>
    </div>
</nav>

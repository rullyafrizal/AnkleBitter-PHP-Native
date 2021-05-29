<div class="page-content page-details">
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Product Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_GET['data'])) {
        $id = $_GET['data'];

        $sql_p = "SELECT `id_produk`, `title`, `deskripsi`, `harga`, `stok` FROM `produk` WHERE `id_produk`='$id'";

        $query_p = mysqli_query($koneksi, $sql_p);

        while ($data = mysqli_fetch_row($query_p)) {
            $id_produk = $data[0];
            $title = $data[1];
            $deskripsi = $data[2];
            $harga = $data[3];
            $stok = $data[4];
        }

    }
    ?>
    <section class="store-gallery mb-3" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" data-aos="zoom-in">
                    <transition name="slide-fade" mode="out-in">
                        <img src="./assets/images/contoh_vans.jpg" class="w-100 main-image" alt=""/>
                    </transition>
                </div>
                <!--                <div class="col-lg-2">-->
                <!--                    <div class="row">-->
                <!--                        <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id" data-aos="zoom-in" data-aos-delay="100">-->
                <!--                            <a href="#" @click="changeActive(index)">-->
                <!--                                <img :src="photo.url" class="w-100 thumbnail-image" :class="{ active: index == activePhoto }" alt=""-->
                <!--                                />-->
                <!--                            </a>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
            </div>
        </div>
    </section>

    <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h1><?php echo $title; ?></h1>
                        <div class="owner">Stock : <?php echo $stok; ?></div>
                        <div class="price">Rp <?php echo $harga; ?></div>
                    </div>
                    <div class="col-lg-2" data-aos="zoom-in">
                        <?php
                            if (isset($_SESSION['id_customer'])) {
                                if ((int)$stok > 0) {
                                    echo '<form action="" method="POST" enctype="multipart/form-data">
                                            <button type="submit" class="btn btn-success px-4 text-white btn-block mb-3">
                                                Add to Cart
                                            </button>
                                        </form>';
                                } else {
                                    echo '<button type="submit" class="btn btn-success disabled px-4 text-white btn-block mb-3">
                                                Stok Kosong
                                            </button>';


                                }

                            } else {
                                echo '<a href="index.php?page=login" class="btn btn-success px-4 text-white btn-block mb-3">
                                            Sign in to Add
                                        </a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="store-description">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <?php echo $deskripsi; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
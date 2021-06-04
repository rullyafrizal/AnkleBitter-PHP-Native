<?php
    $id_cust = $_SESSION['id_customer'];
?>
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Transactions</h2>
            <p class="dashboard-subtitle">
                Big result start from the small one
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12 mt-2">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                                Transaction History
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <?php
                                $sql = "SELECT `o`.`id_order`, `o`.`ordered_at`, `bo`.`id_produk`, `p`.`nama`, `p`.`gambar`, `o`.`status`, `bo`.`id_barang_order`
                                        FROM `order` `o`
                                        JOIN `barang_order` `bo` ON `bo`.`id_order`=`o`.`id_order`
                                        JOIN `produk` `p` ON `p`.`id_produk`=`bo`.`id_produk`
                                        WHERE `id_customer`='$id_cust' ORDER BY `id_order` DESC";
                                $query = mysqli_query($koneksi, $sql);
                                while ($data = mysqli_fetch_row($query)) {
                                    $id_order = $data[0];
                                    $ordered_at = $data[1];
                                    $id_produk = $data[2];
                                    $nama_produk = $data[3];
                                    $gambar = $data[4];
                                    $status = $data[5];
                                    $id_bo = $data[6];
                                    ?>
                                    <a href="dashboard.php?page=transaction-details&data=<?= $id_bo;?>" class="card card-list d-block">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <img src="../admin/foto/produk/<?= $gambar;?>" class="w-100"/>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php echo $nama_produk;?>
                                                </div>
                                                <div class="col-md-3 text-danger">
                                                    <?php echo $status;?>
                                                </div>
                                                <div class="col-md-3">
                                                    <?php echo $ordered_at;?>
                                                </div>
                                                <div class="col-md-1 d-none d-md-block">
                                                    <img src="./assets/images/dashboard-arrow-right.svg" alt=""/>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

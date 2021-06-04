<?php
    if (isset($_GET['data'])) {
        ?>
        <?php
            $id_bo = $_GET['data'];
            $sql = "SELECT `bo`.`harga`, `p`.`nama`, `o`.`penerima`, `o`.`status`, 
                    `o`.`alamat_pengiriman`, `o`.`telepon_penerima`, `c`.`nama`, 
                    `c`.`nomor_telepon`, `o`.`ordered_at`, `o`.`id_order`, `o`.`catatan`,
                    `p`.`gambar`
                    FROM `barang_order` `bo`
                    JOIN `produk` `p` ON `bo`.`id_produk`=`p`.`id_produk`
                    JOIN `order` `o` ON `bo`.`id_order`=`o`.`id_order`
                    JOIN `customer` `c` ON `o`.`id_customer`=`c`.`id_customer`
                    WHERE `id_barang_order`='$id_bo'";
            $query = mysqli_query($koneksi, $sql);
            while($data = mysqli_fetch_row($query)) {
                $harga = $data[0];
                $nama_produk = $data[1];
                $penerima = $data[2];
                $status = $data[3];
                $alamat_pengiriman = $data[4];
                $telepon_penerima = $data[5];
                $nama_cust = $data[6];
                $telepon_cust = $data[7];
                $ordered_at = $data[8];
                $id_order = $data[9];
                $catatan = $data[10];
                $gambar_produk = $data[11];
            }


        ?>
        <!-- Section Content -->
        <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
                <div class="dashboard-heading">
                    <h2 class="dashboard-title">#TRX - <?= $id_order; ?></h2>
                    <p class="dashboard-subtitle">
                        Transactions Details
                    </p>
                </div>
                <div class="dashboard-content" id="transactionDetails">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <img src="../admin/foto/produk/<?= $gambar_produk;?>" class="w-100 mb-3" alt=""/>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Customer Name</div>
                                                    <div class="product-subtitle"><?= $nama_cust; ?></div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Product Name</div>
                                                    <div class="product-subtitle">
                                                        <?= $nama_produk; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">
                                                        Date of Transaction
                                                    </div>
                                                    <div class="product-subtitle">
                                                        <?= $ordered_at; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Payment Status</div>
                                                    <div class="product-subtitle text-danger">
                                                        <?= $status; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">
                                                        Price Amount
                                                    </div>
                                                    <div class="product-subtitle">
                                                        <?php echo 'Rp'. number_format($harga, 0, ",", "."); ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">
                                                        Customer Mobile
                                                    </div>
                                                    <div class="product-subtitle">
                                                        <?= $telepon_cust; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-4">
                                            <h5>Shipping Information</h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Recipient</div>
                                                    <div class="product-subtitle">
                                                        <?= $penerima; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Address</div>
                                                    <div class="product-subtitle">
                                                        <?= $alamat_pengiriman; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Recipient Mobile</div>
                                                    <div class="product-subtitle"><?= $telepon_penerima; ?></div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="product-title">Transaction Notes</div>
                                                    <?php
                                                        if(!empty($catatan)) {
                                                            echo '<div class="product-subtitle">' . $catatan . '</div>';
                                                        } else {
                                                            echo '<div class="product-subtitle">-</div>';
                                                        }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        if($status === 'Menunggu Bukti Pembayaran') {
                                            ?>
                                            <div class="row mt-4">
                                                <div class="col-12 text-right">
                                                    <a href="index.php?page=confirm-payment&data=<?= $id_order?>" class="btn btn-success btn-lg mt-4">
                                                        Konfirmasi Pembayaran
                                                    </a>
                                                </div>
                                            </div>
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
        <?php
    } else {
        header('Location:dashboard.php?page=transactions');
    }
?>


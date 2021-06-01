<?php
    if (isset($_GET['aksi'])) {
        if ($_GET['aksi'] === 'hapus') {
            $id = $_GET['data'];
            $sql_delete = "DELETE FROM `keranjang_belanja` WHERE `id_keranjang_belanja`='$id'";
            mysqli_query($koneksi, $sql_delete);
            header('Location:index.php?page=cart');
        }
    }
?>
<div class="page-content page-cart">
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
                                Cart
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="store-cart">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-12 table-responsive">
                    <table class="table table-borderless table-cart">
                        <thead>
                        <tr>
                            <td>Image</td>
                            <td>Product Name</td>
                            <td>Price</td>
                            <td>Menu</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            if (isset($_SESSION['id_customer'])) {
                                $id_customer = $_SESSION['id_customer'];
                                $sql = "SELECT `c`.`id_keranjang_belanja`, `c`.`id_customer`, `c`.`id_produk`, `p`.`nama`, `p`.`gambar`, `p`.`harga`, `p`.`stok`
                                        FROM `keranjang_belanja` `c` JOIN `produk` `p` ON `c`.`id_produk`=`p`.`id_produk`
                                        WHERE `id_customer`='$id_customer'";
                                $query = mysqli_query($koneksi, $sql);

                                while ($data = mysqli_fetch_row($query)) {
                                    $id_cart = $data[0];
                                    $id_cust = $data[1];
                                    $id_produk = $data[2];
                                    $nama_produk = $data[3];
                                    $gambar_produk = $data[4];
                                    $harga = $data[5];
                                    $stok = $data[6];
                                    echo '<tr>
                                        <td style="width: 20%;">
                                            <img src="https://dummyimage.com/16:9x1080" alt="" class="cart-image"/>
                                        </td>
                                        <td style="width: 45%;">
                                            <div class="product-title">' . $nama_produk . '</div>
                                            <div class="product-subtitle">Stock : ' . $stok . '</div>
                                        </td>
                                        <td style="width: 25%;">
                                            <div class="product-title">Rp ' . $harga . '</div>
                                            <div class="product-subtitle">IDR</div>
                                        </td>
                                        <td style="width: 20%;">
                                            <form action="index.php?page=cart&aksi=hapus&data=' . $id_cart . '" method="POST">
                                                <button class="btn btn-remove-cart" type="submit">
                                                    Remove
                                                </button>
                                            </form>
                                        </td>
                                    </tr>';
                                }
                            }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                    <hr />
                </div>
                <div class="col-12">
                    <h2 class="mb-4">Shipping Details</h2>
                </div>
            </div>
            <form action="index.php?page=konfirmasi-checkout" method="POST" enctype="multipart/form-data">
                <?php
                    $sql_cust = "SELECT * FROM `customer` WHERE `id_customer`='$id_customer'";
                    $query_cust = mysqli_query($koneksi, $sql_cust);

                    while ($data_cust = mysqli_fetch_row($query_cust)) {
                        $id_cust = $data_cust[0];
                        $nama = $data_cust[1];
                        $alamat = $data_cust[2];
                        $kodepos = $data_cust[3];
                        $telepon = $data_cust[4];
                        $id_user = $data_cust[5];
                    }
                ?>
                <div class="row mb-2" data-aos="fade-up" data-aos-delay="200" id="locations">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient">Recipient</label>
                            <input type="text" class="form-control" id="recipient" value="<?php echo $nama ?>" required name="penerima"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address_one">Address</label>
                            <input type="text" class="form-control" id="address_one" value="<?php echo $alamat ?>" required name="address"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kodepos">Postal Code</label>
                            <input type="text" class="form-control" id=kodepos" value="<?php echo $kodepos ?>" required name="kodepos"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Mobile</label>
                            <input type="text" class="form-control" id="phone_number" value="<?php echo $telepon ?>" required name="phone_number"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <input type="text" class="form-control" id="catatan" name="catatan"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rekening">Silahkan Pilih Rekening Pembayaran</label>
                            <select name="rekening" class="form-control" id="rekening">
                                <?php
                                    $sql_rek = "SELECT * FROM `rekening_pembayaran`";
                                    $query_rek = mysqli_query($koneksi, $sql_rek);
                                    while($data_rek = mysqli_fetch_row($query_rek)) {
                                        $id_rek = $data_rek[0];
                                        $nama_rek = $data_rek[1];
                                        $bank = $data_rek[2];
                                        $nomor_rek = $data_rek[3];
                                        $display = $nomor_rek . ' - ' . $nama_rek . ' (' . $bank . ')';

                                        echo '<option value="' . $id_rek . '">' . $display . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-1">Payment Informations</h2>
                    </div>
                </div>

                <?php
                    $sql_i = "SELECT SUM(`p`.`harga`) FROM `keranjang_belanja` `k` 
                                JOIN `produk` `p` ON `k`.`id_produk`=`p`.`id_produk`
                                WHERE `id_customer`='$id_customer'";

                    $query_i = mysqli_query($koneksi, $sql_i);
                    while($data_i = mysqli_fetch_row($query_i)) {
                        $total = $data_i[0];
                    }

                    $ppn = 0;
                    if ($total > 0) {
                        $ppn = 10 / 100 * $total;
                        $total_price = $total + $ppn + 19000;
                    } else {
                        $total_price = 0;
                    }

                    $kode_unik = rand(100, 500);
                    $total_order = $total_price - $kode_unik;
                ?>
                <input type="hidden" name="total_order" value="<?php echo $total_order;?>">
                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-4 col-md-2">
                        <div class="product-title">Rp <?php echo $ppn; ?></div>
                        <div class="product-subtitle">PPN Tax</div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="product-title">Rp 19000</div>
                        <div class="product-subtitle">Ship to Everywhere</div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="product-title text-success">Rp <?php echo $total_price; ?></div>
                        <div class="product-subtitle">Total</div>
                    </div>
                    <?php
                        if ($total_price > 0) {
                            ?>
                            <div class="col-8 col-md-3">
                                <button name="checkout" type="submit" class="btn btn-success mt-4 px-4 btn-block">
                                    Checkout Now
                                </button>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="col-8 col-md-3">
                                <button disabled type="submit" class="btn btn-success mt-4 px-4 btn-block">
                                    Checkout Now
                                </button>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </form>
        </div>
    </section>
</div>

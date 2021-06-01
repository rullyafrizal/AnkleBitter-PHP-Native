<?php
    if (isset($_GET['data'])) {
        $id = $_GET['data'];
        $sql = "SELECT `total_harga`, `id_rekening_pembayaran` FROM `order` WHERE `id_order`='$id'";
        $query = mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_row($query)) {
            $total_harga = $data[0];
            $id_rek = $data[1];
        }

        $sql_rek = "SELECT * FROM `rekening_pembayaran` WHERE `id_rekening_pembayaran`='$id_rek'";
        $query_rek = mysqli_query($koneksi, $sql_rek);
        while ($data_rek = mysqli_fetch_row($query_rek)) {
            $id_rek = $data_rek[0];
            $nama_rek = $data_rek[1];
            $bank = $data_rek[2];
            $nomor_rek = $data_rek[3];
            $display = $nomor_rek . ' - ' . $nama_rek . ' (' . $bank . ')';
        }
    }
?>

<div class="page-content page-home">
    <div class="store-new-products">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center pt-5" data-aos="fade-up" data-aos-delay="100">
                    <img src="./assets/images/success.svg" width="200px" alt="">
                </div>
                <div class="col-12 text-center pt-5" data-aos="fade-up" data-aos-delay="100">
                    <h3>
                        Checkout Berhasil
                    </h3>
                </div>
                <div class="col-12 text-center pt-3" data-aos="fade-up" data-aos-delay="100">
                    Silahkan transfer pembayaran sejumlah <b class="text-success"><?= $total_harga; ?></b> ke :
                </div>
                <div class="col-12 text-center pt-3" data-aos="fade-up" data-aos-delay="100">
                    <ul>
                        <li><b><?= $display; ?></b></li>
                    </ul>
                </div>
                <div class="col-12 text-center pb-5 pt-2" data-aos="fade-up" data-aos-delay="100">
                    <button type="submit" class="btn btn-success mt-4 px-4 btn-block">
                        Konfirmasi Pembayaran
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

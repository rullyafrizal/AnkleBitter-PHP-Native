<?php

if (isset($_POST['checkout'])) {
    $penerima = $_POST['penerima'];
    $address = $_POST['address'];
    $kodepos = $_POST['kodepos'];
    $telepon = $_POST['phone_number'];
    $total = $_POST['total_order'];
    $id_cust = $_SESSION['id_customer'];
    $id_rek = $_POST['rekening'];

    $alamat = $address . ' kodepos: ' . $kodepos;

    $catatan = "";
    if (!empty($_POST['catatan'])) {
        $catatan = $_POST['catatan'];
    }


    //menggunakan prinsip database transaction
    mysqli_begin_transaction($koneksi);
    try {
        $sql = "INSERT INTO `order` (`penerima`, `alamat_pengiriman`, `total_harga`, `telepon_penerima`, `catatan`, `id_rekening_pembayaran`, `id_customer`)
            VALUES ('$penerima', '$alamat', '$total', '$telepon', '$catatan', '$id_rek', '$id_cust')";
        mysqli_query($koneksi, $sql);


        $sql_order = "SELECT `id_order` FROM `order` WHERE `id_customer`='$id_cust' ORDER BY `id_order` DESC LIMIT 1";
        $query_order = mysqli_query($koneksi, $sql_order);
        while ($data_order = mysqli_fetch_row($query_order)) {
            $id_order = $data_order[0];
        }

        $sql_cart = "SELECT `c`.`id_produk`, `p`.`harga` FROM `keranjang_belanja` `c` 
                        JOIN `produk` `p` ON `c`.`id_produk`=`p`.`id_produk`
                        WHERE `id_customer`='$id_cust'";
        $query_cart = mysqli_query($koneksi, $sql_cart);
        while ($data_cart = mysqli_fetch_row($query_cart)) {
            $id_produk[] = $data_cart[0];
            $harga[] = $data_cart[1];
        }

        for ($i = 0; $i < count($id_produk); $i++) {
            $sql_item = "INSERT INTO `barang_order` (`id_produk`, `id_order`, `harga`) 
                        VALUES ('$id_produk[$i]', '$id_order', '$harga[$i]')";
            mysqli_query($koneksi, $sql_item);
        }

        $sql_cart1 = "SELECT DISTINCT(`id_produk`) FROM `keranjang_belanja` WHERE `id_customer`='5'";
        $query_cart = mysqli_query($koneksi, $sql_cart1);
        $i = 0;
        while ($data_cart = mysqli_fetch_row($query_cart)) {
            $id_product[] = $data_cart[0];
        }

        for($i = 0; $i < count($id_produk); $i++) {
            $sql_stok = "SELECT COUNT(`id_produk`) FROM `keranjang_belanja` WHERE `id_produk`='$id_produk[$i]'";
            $query_stok = mysqli_query($koneksi, $sql_stok);
            while ($data_stok = mysqli_fetch_row($query_stok)) {
                $stok[] = $data_stok[0];
            }
        }

        for ($i = 0; $i < count($id_product); $i++) {
            $sql_update_stok = "UPDATE `produk` 
                                SET `stok`=`stok`-'$stok[$i]'
                                WHERE `id_produk`='$id_product[$i]'";
            mysqli_query($koneksi, $sql_update_stok);
        }

        $sql_delete_cart = "DELETE FROM `keranjang_belanja` WHERE `id_customer`='$id_cust'";
        mysqli_query($koneksi, $sql_delete_cart);

        mysqli_commit($koneksi);

        header('Location:index.php?page=checkout&data=' . $id_order);
    } catch (mysqli_sql_exception $exception) {
        mysqli_rollback($koneksi);
        throw $exception;
    }

}
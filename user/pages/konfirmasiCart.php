<?php
if (isset($_POST['insert_cart'])) {
    $id_produk = $_POST['id_product'];
    $id_cust = $_SESSION['id_customer'];

    $sql = "INSERT INTO `keranjang_belanja`(`id_customer`, `id_produk`)
            VALUES ('$id_cust', '$id_produk')";
    $query = mysqli_query($koneksi, $sql);
    header('Location:index.php?page=product&data=' . $id_produk);
}

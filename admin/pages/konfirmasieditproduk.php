<?php
if (isset($_SESSION['id_produk'])) {
    $id_produk = $_SESSION['id_produk'];
    $title = $_POST['title'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $produk = $_POST['kategori_produk'];
    $brand = $_POST['brand'];

    if (empty($title)) {
        header("Location:index.php?pages=editproduk&data=$id_produk&notif=editkosong&jenis=title");
    } else if (empty($nama)) {
        header("Location:index.php?pages=editproduk&data=$id_produk&notif=editkosong&jenis=nama");
    } else if (empty($deskripsi)) {
        header("Location:index.php?pages=editproduk&data=$id_produk&notif=editkosong&jenis=deskripsi");
    } else if (empty($harga)) {
        header("Location:index.php?pages=editproduk&data=$id_produk&notif=editkosong&jenis=harga");
    } else if (empty($stok)) {
        header("Location:index.php?pages=editproduk&data=$id_produk&notif=editkosong&jenis=stok");
    } else if (empty($produk)) {
        header("Location:index.php?pages=editproduk&data=$id_produk&notif=editkosong&jenis=kategori");
    } else if (empty($brand)) {
        header("Location:index.php?pages=editproduk&data=$id_produk&notif=editkosong&jenis=brand");
    } else {
        $sql = "UPDATE `produk` SET `title`='$title', `nama`='$nama',`deskripsi`='$deskripsi',`harga`='$harga',`stok`='$stok', `id_kategori_produk`='$produk', `id_brand_produk`='$brand'
     WHERE `id_produk`='$id_produk'";
        mysqli_query($koneksi, $sql);
        header("Location:index.php?pages=produk&notif=editberhasil");
    }
}
?>

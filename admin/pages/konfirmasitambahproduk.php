<?php
$id_user = $_SESSION['id_user'];
$title = $_POST['title'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$produk = $_POST['kategori_produk'];
$brand = $_POST['brand'];
$lokasi_file = $_FILES['gambar']['tmp_name'];
$nama_file = $_FILES['gambar']['name'];
$direktori = 'foto/produk/' . $nama_file;

if (empty($title)) {
    header("Location:index.php?pages=tambahproduk&notif=tambahkosong&jenis=title");
} else if (empty($nama)) {
    header("Location:index.php?pages=tambahproduk&notif=tambahkosong&jenis=nama");
} else if (empty($deskripsi)) {
    header("Location:index.php?pages=tambahproduk&notif=tambahkosong&jenis=deskripsi");
} else if (empty($harga)) {
    header("Location:index.php?pages=tambahproduk&notif=tambahkosong&jenis=harga");
} else if(!move_uploaded_file($lokasi_file,$direktori)){
    header("Location:index.php?include=tambahbuku&notif=tambahkosong&jenis=gambar");
} else if (empty($stok)) {
    header("Location:index.php?pages=tambahproduk&notif=tambahkosong&jenis=stok");
} else if (empty($produk)) {
    header("Location:index.php?pages=tambahproduk&notif=tambahkosong&jenis=produk");
} else if (empty($brand)) {
    header("Location:index.php?pages=tambahproduk&notif=tambahkosong&jenis=brand");
} else {
    $sql = "INSERT INTO `produk`(`title`,`nama`,`deskripsi`,`harga`,`stok`, `gambar`,
           `id_kategori_produk`, `id_brand_produk`, `user_id`) 
            VALUES ('$title','$nama','$deskripsi','$harga','$stok', '$nama_file', '$produk', '$brand', '$id_user')";
    mysqli_query($koneksi, $sql);
    header("Location:index.php?pages=produk&notif=tambahberhasil");
}

<?php
$title = $_POST['title'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$produk = $_POST['kategori_produk'];
$brand = $_POST['brand'];

if(empty($title)){
header("Location:index.php?pages=tambahproduk&notif=tambahkosong&jenis=title");
}else if(empty($nama)){
header("Location:index.php?pages=tambahproduk&notif=tambahkosong&jenis=nama");
}else if(empty($deskripsi)){
    header("Location:index.php?pages=tambahproduk&notif=tambahkosong&jenis=deskripsi");
}else if(empty($harga)){
    header("Location:index.php?pages=tambahproduk&notif=tambahkosong&jenis=harga");
}else if(empty($stok)){
    header("Location:index.php?pages=tambahproduk&notif=tambahkosong&jenis=stok");
}else if(empty($produk)){
    header("Location:index.php?pages=tambahproduk&notif=tambahkosong&jenis=produk");
}else if(empty($brand)){
    header("Location:index.php?pages=tambahproduk&notif=tambahkosong&jenis=brand");
}else{
$sql = "INSERT INTO `produk`(`title`,`nama`,`deskripsi`,`harga`,`stok`, `id_kategori_produk`, `id_brand_produk`) 
VALUES ('$title','$nama','$deskripsi','$harga','$stok', '$produk', '$brand')";
mysqli_query($koneksi,$sql);
header("Location:index.php?pages=produk&notif=tambahberhasil");
}
?>
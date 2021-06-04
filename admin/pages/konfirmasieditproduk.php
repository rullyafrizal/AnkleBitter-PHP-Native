<?php
if (isset($_SESSION['id_produk'])) {
    $id_produk = $_SESSION['id_produk'];
    // $id_kategori = $_SESSION['id_kat'];
    // $id_brando = $_SESSION['id_brand'];
    //get gambar
    $sql_f = "SELECT `gambar` FROM `produk` WHERE `id_produk`='$id_produk'";
    $query_f = mysqli_query($koneksi, $sql_f);
    while ($data_f = mysqli_fetch_row($query_f)) {
        $gambar = $data_f[0];
        //echo $gambar;
    }
    $title = $_POST['title'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $produk = $_POST['kategori_produk'];
    $brand = $_POST['brand'];
    $masuk = $_POST['masuk'];
    $update = $_POST['update'];

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
        $lokasi_file = $_FILES['gambar']['tmp_name'];
        $nama_file = $_FILES['gambar']['name'];
        $direktori = 'foto/produk/' . $nama_file;
        if (move_uploaded_file($lokasi_file, $direktori)) {
            if (!empty($gambar)) {
                unlink("foto/$gambar");
            }
            $sql = "UPDATE `produk` SET `title`='$title', `nama`='$nama',`deskripsi`='$deskripsi',
            `harga`='$harga',`stok`='$stok', `gambar`='$nama_file', `created_at`='$masuk', `updated_at`='$update', 
            `id_kategori_produk`='$produk', `id_brand_produk`='$brand' WHERE `id_produk`='$id_produk'";
             mysqli_query($koneksi, $sql);
            //echo $sql;
            
        } else {
            $sql = "UPDATE `produk` SET `title`='$title', `nama`='$nama',`deskripsi`='$deskripsi',
            `harga`='$harga',`stok`='$stok', `created_at`='$masuk', `updated_at`='$update',
            `id_kategori_produk`='$produk', `id_brand_produk`='$brand' WHERE `id_produk`='$id_produk'";
             mysqli_query($koneksi, $sql); 
            //echo $sql;
        }
         header("Location:index.php?pages=produk&notif=editberhasil");
    }
}
?>
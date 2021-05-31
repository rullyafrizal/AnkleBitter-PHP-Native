<?php
if (isset($_SESSION['id_order'])) {
    $id_order = $_SESSION['id_order'];
    $id_rek = $_SESSION['id_rek'];
    $id_customer = $_SESSION['id_customer'];
    $customer = $_POST['customer'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $harga = $_POST['harga'];
    //$resi = $_POST['resi'];
    $catatan = $_POST['catatan'];
    $rek = $_POST['rek'];
    $nama_file = $_FILES['resi']['name'];
    $direktori = 'foto/resi/' . $nama_file;
    //get cover
    $sql_f = "SELECT `resi_pengiriman` FROM `order` WHERE `id_order`='$id_order'";
    $query_f = mysqli_query($koneksi, $sql_f);
    while ($data_f = mysqli_fetch_row($query_f)) {
        $resi = $data_f[0];
        // echo $foto;
    }

    if (empty($status)) {
        header("Location:index.php?pages=editorder&data=$id_order&notif=editkosong&jenis=Status");
    } else {
        $lokasi_file = $_FILES['resi']['tmp_name'];
        $nama_file = $_FILES['resi']['name'];
        $direktori = 'foto/resi/' . $nama_file;
        if (move_uploaded_file($lokasi_file, $direktori)) {
            if (!empty($resi)) {
                unlink("foto/resi/$resi");
            }
            $sql = "update `order` set `ordered_at`='$tanggal', `alamat_pengiriman`='$alamat',
            `status`='$status',`total_harga`='$harga',`resi_pengiriman`='$nama_file', `catatan`='$catatan',
            `id_rekening_pembayaran`='$id_rek', `id_customer`='$id_customer' where `id_order`='$id_order'";
            mysqli_query($koneksi, $sql);
        } else {
            $sql = "update `order` set `ordered_at`='$tanggal', `alamat_pengiriman`='$alamat',
            `status`='$status',`total_harga`='$harga', `catatan`='$catatan', `id_rekening_pembayaran`='$id_rek', 
            `id_customer`='$id_customer' where `id_order`='$id_order'";
            mysqli_query($koneksi, $sql);
        }
         header("Location:index.php?pages=order&notif=editberhasil");
    }
}

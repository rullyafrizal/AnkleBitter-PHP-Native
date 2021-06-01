<?php
if (isset($_POST['cf_payment'])) {
    $id_order = $_POST['id_order'];
    $nomor_rek = $_POST['nomor_rekening'];
    $nama_rek = $_POST['nama_rekening'];
    $bank = $_POST['bank'];
    $nama_file = $id_order . '_' . $nama_rek . '_' . $_FILES['bukti_bayar']['name'];
    $loc_file = $_FILES['bukti_bayar']['tmp_name'];
    $direktori = 'assets/images/bukti_bayar/' . $nama_file;
    move_uploaded_file($loc_file, $direktori);

    $sql = "INSERT INTO `bukti_pembayaran` (`nomor_rekening_customer`, `nama_rekening_customer`, `bank`, `foto`, `id_order`)
            VALUES ('$nomor_rek', '$nama_rek', '$bank', '$nama_file', '$id_order')";
    mysqli_query($koneksi, $sql);

    $sql_status = "UPDATE `order` SET `status`='Pembayaran Diverifikasi' WHERE `id_order`='$id_order'";
    mysqli_query($koneksi, $sql_status);

    header('Location:index.php?page=confirm-payment&data=' . $id_order . '&notif=success');
}

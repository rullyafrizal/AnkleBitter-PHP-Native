<?php
if(isset($_POST['edit_account'])) {
    $name = $_POST['name'];
    $alamat = $_POST['address'];
    $telepon = $_POST['phone_number'];
    $kodepos = $_POST['zip_code'];
    $id_cust = $_SESSION['id_customer'];

    $sql = "UPDATE `customer` SET `nama`='$name', `alamat`='$alamat', 
          `kode_pos`='$kodepos', `nomor_telepon`='$telepon'
          WHERE `id_customer`='$id_cust'";
    mysqli_query($koneksi, $sql);

    header('Location:dashboard.php?page=account&notif=editsuccess');
}

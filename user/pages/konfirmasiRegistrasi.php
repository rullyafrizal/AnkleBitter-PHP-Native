<?php
if (isset($_POST['register'])) {
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $password = MD5($_POST['password']);

    $sql = "SELECT `email` FROM `user` WHERE `email`='$email'";
    $query = mysqli_query($koneksi, $sql);
    $jumlah = mysqli_num_rows($query);

    if ($jumlah > 0) {
        header("Location:index.php?page=register&gagal=emailNotUnique");
    } else {
        $sql_r = "INSERT INTO `user` (`nama`, `email`, `password`, `role`)
                    VALUES  ('$nama', '$email', '$password', 'customer')";
        $query_r = mysqli_query($koneksi, $sql_r);




        // auto-login setelah registrasi
        $sql_l = "select `id_user`, `role` from `user` where `email`='$email' and `password`='$password'";
        $query_l = mysqli_query($koneksi, $sql_l);


        while ($data = mysqli_fetch_row($query_l)) {
            $id_user = $data[0];
            $role = $data[1];
        }
        $_SESSION['id_user'] = $id_user;
        $_SESSION['role'] = $role;

        //memasukkan user ke tabel customer
        $sql_c = "INSERT INTO `customer` (`nama`, `id_user`) 
                    VALUES ('$nama', '$id_user')";
        $query_c = mysqli_query($koneksi, $sql_c);


        header("Location:index.php");
    }
}
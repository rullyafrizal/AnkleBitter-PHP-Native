<?php
if (isset($_POST['login'])) {
    $emailAdd = $_POST['email'];
    $pass = $_POST['password'];
    $email = mysqli_real_escape_string($koneksi, $emailAdd);
    $password = mysqli_real_escape_string($koneksi, MD5($pass));
    //cek username dan password
    $sql = "select `id_user`, `role` from `user` where `email`='$email' and `password`='$password'";
    $query = mysqli_query($koneksi, $sql);
    $jumlah = mysqli_num_rows($query);
    if (empty($emailAdd)) {
        header("Location:index.php?page=login&gagal=emailkosong&jenis=email");
    } else if (empty($pass)) {
        header("Location:index.php?page=login&gagal=passwordkosong&jenis=password");
    } else if ($jumlah == 0) {
        header("Location:index.php?page=login&gagal=emailpasssalah&jenis=emailpassword");
    } else {
    //get data
        while ($data = mysqli_fetch_row($query)) {
            $id_user = $data[0];
            $role = $data[1];
            $_SESSION['id_user'] = $id_user;
            $_SESSION['role'] = $role;
            header("Location:index.php");
        }
    }
}

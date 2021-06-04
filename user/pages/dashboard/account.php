<?php
    $id_cust = $_SESSION['id_customer'];

    $sql_cust = "SELECT `c`.`nama`, `c`.`alamat`, `c`.`kode_pos`, `c`.`nomor_telepon`, `u`.`email`   
                FROM `customer` `c` JOIN `user` `u` ON `c`.`id_user`=`u`.`id_user` 
                WHERE `id_customer`='$id_cust'";
    $query_customer = mysqli_query($koneksi, $sql_cust);
    while ($data_cust = mysqli_fetch_row($query_customer)) {
        $nama = $data_cust[0];
        $alamat = $data_cust[1];
        $kodepos = $data_cust[2];
        $telepon = $data_cust[3];
        $email = $data_cust[4];
    }
?>

<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">My Account</h2>
            <p class="dashboard-subtitle">
                Update your current profile
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <form id="locations" action="dashboard.php?page=konfirmasi-edit-akun" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <?php
                                if(isset($_GET['notif'])) {
                                    if($_GET['notif'] === 'editsuccess') {
                                        echo '<span class="badge badge-success">Account Updated Successfully</span>';
                                    }
                                }
                            ?>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Your Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?= $nama; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Your Email</label>
                                            <input readonly type="email" class="form-control" id="email" name="email" value="<?= $email; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address_one" name="address" value="<?= $alamat; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_number">Mobile</label>
                                            <input type="number" class="form-control" id="phone_number" name="phone_number" value="<?= $telepon; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zip_code">Postal Code</label>
                                            <input type="number" class="form-control" id="zip_code" name="zip_code" value="<?= $kodepos; ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" name="edit_account" class="btn btn-success px-5">
                                            Save Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

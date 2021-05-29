<div class="page-content page-auth">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center row-login">
                <div class="col-lg-6 text-center">
                    <img src="./assets/images/login-placeholder.png" alt="" class="w-50 mb-3 mb-lg-none"/>
                </div>
                <div class="col-lg-5">
                    <h2>Sneakers and Apparel <br />
                        The Best Shitt for the Best Price
                    </h2>
                    <form method="POST" action="index.php?page=konfirmasi-login" class="mt-3">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input id="email" type="email" class="form-control w-75 <?php if(!empty($_GET['gagal'])) {echo 'is-invalid';}?>" name="email" value="" required autocomplete="email" autofocus>

                            <?php
                                if (!empty($_GET['gagal'])) {
                                   $gagal = $_GET['gagal'];
                                   if($_GET['jenis'] === 'emailpassword') {
                                       if ($gagal === 'emailpasssalah') {
                                           echo '<span class="invalid-feedback" role="alert">
                                                <strong>These Credentials Does not Match our Records</strong>
                                            </span>';
                                       }
                                   } else if ($_GET['jenis'] === 'email') {
                                       if ($gagal === 'emailkosong') {
                                           echo '<span class="invalid-feedback" role="alert">
                                                <strong>Silahkan isi email dengan benar</strong>
                                            </span>';
                                       }
                                   }
                                }
                            ?>

                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control w-75 <?php if(!empty($_GET['gagal'])) {echo 'is-invalid';}?>" name="password" required autocomplete="current-password">
                            <?php
                            if (!empty($_GET['gagal'])) {
                                $gagal = $_GET['gagal'];
                                 if ($gagal === 'passwordkosong') {
                                    echo '<span class="invalid-feedback" role="alert">
                                                <strong>Silahkan isi password dengan benar</strong>
                                            </span>';
                                }
                            }
                            ?>

                        </div>
                        <button type="submit" name="login" class="btn btn-success btn-block w-75 mt-4">
                            Sign In to My Account
                        </button>
                        <a href="index.php?page=register" class="btn btn-signup btn-block w-75 mt-2">
                            Sign Up
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

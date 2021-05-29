<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center justify-content-center row-login">
                <div class="col-lg-4">
                    <h2>Original Only <br />
                        Sneakers and Apparel
                    </h2>
                    <form class="mt-3" method="POST" action="index.php?page=konfirmasi-registrasi">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input id="name" type="text" class="form-control"
                                   name="name"  required autocomplete="name" autofocus>

                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input  id="email" type="email"
                                    class="form-control <?php if(!empty($_GET['gagal'])){ echo 'is-invalid';}?>"
                                    name="email" required autocomplete="email">
                            <?php
                            if (!empty($_GET['gagal'])) {
                                $gagal = $_GET['gagal'];
                                if ($gagal === 'emailNotUnique') {
                                    echo '<span class="invalid-feedback" role="alert">
                                                <strong>Email telah terdaftar di sistem kami</strong>
                                            </span>';
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password"
                                   class="form-control"
                                   name="password" required autocomplete="new-password">
                        </div>
                        <button type="submit" name="register" class="btn btn-success btn-block mt-4">
                            Sign Up Now
                        </button>
                        <a href="index.php?page=login" class="btn btn-signup btn-block mt-2">
                            Back to Sign In
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

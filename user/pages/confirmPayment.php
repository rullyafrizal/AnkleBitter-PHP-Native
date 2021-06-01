<?php
    if (isset($_GET['data'])) {
        $id = $_GET['data'];
    }
?>
<div class="page-content page-cart">
    <section class="store-cart">
        <div class="container pt-5">
            <?php
            if (isset($_GET['notif'])) {
                if ($_GET['notif'] === 'success') {
                    ?>
                    <div class="row">
                        <div class="col-12 text-center pt-5" data-aos="fade-up" data-aos-delay="100">
                            <img src="./assets/images/success.svg" width="200px" alt="">
                        </div>
                        <div class="col-12 text-center pt-5" data-aos="fade-up" data-aos-delay="100">
                            <h3>
                                Yayy, Konfirmasi Pembayaran Berhasil
                            </h3>
                        </div>
                        <div class="col-12 text-center pt-3" data-aos="fade-up" data-aos-delay="100">
                            Pesanan anda segera kami proses secepatnya, silahkan tunggu hingga pesanan sampai.
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-9 pb-5 pt-1" data-aos="fade-up" data-aos-delay="100">
                            <a href="#" class="btn btn-success mt-4 px-4 btn-block">
                                Lihat Status Pesanan
                            </a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                ?>
                <form action="index.php?page=konfirmasi-pembayaran" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $id; ?>" name="id_order">
                    <div class="row" data-aos="fade-down" data-aos-delay="200" id="locations">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor">Nomor Rekening <b style="color: red">*</b></label>
                                <input type="number" class="form-control" id="nomor" required name="nomor_rekening"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Atas Nama <b style="color: red">*</b></label>
                                <input type="text" class="form-control" id="nama" required name="nama_rekening"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bank">Bank <b style="color: red">*</b></label>
                                <select name="bank" required class="form-control" id="bank">
                                    <option selected="selected" value="" disabled >Choose Bank</option>
                                    <option value="Bank Mandiri">Bank Mandiri</option>
                                    <option value="Bank Bukopin">Bank Bukopin</option>
                                    <option value="Bank Danamon">Bank Danamon</option>
                                    <option value="Bank Mega">Bank Mega</option>
                                    <option value="Bank CIMB Niaga">Bank CIMB Niaga</option>
                                    <option value="Bank Permata">Bank Permata</option>
                                    <option value="Bank Sinarmas">Bank Sinarmas</option>
                                    <option value="Bank QNB">Bank QNB</option>
                                    <option value="Bank Lippo">Bank Lippo</option>
                                    <option value="Bank UOB">Bank UOB</option>
                                    <option value="Panin Bank">Panin Bank</option>
                                    <option value="Citibank">Citibank</option>
                                    <option value="Bank ANZ">Bank ANZ</option>
                                    <option value="Bank Commonwealth">Bank Commonwealth</option>
                                    <option value="Bank Maybank">Bank Maybank</option>
                                    <option value="Bank Maspion">Bank Maspion</option>
                                    <option value="Bank J Trust">Bank J Trust</option>
                                    <option value="Bank QNB">Bank QNB</option>
                                    <option value="Bank KEB Hana">Bank KEB Hana</option>
                                    <option value="Bank Artha Graha">Bank Artha Graha</option>
                                    <option value="Bank OCBC NISP">Bank OCBC NISP</option>
                                    <option value="Bank MNC">Bank MNC</option>
                                    <option value="Bank DBS">Bank DBS</option>
                                    <option value="BCA">BCA</option>
                                    <option value="BNI">BNI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="BTN">BTN</option>
                                    <option value="Bank DKI">Bank DKI</option>
                                    <option value="Bank BJB">Bank BJB</option>
                                    <option value="Bank BPD DIY">Bank BPD DIY</option>
                                    <option value="Bank Jateng">Bank Jateng</option>
                                    <option value="Bank Jatim">Bank Jatim</option>
                                    <option value="Bank BPD Bali">Bank BPD Bali</option>
                                    <option value="Bank Sumut">Bank Sumut</option>
                                    <option value="Bank Nagari">Bank Nagari</option>
                                    <option value="Bank Riau Kepri">Bank Riau Kepri</option>
                                    <option value="Bank Sumsel Babel">Bank Sumsel Babel</option>
                                    <option value="Bank Lampung">Bank Lampung</option>
                                    <option value="Bank Jambi">Bank Jambi</option>
                                    <option value="Bank Kalbar">Bank Kalbar</option>
                                    <option value="Bank Kalteng">Bank Kalteng</option>
                                    <option value="Bank Kalsel">Bank Kalsel</option>
                                    <option value="Bank Kaltim">Bank Kaltim</option>
                                    <option value="Bank Sulsel">Bank Sulsel</option>
                                    <option value="Bank Sultra">Bank Sultra</option>
                                    <option value="Bank BPD Sulteng">Bank BPD Sulteng</option>
                                    <option value="Bank Sulut">Bank Sulut</option>
                                    <option value="Bank NTB">Bank NTB</option>
                                    <option value="Bank NTT">Bank NTT</option>
                                    <option value="Bank Maluku">Bank Maluku</option>
                                    <option value="Bank Papua">Bank Papua</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bukti_pembayaran">Unggah Bukti Pembayaran <b style="color: red">*</b></label>
                                <input type="file" id="bukti_pembayaran" required name="bukti_bayar" accept="image/*"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" name="cf_payment" class="btn btn-success mt-4 px-4 btn-block">
                                    Konfirmasi Pembayaran
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
            }
            ?>
        </div>
    </section>
</div>

<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
                <div class="login-brand">
                    About M4S
                </div>

                <div class="card card-primary">
                    <div class="row m-0">
                        <div class="col-12 col-md-12 col-lg-5 p-0">
                            <div class="card-header text-center">
                                <h4>Contact Us</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="/message/kirim">
                                    <div class="form-group floating-addon">
                                        <label>Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="far fa-user"></i>
                                                </div>
                                            </div>
                                            <input readonly value="<?= user()->nama_lengkap; ?>" id="name" type="text" class="form-control" name="name" autofocus placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="form-group floating-addon">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <input readonly value="<?= user()->email; ?>" id="email" type="email" class="form-control" name="email" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control" placeholder="Type your message" data-height="150" name="pesan"></textarea>
                                    </div>

                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-round btn-lg btn-primary">
                                            Send Message
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-7 p-0">
                            <div class="card-header text-center">
                                <h4>About M4S</h4>
                            </div>
                            <div class="card-body">
                                <p><b>M4S</b> adalah salah satu website yang bersifat pribadi yang dibuat oleh <a href="https://www.instagram.com/marthinsalakory/" target="_blank">Marthin Alfreinsco Salakory</a>. Website ini walau bersifat pribadi, namun website ini dapat dijadikan sebagai penyimpan arsip pribadi milik, dan semua arsip yang anda simpan disini dijamin aman. <br>Website ini kedepannya akan dijadikan sebagai website untuk mengelola pemesanan, dan juga menampilkan hasil-hasil aplikasi yang dibuat sendiri oleh <a href="https://www.instagram.com/marthinsalakory/" target="_blank">Marthin Alfreinsco Salakory</a><br>Bagi yang ingin mengajukan pertanyaan, ataupun memesan Aplikasi berbasis Web, slahkan hubungi <a href="https://www.instagram.com/marthinsalakory/" target="_blank">Marthin Alfreinsco Salakory</a>, lewat kolom pesan disamping, ataupun dengan menggunakan media sosial yang tertera di bawah.</p>
                                <h4>Hubungi Marthin Alfreinsco Salakory</h4>

                                <a href="https://web.facebook.com/marthin.salakory.9/" target="_blank"><img style="width: 50px; height: 60px; border-radius: 70%;" src="/img/facebook.svg" alt="facebook"></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <a href="https://www.instagram.com/marthinsalakory/" target="_blank"><img style="width: 50px; height: 52px; border-radius: 70%;" src="/img/instagram.png" alt="instagram"></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <a href="mailto:marthinsalakory11@gmail.com"><img style="width: 50px; height: 52px; border-radius: 70%;" src="/img/gmail.jpg" alt="gmail"></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <a href="https://api.whatsapp.com/send?phone=+6281318812027
" target="_blank"><img style="width: 50px; height: 52px; border-radius: 70%;" src="/img/whatsapp.png" alt="whatsapp"></a>
                                <a href="mailto:alama@email.com?subject=Subject atau judul&body=Pesanan anda">tes sa</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-footer">
                    --
                </div>
            </div>
        </div>
    </div>
</section>


<script src="http://maps.google.com/maps/api/js?key=AIzaSyB55Np3_WsZwUQ9NS7DP-HnneleZLYZDNw&amp;sensor=true"></script>
<script src="../node_modules/gmaps/gmaps.min.js"></script>

<script src="../assets/js/page/utilities-contact.js"></script>

<?= $this->endSection(); ?>
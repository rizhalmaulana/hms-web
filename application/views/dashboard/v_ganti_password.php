<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit
            <small> Password Pengguna</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-12">

                <div class="box box-primary">
                    <div class="box-body">

                        <?php 
						if(isset($_GET['alert'])){
							if($_GET['alert'] == "sukses"){
								echo "<div class='alert alert-success'>Password telah diubah!</div>";
							}else if($_GET['alert'] == "gagal"){
								echo "<div class='alert alert-danger'>Maaf, password lama yang anda masukkan salah!</div>";
							}
						}
						?>

                        <form method="post" action="<?= base_url('dashboard/ganti_password_aksi') ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input type="password" name="password_lama" class="form-control"
                                        placeholder="Masukkan Password Lama Anda ..">
                                    <?= form_error('password_lama'); ?>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" name="password_baru" class="form-control"
                                        placeholder="Masukkan Password Baru ..">
                                    <?= form_error('password_baru'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" name="konfirmasi_password" class="form-control"
                                        placeholder="Ulangi Password Baru ..">
                                    <?= form_error('konfirmasi_password'); ?>
                                </div>
                            </div>

                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary form-control" value="Ganti Password">
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </section>

</div>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Profil
            <small>Update Pengguna</small>
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
								echo "<div class='alert alert-success'>Profil telah diupdate!</div>";
							}
						}
						?>

                        <?php foreach($profil as $p){ ?>

                        <form method="post" action="<?= base_url('dashboard/profil_update') ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama .."
                                        value="<?= $p->pengguna_nama; ?>">
                                    <?= form_error('nama'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Masukkan email .."
                                        value="<?= $p->pengguna_email; ?>">
                                    <?= form_error('email'); ?>
                                </div>
                            </div>

                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary form-control" value="Update">
                            </div>
                        </form>

                        <?php } ?>

                    </div>
                </div>

            </div>
        </div>

    </section>

</div>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit
            <small>Data Jalur</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-12">
                <a href="<?= base_url().'dashboard/jalur' ?>" class="btn btn-sm btn-primary">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    <span>Kembali</span>
                </a>

                <br />
                <br />

                <div class="box box-primary">
                    <div class="box-body">

                        <?php foreach($jalur as $k){ ?>

                        <form method="post" action="<?= base_url('dashboard/jalur_update') ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nama jalur</label>
                                    <input type="hidden" name="id" value="<?= $k->jalur_id; ?>">
                                    <input type="text" name="jalur" class="form-control"
                                        placeholder="Masukkan nama jalur .." value="<?= $k->jalur_nama; ?>">
                                    <?= form_error('jalur'); ?>
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
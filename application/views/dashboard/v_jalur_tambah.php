<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Input
            <small>Nama Jalur</small>
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
                        <form method="post" action="<?= base_url('dashboard/jalur_aksi') ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nama Jalur</label>
                                    <input type="text" name="jalur" class="form-control"
                                        placeholder="Masukkan nama jalur ..">
                                    <?= form_error('jalur'); ?>
                                </div>
                            </div>

                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary form-control" value="Simpan">
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </section>

</div>
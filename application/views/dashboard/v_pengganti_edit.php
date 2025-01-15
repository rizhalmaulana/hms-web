<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit
            <small>Cari Data Pengganti</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-12">
                <a href="<?= base_url().'dashboard/pos' ?>" class="btn btn-sm btn-primary">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    <span>Kembali</span>
                </a>
                
                <br />
                <br />

                <div class="box box-primary">
                    <div class="box-body">

                        <?php foreach($pos as $k){ ?>

                        <form method="post" action="<?= base_url('dashboard/pos_update') ?>">
                            <div class="box-body">
                                <div class="form-group">

                                    <label>Jalur</label>
                                    <select class="form-control" name="jalur">
                                        <option value="">- Pilih jalur</option>
                                        <?php foreach($jalur as $a){ ?>
                                        <option <?php if($k->pos_jalur == $a->jalur_id){echo "selected='selected'";} ?>
                                            value="<?= $a->jalur_id ?>"><?= $a->jalur_nama; ?></option>
                                        <?php } ?>
                                    </select>
                                    <br />
                                    <?= form_error('jalur'); ?>
                                    <label>Nama pos</label>
                                    <input type="hidden" name="id" value="<?= $k->pos_id; ?>">
                                    <input type="text" name="pos" class="form-control"
                                        placeholder="Masukkan nama pos .." value="<?= $k->pos_nama; ?>">
                                    <?= form_error('pos'); ?>
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
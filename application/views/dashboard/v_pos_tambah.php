<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Input
            <small>Nama Pos</small>
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
                        <form method="post" action="<?= base_url('dashboard/pos_aksi') ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Dari Jalur</label>

                                    <select class="form-control" name="jalur[]" id="nama_jalur" multiple>
                                        <?php foreach($jalur as $k){ ?>
                                        <option
                                            <?php if(set_value('jalur') == $k->jalur_id){ 
                                                echo "selected='selected'"; } ?>
                                                value="<?= $k->jalur_id ?>"><?= $k->jalur_nama; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <br />
                                    <?= form_error('jalur'); ?>
                                </div>
                                <label>Nama pos</label>
                                <input type="text" name="pos" class="form-control" placeholder="Masukkan nama pos ..">
                                <?= form_error('pos'); ?>
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
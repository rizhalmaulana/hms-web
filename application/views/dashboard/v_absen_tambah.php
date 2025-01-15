<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Input
            <small>Absensi</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <a href="<?= base_url().'dashboard/absen' ?>" class="btn btn-sm btn-primary">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    <span>Kembali</span>
                </a>

                <br />
                <br />

                <div class="box box-primary">
                    <div class="box-body">
                        <form method="post" action="<?= base_url('dashboard/absen_aksi') ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Tanggal Absen</label>
                                    <input type="date" name="tgl_absen" class="form-control" placeholder="tgl">
                                    <?= form_error('tgl_absen'); ?>
                                    <br />

                                    <label>Data Karyawan</label>
                                    <select class="form-control" name="karyawan" id="karyawan">
                                        <?php foreach($karyawan as $k) { ?>
                                        <option <?php if(set_value('karyawan') == $k->id_kar) { 
                                                echo "selected='selected'"; } ?> value="<?= $k->id_kar ?>">
                                            <?= $k->nama; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('karyawan'); ?>
                                    <br />
                                    
                                    <label>Keterangan</label>
                                    <select name="ket" id="ket" class="form-control">
                                        <option value="sakit">Sakit</option>
                                        <option value="cuti">Cuti</option>
                                    </select>
                                    </class=>
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
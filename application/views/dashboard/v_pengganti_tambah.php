<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Input
            <small>Pengganti</small>
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
                        <form method="post" action="<?= base_url('dashboard/pengganti_aksi') ?>">
                            <div class="box-body">
                                <div class="form-group">
                                   
                                <label>jabatan</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama ..">
                                <?= form_error('nama'); ?>
                                 
                                 <label>Pos</label>
                                <input type="text" name="pos" class="form-control" placeholder="Masukkan nama pos ..">
                                <?= form_error('pos'); ?>
                                 
                                <label>Status Skill</label>
                                <select name="ket" id="ket" class="form-control">
                                    <option value="sakit">sakit</option>
                                    <option value="cuti">cuti</option>
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
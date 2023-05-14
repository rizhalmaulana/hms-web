<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master
            <small>Data Jalur</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-12">

                <a href="<?= base_url().'dashboard/jalur_tambah' ?>" class="btn btn-sm btn-primary">
                    <i class="glyphicon glyphicon-plus-sign"></i>
                    <span>Buat jalur baru</span>
                </a>

                <br>
                <br>

                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th width="1%">NO</th>
                                    <th>Jalur</th>

                                    <th width="10%">OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
								$no = 1;
								foreach($jalur as $k){ 
									?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $k->jalur_nama; ?></td>

                                    <td>
                                        <a href="<?= base_url().'dashboard/jalur_edit/'.$k->jalur_id; ?>"
                                            class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
                                        <a onClick="javascript: return confirm('Yakin ingin menghapus ini?'); return false"
                                            href="<?= base_url().'dashboard/jalur_hapus/'.$k->jalur_id; ?>"
                                            class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>


                    </div>
                </div>

            </div>
        </div>

    </section>

</div>
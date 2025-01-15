<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master
            <small>Data Karyawan</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-12">
            <?php 
                if($this->session->userdata('level') == "admin" || $this->session->userdata('level') == "Produksi" ){
                    ?>
                    <a href="<?= base_url().'dashboard/absen_tambah' ?>" class="btn btn-sm btn-primary">
                        <i class="glyphicon glyphicon-plus-sign"></i>
                    <span>Absen</span>
                    </a>                    
                    <br />
                    <br />
                    <?php
                }
            ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Tgl absen</th>
                                    <th>Nama Karyawan</th>
                                    <th>Pos</th>
                                    <th>Keterangan</th>
                                    <?php 
                                        if($this->session->userdata('level') == "admin"){
                                            ?><th width="10%">OPSI</th><?php
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
								$no = 1;
								foreach($absen as $k){ 
									?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $k->tgl_absen; ?></td>
                                    <td><?= $k->nama; ?></td>
                                    <td><?= $k->pos; ?></td>
                                    <td><?= $k->ket; ?></td>                                   
                                    
                                    <?php 
                                        if($this->session->userdata('level') == "admin"){
                                            ?>
                                            <td>
                                                <?php
                                                if ($isKaryawanAbsent != null) {
                                                    foreach ($isKaryawanAbsent as $item) {
                                                        if (isset($item->id_absen) && $item->id_absen == $k->id_absen) {
                                                            // The id_absen exists, disable it in the database
                                                            ?>
                                                            <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="left" title="Sudah Memiliki Pengganti"><i class="fa fa-thumbs-up"></i></button>
                                                            <a onClick="javascript: return confirm('Yakin ingin menghapus ini?'); return false" 
                                                                href="<?= base_url().'dashboard/absen_hapus/'.$k->id_absen; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> 
                                                            </a>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <a href="<?= base_url().'dashboard/absen_edit/'.$k->id_absen; ?>" 
                                                                class="btn btn-success btn-sm"><i class="fa fa-thumbs-up"></i>
                                                            </a>
                                                            <a onClick="javascript: return confirm('Yakin ingin menghapus ini?'); return false" 
                                                                href="<?= base_url().'dashboard/absen_hapus/'.$k->id_absen; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> 
                                                            </a>
                                                            <?php
                                                        }
                                                    }
                                                } else {
                                                    ?>
                                                    <a href="<?= base_url().'dashboard/absen_edit/'.$k->id_absen; ?>" 
                                                        class="btn btn-success btn-sm"><i class="fa fa-thumbs-up"></i>
                                                    </a>
                                                    <a onClick="javascript: return confirm('Yakin ingin menghapus ini?'); return false" 
                                                        href="<?= base_url().'dashboard/absen_hapus/'.$k->id_absen; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> 
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <?php
                                        }
                                    ?>
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
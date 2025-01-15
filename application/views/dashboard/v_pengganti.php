<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master
            <small>Data Karyawan Pengganti</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th width="1%">NO</th>
                                    <th>Nama Penganti</th>
                                    <th>Pos</th>
                                    <th>Jabatan</th>
                                    <th>Karyawan Absen</th>
                                    <th>Tanggal Absen</th>
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
    								foreach($pengganti as $k) { 
								?>
                                <tr>

                                    <td><?= $no++; ?></td>
                                    <td><?= $k->nama_pengganti; ?></td>
                                    <td><?= $k->pos; ?></td>
                                    <td><?= $k->jabatan_pengganti; ?></td>
                                    <td><?= $k->karyawan_absen; ?></td>
                                    <td><?= $k->tgl_absen; ?></td>
                                    <?php 
                                        if($this->session->userdata('level') == "admin"){
                                            ?>
                                    <td>
                                        <!-- <a href="<?= base_url().'dashboard/pengganti_edit/'.$k->id_pengganti; ?>"
                                            class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a> -->
                                        <a onClick="javascript: return confirm('Yakin ingin menghapus ini?'); return false"
                                            href="<?= base_url().'dashboard/pengganti_hapus/'.$k->id_pengganti; ?>"
                                            class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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
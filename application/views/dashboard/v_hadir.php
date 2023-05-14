<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master
            <small>Data Absen</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-12">

            <?php 
                if($this->session->userdata('level') == "admin"){
                    ?>
                    <a href="<?= base_url().'dashboard/hadir_tambah' ?>" class="btn btn-sm btn-primary">
                        <i class="glyphicon glyphicon-plus-sign"></i>
                        <span>Buat Pengajuan Absen</span>
                    </a>

                    <a href="<?= base_url().'dashboard/jalur' ?>" class="btn btn-sm btn-success">
                        <i class="glyphicon glyphicon-import"></i>
                        <span>Upload File Absen</span>
                    </a>

                    <br />
                    <br />
                    <?php
                }
            ?>

                <?= $message; ?>

                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="1%">NO</th>
                                    <th>Tanggal</th>
                                    <th>NPK</th>
                                    <th>Nama</th>
                                    <th>Jalur</th>
                                    <th>Status</th>
                                    <th>Shift</th>
                                    <th>Absensi</th>
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
                                    foreach($hadir as $k) { 
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $k->hadir_tgl_in; ?></td>
                                    <td><?= $k->hadir_npk; ?></td>
                                    <td><?= $k->hadir_nama; ?></td>
                                    <td><?= $k->jalur_nama; ?></td>
                                    <td><?= $k->hadir_status; ?></td>
                                    <td><?= $k->hadir_shift; ?></td>
                                    <td><?= $k->hadir_kode; ?></td>
                                    <td><?= $k->hadir_ket; ?></td>

                                    <?php 
                                        if($this->session->userdata('level') == "admin"){
                                            ?><td>
                                            <a href="<?= base_url().'dashboard/hadir_edit/'.$k->hadir_id; ?>"
                                                class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
                                            <a onClick="javascript: return confirm('Yakin ingin menghapus ini?'); return false"
                                                href="<?= base_url().'dashboard/hadir_hapus/'.$k->hadir_id; ?>"
                                                class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
    
                                        </td><?php
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
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Henkaten
            <small>Data Pengganti</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-12">

                <?php 
                    // cek apakah penggun yang login adalah foreman
                    if($this->session->userdata('level') == "admin") { ?>
                        <a href="<?= base_url().'dashboard/hadir_tambah' ?>" class="btn btn-sm btn-primary">
                            <i class="glyphicon glyphicon-plus-sign"></i>
                            <span>Input Data Absen</span>
                        </a>
                        <br />
                        <br />
                <?php } ?>

                <?= $message; ?>

                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="1%">NO</th>
                                    <th>MP Id</th>
                                    <th>Nama</th>
                                    <th>MP Jalur</th>
                                    <th>Status</th>
                                    <th>Shift</th>
                                    <th>Id Pengganti</th>
                                    <th>Nama Pengganti</th>
                                    <th>Status</th>

                                    <?php
                                        if($this->session->userdata('level') == "admin") {
                                            ?><th width="10%">OPSI</th><?php
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
								    $no = 1;
                                    foreach($hadir as $k){ 
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $k->hen_npk; ?></td>
                                    <td><?= $k->hen_nama; ?></td>
                                    <td><?= $k->hen_jalur; ?></td>
                                    <td><?= $k->hen_status; ?></td>
                                    <td><?= $k->hen_shift; ?></td>
                                    <td><?= $k->hen_ganti; ?></td>
                                    <td><?= $k->hen_gan_nama; ?></td>

                                    <?php 
                                        if ($k->status_ganti == "Selesai") {
                                            $class_style = "alert alert-success";
                                        } else {
                                            $class_style = "alert alert-warning";
                                        }
                                    ?>
                                    <td class="<?= $class_style; ?>"><?= $k->status_ganti; ?></td>

                                    <?php
                                        if($this->session->userdata('level') == "admin") {
                                            ?>
                                            <td>
                                                <a href="<?= base_url().'dashboard/hadir_edit/'.$k->hadir_id; ?>"
                                                class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
                                                
                                                <a onClick="javascript: return confirm('Yakin ingin menghapus ini?'); return false"
                                                href="<?= base_url().'dashboard/hadir_hapus/'.$k->hadir_id; ?>"
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
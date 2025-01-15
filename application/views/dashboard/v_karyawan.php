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
                if($this->session->userdata('level') == "admin"){
                    ?>
                    <a href="<?= base_url().'dashboard/pos_tambah' ?>" class="btn btn-sm btn-primary">
                        <i class="glyphicon glyphicon-plus-sign"></i>
                    <span>Buat pos baru</span>
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
                                    <th width="1%">NO</th>
                                    <th>Jalur</th>
                                    <th>Pos</th>

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
								foreach($karyawan as $k){ 
									?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $k->nama; ?></td>
                                    <td><?= $k->alamat; ?></td>

                                    <?php 
                                        if($this->session->userdata('level') == "admin"){
                                            ?>
                                            <td>
                                                <a href="<?= base_url().'dashboard/karyawan_edit/'.$k->id_kar; ?>"
                                                    class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
                                                <a onClick="javascript: return confirm('Yakin ingin menghapus ini?'); return false"
                                                    href="<?= base_url().'dashboard/pos_hapus/'.$k->id_kar; ?>"
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
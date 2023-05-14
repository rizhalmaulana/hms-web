<div class="content-wrapper">
    <section class="content-header">
        <h1>
            skil
            <small>Data skil</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-12">

                <a href="<?= base_url().'dashboard/skil_tambah'; ?>" class="btn btn-sm btn-primary">Buat skil baru</a>

                <br />
                <br />

                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="1%">NO</th>
                                    <th>NPK</th>
                                    <th>Nama</th>
                                    <th>Jalur</th>
                                    <th>Pos</th>
                                    <th>SKill</th>
                                    <th>Status</th>
                                    <th width="10%">OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
								$no = 1;
								if($skil != null) {
									foreach($skil as $k){	
									?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $k->mp_id; ?></td>
                                    <td><?= $k->mp_nama; ?></td>
                                    <td><?= $k->jalur_id; ?></td>
                                    <td><?= $k->pos_nama; ?></td>
                                    <td><?= $k->skill_score; ?></td>
                                    <td>
                                        <?php 
											if($k->skill_sts == 1){
												echo "<span class='label label-success'>Completed</span>"; ;
											}else{
												echo "<span class='label label-danger'>Not Complete</span>";
											}
											?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url().'dashboard/skil_edit/'.$k->skil_id; ?>"
                                            class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
                                        <a onClick="javascript: return confirm('Yakin ingin menghapus ini?'); return false"
                                            href="<?= base_url().'dashboard/skil_hapus/'.$k->skil_id; ?>"
                                            class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                                	<?php } ?>
                                <?php } else {
									?>
									<tr class="text-center">
										<td>0</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
									</tr>
									<?php
								} ?>
                            </tbody>
                        </table>


                    </div>
                </div>

            </div>
        </div>

    </section>

</div>
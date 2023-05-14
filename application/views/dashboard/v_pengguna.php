<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Hak Akses 
			<small>Pengguna</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-12">
				
				<a href="<?= base_url().'dashboard/pengguna_tambah' ?>" class="btn btn-sm btn-primary">
                    <i class="glyphicon glyphicon-plus-sign"></i>
                    <span>Buat pengguna baru</span>
                </a>


				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="1%">NO</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Username</th>
									<th>Shift</th>
									<th>Jalur</th>
									<th>Level</th>
									<th>Status</th>
									<th width="10%">OPSI</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								foreach($pengguna as $p){ 
									?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $p->pengguna_nama; ?></td>
										<td><?= $p->pengguna_email; ?></td>
										<td><?= $p->pengguna_username; ?></td>
										<td><?= $p->pengguna_shift; ?></td>
										<td><?= $p->jalur_nama; ?></td>
										<td><?= $p->pengguna_level; ?></td>
										<td>
											<?php 
											if($p->pengguna_status == 1){
												echo "Aktif";
											}else{
												echo "Non Aktif";
											}
											?>
										</td>
										<td>
											<a href="<?= base_url().'dashboard/pengguna_edit/'.$p->pengguna_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
											<a onClick="javascript: return confirm('Yakin ingin menghapus ini?'); return false" href="<?= base_url().'dashboard/pengguna_hapus/'.$p->pengguna_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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
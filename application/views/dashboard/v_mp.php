<div class="content-wrapper">
	<section class="content-header">
		<h1>
			mp
			<small>Data mp</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-9">
				
				

				<?php 
				// cek apakah penggun yang login adalah foreman
				if($this->session->userdata('level') == "Foreman"){?>
					
					
					<?php }else if($this->session->userdata('level') == "spv"){
						// jika yang login adalah admin ?>
						
						<?php }else{
							// jika yang login adalah admin?>
							<a href="<?php echo base_url().'dashboard/mp_tambah'; ?>" class="btn btn-sm btn-primary">Buat mp baru</a>									
							<?php }?>
				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">mp</h3>
					</div>
					<div class="box-body">
					<table class="table table-bordered" id="table10">
							<thead>
								<tr>
									<th width="1%">NO</th>
									<th>NPK</th>
									<th>Nama</th>
									<th>Jalur</th>
									<th>POS</th>
									<th>Status</th>
									<th>Shift</th>
									<th>Atasan</th>
									
							
									<th width="10%">OPSI</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								foreach($mp as $k){ 
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $k->mp_id; ?></td>
										<td><?php echo $k->mp_nama; ?></td>
										<td><?php echo $k->jalur_nama; ?></td>
										<td><?php echo $k->pos_nama; ?></td>
										<td><?php echo $k->mp_status; ?></td>
										<td><?php echo $k->mp_shift; ?></td>
										<td><?php echo $k->mp_atasan; ?></td>
										
										
										<td>
											
											
											<?php 
										// cek apakah penggun yang login adalah foreman
										if($this->session->userdata('level') == "Foreman"){?>
											<a href="<?php echo base_url().'dashboard/mp_edit/'.$k->mp_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
											
											<?php }else if($this->session->userdata('level') == "spv"){
												// jika yang login adalah spv ?>
												
												<?php }else{
													// jika yang login adalah admin?>
													<a href="<?php echo base_url().'dashboard/mp_edit/'.$k->mp_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
													<a onClick="javascript: return confirm('Yakin ingin menghapus ini?'); return false" href="<?= base_url().'dashboard/mp_hapus/'.$k->mp_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>									
													<?php }?>


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
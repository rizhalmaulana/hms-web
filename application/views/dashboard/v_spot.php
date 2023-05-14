<div class="content-wrapper">
	<section class="content-header">
		<h1>
			MAPPING SPOT
			<small>Manajemen MAPPING SPOT</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-12">
				<?php 
				// cek apakah penggun yang login adalah penulis
				if($this->session->userdata('level') == "Produksi"){?>
					<a href="<?= base_url().'dashboard/spot_tambah'; ?>" class="btn btn-sm btn-primary">Input OPD Baru</a>
					
					<?php }else if($this->session->userdata('level') == "Quality Body"){
						// jika yang login adalah admin ?>				
					<?php }else if($this->session->userdata('level') == "BQC WQC"){
						// jika yang login adalah admin ?>
					<?php }else if($this->session->userdata('level') == "spv"){
						// jika yang login adalah admin ?>
					<?php }else if($this->session->userdata('level') == "Manager"){
						// jika yang login adalah admin ?>
						
						<?php }else{
							// jika yang login adalah admin?>
							<a href="<?= base_url().'dashboard/spot_tambah'; ?>" class="btn btn-sm btn-primary">Input OPD Baru</a>									
				<?php }?>
				
							

				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">DATA MAPPING SPOT</h3>
					</div>
					<div class="box-body">

						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th width="1%">NO</th>
										<th>Tanggal Update</th>
										<th>Jalur</th>
										<th>Jig</th>
										<th>Gun</th>
										<th>General Spot</th>
										<th>Safety Spot</th>
										<th>Pic</th>
										<th width="10%">Gambar</th>
										<th>Sts Quality</th>
										<th>Sts PE</th>
										<th>Sts Project</th>
										<th>Sts BQC WQC</th>
										<th>Sts SPV</th>
										<th>Sts MNGR</th>
										
										

										<th width="15%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									foreach($spot as $a){ 
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo date('d/m/Y H:i', strtotime($a->spot_tanggal)); ?></td>
											<td>
												<?php echo $a->jalur_nama; ?>
												<br/>
												<small class="text-muted">
													<?php echo $a->spot_pos; ?>
												</small>
											</td>
											<td><?php echo $a->spot_jig; ?></td>
											<td>
												<?php echo $a->spot_gun; ?>
												<br/>
												<small class="text-muted">
													<?php echo $a->spot_tipegun; ?>
												</small>
											</td>
											<td><?php echo $a->spot_gnl; ?></td>
											<td><?php echo $a->spot_safe; ?></td>
											<td><?php echo $a->pengguna_nama; ?></td>
											
											<td>
											<button type="button" class="btn btn-default"  data-toggle="modal" data-target="#modal-default">
											<img width="100%" class="img-responsive" src="<?php echo base_url().'/gambar/spot/'.$a->spot_sampul; ?>">
											</button>


											<div class="modal fade" id="modal-default">
												<div class="modal-dialog">
													<div class="modal-content">
													<div class="modal-header">
														
													</div>
													
													
            								</div>

												<img width="100%" class="img-responsive" src="<?php echo base_url().'/gambar/spot/'.$a->spot_sampul; ?>"></td>
											<td>
												<?php 
												if($a->spot_quality == 1){
													echo "<span class='label label-success'>Approve</span>";
												}else{
													echo "<span class='label label-danger'>Revisi</span>";
												}
												?>
											</td>
											<td>
												<?php 
												if($a->spot_pe == 1){
													echo "<span class='label label-success'>Approve</span>";
												}else{
													echo "<span class='label label-danger'>Revisi</span>";
												}
												?>
											</td>
											<td>
												<?php 
												if($a->spot_project == 1){
													echo "<span class='label label-success'>Approve</span>";
												}else{
													echo "<span class='label label-danger'>Revisi</span>";
												}
												?>
											</td>
											<td>
												<?php 
												if($a->spot_bqc == 1){
													echo "<span class='label label-success'>Approve</span>";
												}else{
													echo "<span class='label label-danger'>Revisi</span>";
												}
												?>
											</td>
											<td>
												<?php 
												if($a->spot_status=="publish"){
													echo "<span class='label label-success'>Publish</span>"; 
												}else{
													echo "<span class='label label-danger'>Pending</span>"; 
												}
												?>
											</td>
											<td>
												<?php 
												if($a->spot_quality == 1){
													echo "Approve";
												}else{
													echo "Revisi";
												}
												?>
											</td>
											<td>
												<!-- <a target="_blank" href="<?php echo base_url().$a->spot_slug; ?>" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i> </a> -->
											
													
													<?php 
													// cek apakah pengguna yang login adalah penulis
													if($this->session->userdata('level') == "penulis"){
														// jika penulis, maka cek apakah penulis spot ini adalah si pengguna atau bukan
														if($this->session->userdata('id') == $a->spot_author){
															?>
															
															<?php } }else if($this->session->userdata('level') == "Produksi"){// jika yang login adalah member?> 
																<?php } 
																else if($this->session->userdata('level') == "Quality Body"){// jika yang login adalah member?> 
																<a href="<?= base_url().'dashboard/spot_edit/'.$a->spot_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
																	<?php } 
																	else if($this->session->userdata('level') == "spv"){// jika yang login adalah member?>
																		<a href="<?= base_url().'dashboard/spot_edit/'.$a->spot_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
																		<?php }
																	else if($this->session->userdata('level') == "Manager"){// jika yang login adalah member?>
																		<a href="<?= base_url().'dashboard/spot_edit/'.$a->spot_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
																		<?php }

																		else{ // jika yang login adalah admin ?>
																			<a href="<?= base_url().'dashboard/spot_edit/'.$a->spot_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
																			<a onClick="javascript: return confirm('Yakin ingin menghapus ini?'); return false" href="<?= base_url().'dashboard/spot_hapus/'.$a->spot_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
																			<?php
																		}
																		?>
																		
												</td>






										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>

					</div>
				</div>

			</div>
		</div>

	</section>

</div>


			
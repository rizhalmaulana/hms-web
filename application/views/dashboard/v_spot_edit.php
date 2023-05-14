<div class="content-wrapper">
	<section class="content-header">
		<h1>
			spot
			<small>Edit spot Baru</small>
		</h1>
	</section>

	<section class="content">

		<a href="<?php echo base_url().'dashboard/spot'; ?>" class="btn btn-sm btn-primary">Kembali</a>

		<br/>
		<br/>

		<?php foreach($spot as $a){ ?>

		<form method="post" action="<?php echo base_url('dashboard/spot_update') ?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-9">

					<div class="box box-primary">
						<div class="box-body">


							<div class="box-body">
								<div class="form-group">
									<label>Tact Time</label>
									<input type="hidden" name="id" value="<?php echo $a->spot_id; ?>">
									<input type="text" name="tt" class="form-control" placeholder="Masukkan judul spot.." value="<?php echo $a->spot_tt; ?>">
									<br/>
									<?php echo form_error('judul'); ?>
									<label>Judul</label>
									<input type="hidden" name="id" value="<?php echo $a->spot_id; ?>">
									<input type="text" name="judul" class="form-control" placeholder="Masukkan judul spot.." value="<?php echo $a->spot_judul; ?>">
									<br/>
									<?php echo form_error('judul'); ?>
									<label>Nama Pos</label>
									<input type="hidden" name="id" value="<?php echo $a->spot_id; ?>">
									<input type="text" name="pos" class="form-control" placeholder="Masukkan judul spot.." value="<?php echo $a->spot_pos; ?>">
									<br/>
									<?php echo form_error('judul'); ?>
									<label>Nama Jig</label>
									<input type="hidden" name="id" value="<?php echo $a->spot_id; ?>">
									<input type="text" name="jig" class="form-control" placeholder="Masukkan judul spot.." value="<?php echo $a->spot_jig; ?>">
									<br/>
									<?php echo form_error('judul'); ?>
									<label>Nama Gun</label>
									<input type="hidden" name="id" value="<?php echo $a->spot_id; ?>">
									<input type="text" name="gun" class="form-control" placeholder="Masukkan judul spot.." value="<?php echo $a->spot_gun; ?>">
									<br/>
									<?php echo form_error('judul'); ?>
									<label>Type Gun</label>
									<input type="hidden" name="id" value="<?php echo $a->spot_id; ?>">
									<input type="text" name="typegun" class="form-control" placeholder="Masukkan judul spot.." value="<?php echo $a->spot_tipegun; ?>">
									<br/>
									<?php echo form_error('judul'); ?>
									<label>Jumlah Spot General</label>
									<input type="hidden" name="id" value="<?php echo $a->spot_id; ?>">
									<input type="text" name="jmlgnl" class="form-control" placeholder="Masukkan judul spot.." value="<?php echo $a->spot_gnl; ?>">
									<br/>
									<?php echo form_error('judul'); ?>
									<label>Jumlah Spot Safety</label>
									<input type="hidden" name="id" value="<?php echo $a->spot_id; ?>">
									<input type="text" name="jmlsafe" class="form-control" placeholder="Masukkan judul spot.." value="<?php echo $a->spot_safe; ?>">
									<br/>
									<?php echo form_error('judul'); ?>
								</div>
							</div>

							<div class="box-body">
								<div class="form-group">
									<label>Konten</label>
									<?php echo form_error('konten'); ?>
									<br/>
									<textarea class="form-control" id="editor" name="konten"> <?php echo $a->spot_konten; ?> </textarea>
								</div>
							</div>


						</div>
					</div>

				</div>

				<div class="col-lg-3">
					<div class="box box-primary">
						<div class="box-body">
							<div class="form-group">
								<label>jalur</label>
								<select class="form-control" name="jalur">
									<option value="">- Pilih jalur</option>
									<?php foreach($jalur as $k){ ?>
										<option <?php if($a->spot_jalur == $k->jalur_id){echo "selected='selected'";} ?> value="<?php echo $k->jalur_id ?>"><?php echo $k->jalur_nama; ?></option>
									<?php } ?>
								</select>
								<br/>
								<?php echo form_error('jalur'); ?>
							</div>

						

							<div class="form-group">
								<label>Gambar Sampul</label>

								<input type="file" name="sampul">

								<br/>
								<?php 
								if(isset($gambar_error)){
									echo $gambar_error;
								}
								?>
								<?php echo form_error('sampul'); ?>
							</div>
							<!-- <div class="form-group">
										<label>Status</label>
										<select class="form-control" name="status">
											<option value="">- Pilih Status -</option>
											<option <?php if($p->spot_quality == "1"){ echo "selected='selected'"; } ?> value="1">Approve</option>
											<option <?php if($p->spot_quality == "0"){ echo "selected='selected'"; } ?> value="0">Revisi</option>
										</select>
										<?php echo form_error('status'); ?>
							</div> -->
							<?php 
								// cek apakah penggun yang login adalah penulis
								if($this->session->userdata('level') == "Produksi"){?>	
									
									<?php }else if($this->session->userdata('level') == "Quality Body"){// jika yang login adalah quality ?>
										<label>Status</label>
											<select class="form-control" name="quality">
												<option name="id" ><?php echo $a->spot_quality; ?></option>
												<option name="quality" value="1">Approve</option>
												<option name="quality" value="0">Reject</option>
											</select>
										<?php echo form_error('status'); ?>
									<?php }else if(($this->session->userdata('level') == "PE") AND ($a->spot_quality == "1")){// jika yang login adalah bqc ?>
										<label>Status</label>
												<select class="form-control" name="pe">
												<option name="id" ><?php echo $a->spot_pe; ?></option>
												<option name="pe" value="1">Approve</option>
												<option name="pe" value="0">Reject</option>
											</select>
										<?php echo form_error('status'); ?>
									<?php }else if(($this->session->userdata('level') == "Project")AND ($a->spot_pe == "1")){// jika yang login adalah bqc ?>
										<label>Status</label>
											<select class="form-control" name="project">
												<option value="">- Pilih Status -</option>
												<option value="1">Approve</option>
												<option value="0">Reject</option>
											</select>
										<?php echo form_error('status'); ?>				
									<?php }else if(($this->session->userdata('level') == "BQC WQC")AND ($a->spot_project == "1")){// jika yang login adalah bqc ?>
										<label>Status</label>
											<select class="form-control" name="bqc">
												<option value="">- Pilih Status -</option>
												<option value="1">Approve</option>
												<option value="0">Reject</option>
											</select>
										<?php echo form_error('status'); ?>
									<?php }else if(($this->session->userdata('level') == "spv")AND ($a->spot_bqc == "1")){// jika yang login adalah spv ?>
										<label>Status</label>
											<select class="form-control" name="spv">
												<option value="">- Pilih Status -</option>
												<option value="1">Approve</option>
												<option value="0">Reject</option>
											</select>
										<?php echo form_error('status'); ?>
									<?php }else if($this->session->userdata('level') == "admin"){// jika yang login adalah manager ?>
										
										<?php }else{
											// jika yang login adalah admin?>
																			
								<?php }?>
							


							<input type="submit" name="status" value="Proses" class="btn btn-warning btn-block">
							<input type="submit" name="status" value="Publish" class="btn btn-success btn-block">

						</div>
					</div>

				</div>
			</div>
		</form>
		<?php } ?>

	</section>

</div>
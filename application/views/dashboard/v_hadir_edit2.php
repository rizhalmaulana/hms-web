<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Kehadiran
			<small>Hadir </small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				<a href="<?php echo base_url().'dashboard/hadir'; ?>" class="btn btn-sm btn-primary">Kembali</a>
				
				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">hadir</h3>
					</div>
					<div class="box-body">
						
					<?php foreach($hadir as $k){ ?>
						<form method="post" action="<?php echo base_url('dashboard/hadir_update') ?>">
							<div class="box-body">
							<input type="hidden" name="id" value="<?php echo $k->hadir_id; ?>">
						
								<script src="<?php echo base_url(); ?>assets/ajax.js"></script>
								<div class="form-group" autocomplete="off">
									<label>Npk</label>
									<input list="data_mahasiswa" class="form-control" type="text" name="mp_id" id="mp_id" placeholder="npk / nama" onchange="return autofill();" value="<?php echo set_value('mp_id'); ?>">
									
									<br/>
									<?php echo form_error('mp_id'); ?>
								</div>
								<datalist id="data_mahasiswa">
										<?php
										foreach ($record->result() as $b)
										{
											echo "<option value='$b->mp_id'>$b->mp_nama</option>";
										}
										?>
										
									</datalist>   
									<script>
										function autofill(){
											var mp_id =document.getElementById('mp_id').value;
											$.ajax({
														url:"<?php echo base_url();?>dashboard/cari",
														data:'&mp_id='+mp_id,
														success:function(data){
															var hasil = JSON.parse(data);  
														
												$.each(hasil, function(key,val){ 
													
												document.getElementById('mp_id').value=val.mp_id;
												document.getElementById('mp_nama').value=val.mp_nama;
												document.getElementById('mp_jalur').value=val.mp_jalur;
												document.getElementById('mp_status').value=val.mp_status;
												document.getElementById('mp_shift').value=val.mp_shift;
																	
														
													});
												}
													});
													
										}
									</script>
								<div class="form-group">
										<label>Nama</label>
										<input type="text" name="mp_nama" id="mp_nama" class="form-control" placeholder="Nama Pengaju" value="<?php echo set_value('mp_nama'); ?>" readonly>
										<br/>
										<?php echo form_error('mp_nama'); ?>
								</div>
								<div class="form-group">
										<label>Jalur</label>
										<input type="text" name="mp_jalur" id="mp_jalur" class="form-control" placeholder="Nama Pengaju" value="<?php echo set_value('mp_jalur'); ?>"readonly>
										<br/>
										<?php echo form_error('mp_jalur'); ?>
								</div>
								<div class="form-group">
										<label>Status</label>
										<input type="text" name="mp_status" id="mp_status" class="form-control" placeholder="Nama Pengaju" value="<?php echo set_value('mp_status'); ?>"readonly>
										<br/>
										<?php echo form_error('mp_status'); ?>
								</div>
								<div class="form-group">
										<label>Status</label>
										<input type="text" name="mp_shift" id="mp_shift" class="form-control" placeholder="Nama Pengaju" value="<?php echo set_value('mp_shift'); ?>"readonly>
										<br/>
										<?php echo form_error('mp_shift'); ?>
								</div>
								
								
								
								<!-- <label>In</label>
									<input type="text" name="in" class="form-control" placeholder="Masukkan npk ..">
									<?php echo form_error('hadir'); ?> -->
								<!-- <label>Out</label>
									<input type="text" name="out" class="form-control" placeholder="Masukkan npk ..">
									<?php echo form_error('hadir'); ?> -->
								<label>Kode Absen</label>
										<select class="form-control" name="kode">
										<option value="" disabled diselected>-- Pilih Kode Absen --</option>
											<?php foreach($kodeabsen as $a){ ?>
												<option <?php if(set_value('kodeabsen') == $a->absen_id){echo "selected='selected'";} ?> value="<?php echo $a->absen_id ?>"><?php echo $a->absen_id; ?></option>
											<?php } ?>
										</select>
								<br/>
								<?php echo form_error('kode'); ?>
								</div>
								<label>Keterangan Absen</label>
									<input type="text" name="ket" class="form-control" placeholder="Masukkan npk ..">
									<?php echo form_error('ket'); ?>
																	
									
							</div>

							<div class="box-footer">
								<input type="submit" class="btn btn-success" value="Simpan">
							</div>
						</form>
						<?php } ?>
					</div>
				</div>

			</div>
		</div>

	</section>

</div>
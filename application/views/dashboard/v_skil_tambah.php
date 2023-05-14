<div class="content-wrapper">
	<section class="content-header">
		<h1>
			SKILL
			<small>skil </small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				<a href="<?php echo base_url().'dashboard/skil'; ?>" class="btn btn-sm btn-primary">Kembali</a>
				
				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">skil</h3>
					</div>
					<div class="box-body">
						
						
						<form method="post" action="<?php echo base_url('dashboard/skil_aksi') ?>">
							<div class="box-body">
						
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
										<label>POS</label>
										<select class="form-control" name="pos_kode">
										<option value="" disabled diselected>-- Pilih POS --</option>
											<?php foreach($pos as $k){ ?>
												<option <?php if(set_value('pos') == $k->pos_id){echo "selected='selected'";} ?> value="<?php echo $k->pos_id ?>"><?php echo $k->pos_nama; ?></option>
											<?php } ?>
										</select>
								<br/>
								<?php echo form_error('pos_kode'); ?>
								</div>
								
								<div class="form-group">
									<label>Skill Score</label>
									<select class="form-control" name="score">
										<option value="">- Masukan Score -</option>
										<option value="25">25(baru pengenalan)</option>
										<option value="50">50(sudah bisa proses)</option>
										<option value="75">75(sudah bisa masih perlu dipantau)</option>
										<option value="100">100(sudah bisa proses mandiri kualitas terjamin)</option>
									</select>
									<?php echo form_error('score'); ?>
								</div>

								<div class="form-group">
									<label>Skill Status</label>
									<select class="form-control" name="skil_sts">
										<option value="">- Pilih Status -</option>
										<option value="1">Complete</option>
										<option value="0">NG</option>
									</select>
									<?php echo form_error('skil_sts'); ?>
								</div>
								
								
								
								

							<div class="box-footer">
								<input type="submit" class="btn btn-success" value="Simpan">
							</div>
						</form>

					</div>
				</div>

			</div>
		</div>

	</section>

</div>
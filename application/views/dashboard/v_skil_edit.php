<div class="content-wrapper">
	<section class="content-header">
		<h1>
			skil
			<small>skil Artikel</small>
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
						
						<?php foreach($skil as $k){ ?>

							<form method="post" action="<?php echo base_url('dashboard/skil_update') ?>">
								<div class="box-body">
									<div class="form-group">
								
										<input type="hidden" name="id" value="<?php echo $k->skil_id; ?>">
										<input type="text" name="mp_id" class="form-control" placeholder="Masukkan nama skil .." value="<?php echo $k->mp_id; ?>" readonly>
										<?php echo form_error('skil'); ?>
										<label>Nama</label>
										<input type="text" name="mp_nama" class="form-control" placeholder="Masukkan nama skil .." value="<?php echo $k->mp_nama; ?>" readonly>
										<?php echo form_error('skil'); ?>
										<label>Jalur</label>
										<input type="text" name="mp_jalur" class="form-control" placeholder="Masukkan nama skil .." value="<?php echo $k->jalur_id; ?>" readonly>
										<?php echo form_error('skil'); ?>

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
										
										
											<label>Skill Score</label>
											<select class="form-control" name="score">
												<option value="">- Masukan Score -</option>
												<option value="25">25(baru pengenalan)</option>
												<option value="50">50(sudah bisa proses)</option>
												<option value="75">75(sudah bisa masih perlu dipantau)</option>
												<option value="100">100(sudah bisa proses mandiri kualitas terjamin)</option>
											</select>
											<?php echo form_error('score'); ?>
										

										
											<label>Skill Status</label>
											<select class="form-control" name="skil_sts">
												<option value="">- Pilih Status -</option>
												<option value="1">Complete</option>
												<option value="0">NG</option>
											</select>
											<?php echo form_error('skil_sts'); ?>
										
										
										
									</div>
								</div>

								<div class="box-footer">
									<input type="submit" class="btn btn-success" value="Update">
								</div>
							</form>

						<?php } ?>

					</div>
				</div>

			</div>
		</div>

	</section>

</div>
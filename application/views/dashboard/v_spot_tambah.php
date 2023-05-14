<div class="content-wrapper">
	<section class="content-header">
		<h1>
			spot
			<small>Tulis spot Baru</small>
		</h1>
	</section>

	<section class="content">

		<a href="<?php echo base_url().'dashboard/spot'; ?>" class="btn btn-sm btn-primary">Kembali</a>

		<br/>
		<br/>

		<form method="post" action="<?php echo base_url('dashboard/spot_aksi') ?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-9">

					<div class="box box-primary">
						<div class="box-body">

							<div class="box-body">
								<div class="form-group">
									<label>Tact Time</label>
									<input type="text" name="tt" class="form-control" placeholder="Masukkan judul spot.." value="<?php echo set_value('tt'); ?>">
									<br/>
									<?php echo form_error('judul'); ?>							
									<label>Judul</label>
									<input type="text" name="judul" class="form-control" placeholder="Masukkan judul spot.." value="<?php echo set_value('judul'); ?>">
									<br/>
									<?php echo form_error('judul'); ?>
									<label>Nama Pos</label>
									<input type="text" name="pos" class="form-control" placeholder="Masukkan judul spot.." value="<?php echo set_value('pos'); ?>">
									<br/>
									<?php echo form_error('judul'); ?>							
									<label>Nama Jig</label>
									<input type="text" name="jig" class="form-control" placeholder="Masukkan judul spot.." value="<?php echo set_value('jig'); ?>">
									<br/>
									<?php echo form_error('judul'); ?>
									<label>Nama Gun</label>
									<input type="text" name="gun" class="form-control" placeholder="Masukkan judul spot.." value="<?php echo set_value('gun'); ?>">
									<br/>
									<?php echo form_error('judul'); ?>							
									<label>Type Gun</label>
									<input type="text" name="typegun" class="form-control" placeholder="Masukkan judul spot.." value="<?php echo set_value('typegun'); ?>">
									<br/>
									<?php echo form_error('judul'); ?>
									<label>Jumlah Spot General</label>
									<input type="number" name="jmlgnl" class="form-control" placeholder="Masukkan judul spot.." value="<?php echo set_value('jmlgnl'); ?>">
									<br/>
									<?php echo form_error('judul'); ?>							
									<label>Jumlah Spot Safety</label>
									<input type="number" name="jmlsafe" class="form-control" placeholder="Masukkan judul spot.." value="<?php echo set_value('jmlsafe'); ?>">
									<br/>
									<?php echo form_error('judul'); ?>
								</div>
							</div>
							

							<div class="box-body">
								<div class="form-group">
									<label>Konten</label>
									<?php echo form_error('konten'); ?>
									<br/>
									<textarea class="form-control" id="editor" name="konten"> <?php echo set_value('konten'); ?> </textarea>
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
										<option <?php if(set_value('jalur') == $k->jalur_id){echo "selected='selected'";} ?> value="<?php echo $k->jalur_id ?>"><?php echo $k->jalur_nama; ?></option>
									<?php } ?>
								</select>
								<br/>
								<?php echo form_error('jalur'); ?>
							</div>

							<div class="form-group">
								<label>Gambar OPD</label>

								<input type="file" name="sampul">

								<br/>
								<?php 
								if(isset($gambar_error)){
									echo $gambar_error;
								}
								?>
								<?php echo form_error('sampul'); ?>
							</div>

							<br/><br/>
							

							<input type="submit" name="status" value="Proses" class="btn btn-warning btn-block">
							<!-- <input type="submit" name="status" value="Publish" class="btn btn-success btn-block"> -->

						</div>
					</div>

				</div>
			</div>
		</form>

	</section>

</div>
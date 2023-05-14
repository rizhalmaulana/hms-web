<div class="content-wrapper">
	<section class="content-header">
		<h1>
			mp
			<small>mp</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				<a href="<?php echo base_url().'dashboard/mp'; ?>" class="btn btn-sm btn-primary">Kembali</a>
				
				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">mp</h3>
					</div>
					<div class="box-body">
						
						
						<form method="post" action="<?php echo base_url('dashboard/mp_aksi') ?>">
							<div class="box-body">
								<div class="form-group">
									<label>NPK Main power</label>
									<input type="text" name="npk" class="form-control" placeholder="Masukkan nama mp ..">
									<!-- <?php echo form_error('mp'); ?> -->
									<label>Nama Main power</label>
									<input type="text" name="nama" class="form-control" placeholder="Masukkan nama mp ..">
									<!-- <?php echo form_error('mp'); ?> -->

								<div class="form-group">
									<label>Jalur</label>
									<select class="form-control" name="jalur" id="jalur" required>
										<option value="">No Selected</option>
										<?php foreach($jalur as $row):?>
											<option value="<?php echo $row->jalur_id;?>"><?php echo $row->jalur_nama;?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Pos</label>
									<select class="form-control" id="sub_category" name="pos" required>
										<option>No Selected</option>
				
									</select>
								</div>
								<label>Status Main Power</label>
								<select class="form-control" name="sts">
										<option value="">- Pilih Shift -</option>
										<option value="permanen">Permanen</option>
										<option value="Kontrak 1">Kontrak 1</option>
										<option value="Kontrak 2">Kontrak 2</option>
										<option value="Leader">Leader</option>
										<option value="Foreman">Foreman</option>
									</select>
									<label>Shift Main power</label>
									<select class="form-control" name="shift">
										<option value="">- Pilih Shift -</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="N">N</option>
									</select>
									<label>Atasan Main power</label>
									<input type="text" name="atasan" class="form-control" placeholder="Masukkan nama mp ..">
									<!-- <?php echo form_error('mp'); ?> -->


							<div class="box-footer">
								<input type="submit" class="btn btn-success" value="Simpan">
							</div>
						</form>

						<!-- <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script> -->
						<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
						<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
						<script type="text/javascript">

							$(document).ready(function(){
								$('#jalur').change(function(){ 

									var id = $(this).val();

									$.ajax({
										url : "<?php echo site_url('dashboard/get_sub_category');?>",
										method : "POST",
										data : {id: id},
										async : true,
										dataType : 'json',
										success: function(data){
											
											var html = '';
											var i;
										
											for(i=0; i<data.length; i++){
												html += '<option value='+data[i].pos_id+'>'+data[i].pos_nama+'</option>';
											}
											$('#sub_category').html(html);
					
										}
									});
									return false;
								}); 
								
							});
						</script>
						
					</div>
				</div>

			</div>
		</div>

	</section>

</div>
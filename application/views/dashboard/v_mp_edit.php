<div class="content-wrapper">
	<section class="content-header">
		<h1>
			mp
			<small>mp Artikel</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-12">
				<a href="<?= base_url().'dashboard/mp'; ?>" class="btn btn-sm btn-primary">Kembali</a>
				
				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">mp</h3>
					</div>
					<div class="box-body">
						
						<?php foreach($mp as $k){ ?>

							<form method="post" action="<?= base_url('dashboard/mp_update') ?>">
							<div class="box-body">
								<div class="form-group">
									<input type="hidden" name="id" value="<?= $k->mp_id; ?>">
									<label>NPK Main power</label>
									<input type="text" name="npk" class="form-control" placeholder="Masukkan nama mp .." value="<?= $k->mp_id; ?>" readonly>
									
									<label>Nama Main power</label>
									<input type="text" name="nama" class="form-control" placeholder="Masukkan nama mp .." value="<?= $k->mp_nama; ?>" readonly>
									
									<div class="form-group">
									<label>Jalur</label>
									<select class="form-control" name="jalur" id="jalur" required>
										<option value="">No Selected</option>
										<?php foreach($jalur as $row):?>
											<option value="<?= $row->jalur_id;?>"><?= $row->jalur_nama;?></option>
										<?php endforeach;?>
									</select>
									</div>
									<div class="form-group">
										<label>Pos</label>
										<select class="form-control" id="sub_category" name="pos" required>
											<option>No Selected</option>
					
										</select>
									</div>
								
									<label>Status Main power</label>
									<input type="text" name="sts" class="form-control" placeholder="Masukkan nama mp .." value="<?= $k->mp_status; ?>">
								
									<label>Shift Main power</label>
									<input type="text" name="shift" class="form-control" placeholder="Masukkan nama mp .." value="<?= $k->mp_shift; ?>">
									
									<label>Atasan Main power</label>
									<input type="text" name="atasan" class="form-control" placeholder="Masukkan nama mp .." value="<?= $k->mp_atasan; ?>">
								
								
							</div>

							<div class="box-footer">
								<input type="submit" class="btn btn-success" value="Simpan">
							</div>
						</form>

						<?php } ?>

						<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
						<script type="text/javascript" src="<?= base_url().'assets/js/bootstrap.js'?>"></script>
						<script type="text/javascript">

							$(document).ready(function(){
								$('#jalur').change(function(){ 

									var id = $(this).val();

									$.ajax({
										url : "<?= site_url('dashboard/get_sub_category');?>",
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
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Input
			<small>Data Pengguna</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-12">
				
				<a href="<?= base_url().'dashboard/pengguna' ?>" class="btn btn-sm btn-primary">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    <span>Kembali</span>
                </a>

				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-body">
						
						<form method="post" action="<?= base_url('dashboard/pengguna_aksi') ?>">
							<div class="box-body">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" class="form-control" placeholder="Masukkan nama pengguna ..">
									<?= form_error('nama'); ?>
								</div>

								<div class="form-group">
									<label>NPK</label>
									<input type="number" name="npk" class="form-control" placeholder="Masukkan NPK pengguna ..">
									<?= form_error('npk'); ?>
								</div>

								<div class="form-group">
									<label>Shift</label>
									<select class="form-control" name="shift">
										<option value="">- Pilih Shift -</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="N">N</option>
									</select>
								</div>
								
								<div class="form-group">
									<label>dari Jalur</label>
									<select class="form-control" name="jalur">
									<option value="" disabled diselected>-- Pilih Jalur --</option>
										<?php foreach($jalur as $k){ ?>
											<option <?php if(set_value('jalur') == $k->jalur_id){echo "selected='selected'";} ?> value="<?= $k->jalur_id ?>"><?= $k->jalur_nama; ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder="Masukkan email pengguna ..">
									<?= form_error('email'); ?>
								</div>

								<div class="form-group">
									<label>No WA</label>
									<input type="phone" name="phone" class="form-control" placeholder="Masukkan Nomor WA Aktif pengguna ..">
									<?= form_error('phone'); ?>
								</div>

								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control" placeholder="Masukkan username pengguna..">
									<?= form_error('username'); ?>
								</div>

								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" placeholder="Masukkan password pengguna..">
									<?= form_error('password'); ?>
								</div>

								<div class="form-group">
									<label>Level</label>
									<select class="form-control" name="level">
										<option value="">- Pilih Level -</option>
										<option value="admin">Admin</option>
										<option value="penulis">Manager</option>
										<option value="spv">Supervisor</option>
										<option value="BQC WQC">BQC&WQC</option>
										<option value="Project">Project</option>
										<option value="Foreman">Foreman</option>
										<option value="Quality Body">Quality Body</option>
										<option value="Produksi">Produksi</option>
									</select>
									<?= form_error('level'); ?>
								</div>

								<div class="form-group">
									<label>Status</label>
									<select class="form-control" name="status">
										<option value="">- Pilih Status -</option>
										<option value="1">Aktif</option>
										<option value="0">Non-Aktif</option>
									</select>
									<?= form_error('status'); ?>
								</div>
							</div>

							<div class="box-footer">
								<input type="submit" class="btn btn-primary form-control" value="Simpan">
							</div>
						</form>

					</div>
				</div>

			</div>
		</div>

	</section>

</div>
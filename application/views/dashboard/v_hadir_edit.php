<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pengajuan
            <small>Absen & Pengganti</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-12">
                <a href="<?= base_url().'dashboard/hadir' ?>" class="btn btn-sm btn-primary">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    <span>Kembali</span>
                </a>
                <br />
                <br />

                <div class="box box-primary">
                    <div class="box-body">
                        <?php foreach($hadir as $k){ ?>
							<form method="post" action="<?= base_url('dashboard/hadir_update') ?>">
								<div class="box-body">
									<div class="form-group">
										<label>Status</label>
										<input type="date" name="tgl_in" id="tgl_in" class="form-control"
											placeholder="Tanggal Absen" value="<?= $k->hadir_tgl_in; ?>">
										<?= form_error('mp_status'); ?>
									</div>

									<input type="hidden" name="id" value="<?= $k->hadir_id; ?>">

									<script src="<?= base_url(); ?>assets/ajax.js"></script>
									<div class="form-group" autocomplete="off">
										<label>NPK</label>
										<input list="data_pegawai" class="form-control" type="text" name="mp_id"
											id="mp_id" placeholder="Pilih NPK / Nama" onchange="return autofill2();"
											value="<?= set_value('mp_id'); ?>">
										<?= form_error('mp_id'); ?>
									</div>
									<datalist id="data_pegawai">
										<?php
											foreach ($record_tambah->result() as $b) {
												echo "<option value='$b->mp_id'>$b->mp_nama</option>";
											}
											?>

									</datalist>
									<script>
										function autofill2() {
											var mp_id = document.getElementById('mp_id').value;
											$.ajax({
												url: "<?= base_url();?>dashboard/cari",
												data: '&mp_id=' + mp_id,
												success: function(data) {
													var hasil = JSON.parse(data);

													$.each(hasil, function(key, val) {

														document.getElementById('mp_id').value = val.mp_id;
														document.getElementById('mp_nama').value = val
															.mp_nama;
														document.getElementById('mp_jalur').value = val
															.mp_jalur;
														document.getElementById('mp_pos').value = val
															.mp_pos;
														document.getElementById('mp_status').value = val
															.mp_status;
														document.getElementById('mp_shift').value = val
															.mp_shift;


													});
												}
											});

										}
									</script>

									<div class="form-group">
										<label>Nama</label>
										<input type="text" name="mp_nama" id="mp_nama" class="form-control"
											placeholder="Nama MP" value="<?= set_value('mp_nama'); ?>" readonly>
										<?= form_error('mp_nama'); ?>
									</div>

									<div class="form-group">
										<label>Jalur</label>
										<input type="text" name="mp_jalur" id="mp_jalur" class="form-control"
											placeholder="Nama Jalur" value="<?= set_value('mp_jalur'); ?>"
											readonly>
										<?= form_error('mp_jalur'); ?>
									</div>

									<div class="form-group">
										<label>Pos</label>
										<input type="text" name="mp_pos" id="mp_pos" class="form-control"
											placeholder="Nama Pos" value="<?= set_value('mp_pos'); ?>"
											readonly>
										<?= form_error('mp_pos'); ?>
									</div>

									<div class="form-group">
										<label>Status</label>
										<input type="text" name="mp_status" id="mp_status" class="form-control"
											placeholder="Status" value="<?= set_value('mp_status'); ?>"
											readonly>
										<?= form_error('mp_status'); ?>
									</div>

									<div class="form-group">
										<label>Shift</label>
										<input type="text" name="mp_shift" id="mp_shift" class="form-control"
											placeholder="Shift" value="<?= set_value('mp_shift'); ?>"
											readonly>
										<?= form_error('mp_shift'); ?>
									</div>

									<div class="form-group" autocomplete="off">
										<label>Kode Absen</label>
										<input list="data_absen" class="form-control" type="text" name="absen_id"
											id="absen_id" placeholder="npk / nama" onchange="return autofill1();"
											value="<?= $k->hadir_kode; ?>">
										<?= form_error('absen_id'); ?>
									</div>

									<datalist id="data_absen">
										<?php
											foreach ($data_absen->result() as $r){
												echo "<option value='$r->absen_id'>$r->absen_ket</option>";
											}
										?>
									</datalist>

									<script>
										function autofill1() {
											var absen_id = document.getElementById('absen_id').value;
											$.ajax({
												url: "<?= base_url();?>dashboard/absen",
												data: '&absen_id=' + absen_id,
												success: function(data) {
													var hasil = JSON.parse(data);

													$.each(hasil, function(key, val) {

														document.getElementById('absen_id').value = val
															.absen_id;
														document.getElementById('absen_ket').value = val
															.absen_ket;
													});
												}
											});
										}
									</script>

									<div class="form-group">
										<label>Keterangan</label>
										<input type="text" name="absen_ket" id="absen_ket" class="form-control"
											placeholder="Nama Pengaju" value="<?= $k->hadir_ket; ?>" readonly>
										<?= form_error('absen_ket'); ?>
									</div>

									<script src="<?= base_url(); ?>assets/ajax.js"></script>
									<div class="form-group" autocomplete="off">
										<label>NPK Pengganti</label>
										<input list="data_mahasiswa" class="form-control" type="text" name="mp_peng_id"
											id="mp_peng_id" placeholder="Pilih NPK / Nama Pengganti" onchange="return autofill();"
											value="<?= set_value('mp_peng_id'); ?>" autocomplete="off">
										<?= form_error('mp_peng_id'); ?>
									</div>
									<datalist id="data_mahasiswa">
										<?php
											foreach ($record as $m){
												echo "<option value='$m->mp_id'>$m->mp_nama</option>";
											}
										?>
									</datalist>

									<script>
										function autofill() {
											var mp_id = document.getElementById('mp_peng_id').value;
											$.ajax({
												url: "<?= base_url();?>dashboard/cari",
												data: '&mp_id=' + mp_id,
												success: function(data) {
													var hasil = JSON.parse(data);

													$.each(hasil, function(key, val) {

														document.getElementById('mp_peng_id').value = val.mp_id;
														document.getElementById('mp_peng_nama').value = val
															.mp_nama;
														document.getElementById('mp_peng_sts').value = val
															.mp_status;
													});
												}
											});
										}
									</script>
									<div class="form-group">
										<label>Nama</label>
										<input type="text" name="mp_peng_nama" id="mp_peng_nama" class="form-control"
											placeholder="Nama Pengganti" value="<?= set_value('mp_peng_nama'); ?>" readonly>
										<?= form_error('mp_peng_nama'); ?>
									</div>
									<div class="form-group">
										<label>Status</label>
										<input type="text" name="mp_peng_sts" id="mp_peng_sts" class="form-control"
											placeholder="Status Pengganti" value="<?= set_value('mp_peng_sts'); ?>" readonly>
										<?= form_error('mp_peng_sts'); ?>
									</div>

									<div class="box-footer">
										<input type="submit" class="btn btn-primary form-control" value="Update">
									</div>
								</div>
							</form>
                    <?php } ?>
					</div>
				</div>
			</div>
        </div>
</div>

</section>

</div>
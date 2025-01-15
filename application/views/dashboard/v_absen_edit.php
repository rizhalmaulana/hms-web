<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Proses Forward Chaining
            <small>Absen Henkaten proses</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <a href="<?= base_url().'dashboard/absen' ?>" class="btn btn-sm btn-primary">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    <span>Kembali</span>
                </a>

                <br />
                <br />

                <form method="post" action="<?= base_url('dashboard/absen_update') ?>">
                    <input type="hidden" name="id_absen" id="id_absen" value="<?= $getDataset->id_absen; ?>">
                    <input type="hidden" name="id_dataset" id="id_dataset" value="<?= $getDataset->id_dataset; ?>">
                    <input type="hidden" name="id_kar" id="id_kar" value="<?= $getDataKaryawan->id_kar; ?>">
                    <input type="hidden" name="pos_absen" id="pos_absen" value="<?= $getDataset->pos_absen; ?>">
                    <input type="hidden" name="jabatan_absen" id="jabatan_absen" value="<?= $getDataset->jabatan; ?>">
                    <input type="hidden" name="sts_skill" id="sts_skill" value="<?= $getDataset->sts_skill; ?>">
                    
                    <div class="box box-primary">

                        <div class="box-body">
                            <label for="karyawan" class="text-uppercase">Data Karyawan Yang Mengajukan Izin</label>
                            <div class="box-body">
                                <div class="form-group">

                                    <label>Pos Karyawan Absen</label>
                                    <input type="text" name="pos_view" class="form-control"
                                        placeholder="Pos <?= $getDataset->pos_absen; ?>" readonly>
                                    <?= form_error('pos_absen'); ?>

                                    <br>
                                    <label>Nama Karyawan</label>
                                    <input type="text" name="nama_karyawan" class="form-control"
                                        placeholder="<?= $getDataKaryawan->nama; ?>" readonly>
                                    <?= form_error('nama_karyawan'); ?>

                                    <br>
                                    <label>Jabatan Karyawan</label>
                                    <input type="text" name="jabatan" class="form-control"
                                        placeholder="<?= $getDataset->jabatan; ?>" readonly>
                                    <?= form_error('jabatan'); ?>

                                    <br>
                                    <label>Status Absen</label>
                                    <input type="text" name="status" class="form-control"
                                        placeholder="<?= $getDataset->ket; ?>" readonly>
                                    <?= form_error('status'); ?>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="button" class="btn btn-primary form-control" id="prosesForwardChaining">
                                    <i class="fa fa-rocket"></i> Proses Forward Chaining
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary" id="sectionPilihKaryawan">
                        <div class="box-body">
                            <label for="karyawan" class="text-uppercase">Pilih Karyawan Pengganti</label>
                            <div class="box-body">
                                <div class="form-group">

                                    <label>Pilih Karyawan Pengganti</label>
                                    <input type="hidden" name="id_dataset_pengganti" id="id_dataset_pengganti" clas="form-control" readonly />
                                    <input type="hidden" name="nama_karyawan_ganti" id="nama_karyawan_ganti" clas="form-control" readonly />
                                    
                                    <select class="form-control" name="nama_ganti" id="nama_ganti">
                                        <option value="">- Pilih -</option>
                                    </select>
                                    <?= form_error('nama_ganti'); ?>

                                    <br>
                                    <label>Pos Karyawan Pengganti</label>
                                    <input type="text" name="pos_karyawan" id="pos_karyawan" class="form-control" placeholder=""
                                        readonly>
                                    <?= form_error('pos_karyawan'); ?>

                                    <br>
                                    <label>Jabatan Karyawan Pengganti</label>
                                    <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="" readonly>
                                    <?= form_error('jabatan'); ?>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-success form-control">
                                    <i class="fa fa-plus-circle"></i> Simpan Pengganti
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    $("#sectionPilihKaryawan").hide();
    $("#prosesForwardChaining").click(function() {
        const button = $(this);
        button.prop("disabled", true);

        $.ajax({
            url: '<?= base_url("dashboard/proses_forward_chaining") ?>',
            type: "POST",
            data: {
                id_absen: $('#id_absen').val(),
                id_dataset: $('#id_dataset').val(),
                id_kar: $('#id_kar').val(),
                pos_absen: $('#pos_absen').val(),
                jabatan: $('#jabatan_absen').val(),
                sts_skill: $('#sts_skill').val(),
            },
            dataType: 'json',
            beforeSend: function() {
                Swal.fire({
                    title: 'Loading...',
                    text: 'Sedang memproses forward chaining.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
            },
            success: function(data) {
                console.log(data);
                Swal.close();
                if (data.success) {
                    if (data.data != null) {
                            $("#sectionPilihKaryawan").show();
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $.each(data.data, function(index, item) {
                            $('#nama_ganti').append('<option value="' + item.id_kar + '" data-idpengganti="' + item.id_dataset + '" data-pos="' + item.pos + '" data-jabatan="' + item.jabatan + '" data-nama="' + item.nama + '">' + item.nama + ' (' + item.jabatan + ')</option>');
                        });
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                } else {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error: function() {
                button.prop("disabled", false);

                Swal.close();
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Terjadi kesalahan dalam memuat data!",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    });

    $('#nama_ganti').change(function() {
        // Get the selected option
        var selectedOption = $(this).find('option:selected');
        
        // Get the data attributes from the selected option
        var id_dataset_pengganti = selectedOption.data('idpengganti');
        var nama = selectedOption.data('nama');
        var pos = selectedOption.data('pos');
        var jabatan = selectedOption.data('jabatan');
        
        // Update the input fields
        $('#id_dataset_pengganti').val(id_dataset_pengganti);
        $('#nama_karyawan_ganti').val(nama);
        $('#pos_karyawan').val("Pos "+ pos);
        $('#jabatan').val(jabatan);
    });
});
</script>
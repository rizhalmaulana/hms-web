	<footer class="main-footer">
	    <div class="pull-right hidden-xs">
	        Henkaten Manajemen System
	    </div>
	    <strong>By Suryo Bintang</strong> . All rights reserved.
	</footer>
	</div>

	<script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>

	<!-- <script src="<?= base_url('assets/plugins/') ?>jquery/jquery.min.js"></script> -->

	<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>

	<script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/bower_components/raphael/raphael.min.js"></script>
	<script src="<?= base_url(); ?>assets/bower_components/morris.js/morris.min.js"></script>
	<script src="<?= base_url(); ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?= base_url(); ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
	<script src="<?= base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script>
	<script src="<?= base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
	</script>
	<script src="<?= base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="<?= base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?= base_url(); ?>assets/bower_components/chart.js/Chart.js"></script>
	<script src="<?= base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>

	<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
	<script src="<?= base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
	<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/ckeditor/ckeditor.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
	<link rel="stylesheet" href="<?= base_url('assets/plugins/') ?>select2/css/select2.min.css">
	<script src="<?= base_url('assets/plugins/') ?>select2/js/select2.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#table10').DataTable({
				dom: 'Bfrtip',
				buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
			});
		});
	</script>

	<script>
		$(document).ready(function() {
			$('#nama_jalur').select2({
				placeholder: "-- Pilih Jalur --"
			});
		});
	</script>

	<script>
		$(document).ready(function() {
			$('#table1').DataTable()
		});
	</script>


	<script>
		$(function() {
			CKEDITOR.replace('editor')
		});
	</script>

	<script>
$(function() {
    "use strict";

    //BAR CHART
	var bar = new Morris.Bar({
		element: 'total-member',
		resize: true,
        colors: ["#3c8dbc", "#f56954", "#00a65a"],
		data: [
			{ y: <?= $year ?>, a: <?= $jumlah_memberA ?>, b: <?= $jumlah_memberB ?> }
		],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Jumlah Member Shift A', 'Jumlah Member Shift B']
	});

	var bar = new Morris.Bar({
		element: 'total-absen',
		resize: true,
        colors: ["#3c8dbc", "#f56954", "#00a65a"],
		data: [
			{ y: <?= $year ?>, a: <?= $jumlah_absen_shift_a ?>, b: <?= $jumlah_absen_shift_b ?> }
		],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Jumlah Absen Shift A', 'Jumlah Absen Shift B']
	});

    //DONUT CHART
	var bar = new Morris.Bar({
		element: 'total-henkaten',
		resize: true,
        colors: ["#3c8dbc", "#f56954", "#00a65a"],
		data: [
			{ y: <?= $year ?>, a: <?= $jumlah_henkaten_shift_a ?>, b: <?= $jumlah_henkaten_shift_a ?> }
		],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Jumlah Absen Shift A', 'Jumlah Absen Shift B']
	});

});
	</script>
	</script>


	</body>

	</html>
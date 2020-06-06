<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('assets/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
<!--stickey kit -->
<script src="{{asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('assets/js/custom.min.js')}}"></script>
<!-- This is data table -->
<script src="{{asset('assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/dropify/dist/js/dropify.min.js')}}"></script>

<script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

<script src="{{asset('assets/plugins/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-asColor/dist/jquery-asColor.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
@yield('script')

<script>
    var dateToday = new Date();
	$('.date').datepicker({
		multidate: true,
		format: 'dd-mm-yyyy',
        minDate: dateToday,
	});
	$('#onSubmit').click(function(){
		var selectDate = $("#unavailable_date").val();
		console.log(selectDate);
	});
</script>

<script>
	$(function () {
		$('#myTable').DataTable();
		// responsive table
		$('#config-table').DataTable({
			responsive: true
		});
		var table = $('#example').DataTable({
			"columnDefs": [{
				"visible": false,
				"targets": 2
			}],
			"order": [
				[2, 'asc']
			],
			"displayLength": 25,
			"drawCallback": function (settings) {
				var api = this.api();
				var rows = api.rows({
					page: 'current'
				}).nodes();
				var last = null;
				api.column(2, {
					page: 'current'
				}).data().each(function (group, i) {
					if (last !== group) {
						$(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
						last = group;
					}
				});
			}
		});
		// Order by the grouping
		$('#example tbody').on('click', 'tr.group', function () {
			var currentOrder = table.order()[0];
			if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
				table.order([2, 'desc']).draw();
			} else {
				table.order([2, 'asc']).draw();
			}
		});
		$('#example23').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
		});
		$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
	});
</script>

<script>
	$(document).ready(function() {
		// Translated
		$('.dropify').dropify({
            messages: {
                'default': 'Seret dan taruh file di sini atau klik',
                'replace': 'Seret dan lepas atau klik untuk mengganti',
                'remove':  'Hapus',
                'error':   'Ups, terjadi kesalahan.'
            },
		});
		// Used events
		var drEvent = $('#input-file-events').dropify();
		drEvent.on('dropify.beforeClear', function(event, element) {
			return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
		});
		drEvent.on('dropify.afterClear', function(event, element) {
			alert('File deleted');
		});
		drEvent.on('dropify.errors', function(event, element) {
			console.log('Has Errors');
		});
		var drDestroy = $('#input-file-to-destroy').dropify();
		drDestroy = drDestroy.data('dropify')
		$('#toggleDropify').on('click', function(e) {
			e.preventDefault();
			if (drDestroy.isDropified()) {
				drDestroy.destroy();
			} else {
				drDestroy.init();
			}
		})
	});
</script>

<script>
	$(function()
	{
		$(document).on('click', '.btn-add', function(e)
		{
			e.preventDefault();
			var controlForm = $('#myRepeatingFields:first'),
				currentEntry = $(this).parents('.entry:last'),
				newEntry = $(currentEntry.clone()).appendTo(controlForm);
			newEntry.find('input').val('');
			controlForm.find('.clockpicker').clockpicker({
				donetext: 'Done',
				'default' : 'now'
			});
			controlForm.find('.entry:last .btn-add')
				.removeClass('btn-add').addClass('btn-remove')
				.removeClass('btn-success').addClass('btn-danger')
				.html('<span class="fa fa-minus"></span>');
		}).on('click', '.btn-remove', function(e)
		{
			e.preventDefault();
			$(this).parents('.entry:first').remove();
			return false;
		});
	});
</script>

<script>
	
	// Clock pickers
	$('.clockpicker').clockpicker({
		donetext: 'Done',
        'default' : 'now'
	}).find('input').change(function() {
		console.log(this.value);
	});
</script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
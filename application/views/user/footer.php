<footer>
					<div class="pull-right">
						Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
					</div>
					<div class="clearfix"></div>
				</footer>
				<!-- /footer content -->
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/fastclick/lib/fastclick.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/bernii/gauge.js/dist/gauge.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/skycons/skycons.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.pie.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.time.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.stack.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.resize.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.orderBars.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/flot/date.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.spline.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/flot/curvedLines.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/maps/jquery-jvectormap-2.0.3.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/moment/moment.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/datepicker/daterangepicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/custom.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/jszip/dist/jszip.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/maps/jquery-jvectormap-world-mill-en.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/maps/jquery-jvectormap-us-aea-en.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/maps/gdp-data.js"></script>
		<!-- Skycons -->
		<script>
			$(document).ready(function() {
			  var icons = new Skycons({
			      "color": "#73879C"
			    }),
			    list = [
			      "clear-day", "clear-night", "partly-cloudy-day",
			      "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
			      "fog"
			    ],
			    i;
			
			  for (i = list.length; i--;)
			    icons.set(list[i], list[i]);
			
			  icons.play();
			});
		</script>
		<!-- /Skycons -->
		<!-- Doughnut Chart -->
		<script>
			$(document).ready(function(){
				if($(document).find('#canvas1').length){
					  var options = {
						legend: false,
						responsive: false
					  };
					
					  new Chart(document.getElementById("canvas1"), {
						type: 'doughnut',
						tooltipFillColor: "rgba(51, 51, 51, 0.55)",
						data: {
						  labels: [
							"Symbian",
							"Blackberry",
							"Other",
							"Android",
							"IOS"
						  ],
						  datasets: [{
							data: [15, 20, 30, 10, 30],
							backgroundColor: [
							  "#BDC3C7",
							  "#9B59B6",
							  "#E74C3C",
							  "#26B99A",
							  "#3498DB"
							],
							hoverBackgroundColor: [
							  "#CFD4D8",
							  "#B370CF",
							  "#E95E4F",
							  "#36CAAB",
							  "#49A9EA"
							]
						  }]
						},
						options: options
					  });
				}
			});
		</script>
		<!-- /Doughnut Chart -->
		<!-- bootstrap-daterangepicker -->
		<script>
			$(document).ready(function() {
			
			  var cb = function(start, end, label) {
			    console.log(start.toISOString(), end.toISOString(), label);
			    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			  };
			
			  var optionSet1 = {
			    startDate: moment().subtract(29, 'days'),
			    endDate: moment(),
			    minDate: '01/01/2012',
			    maxDate: '12/31/2015',
			    dateLimit: {
			      days: 60
			    },
			    showDropdowns: true,
			    showWeekNumbers: true,
			    timePicker: false,
			    timePickerIncrement: 1,
			    timePicker12Hour: true,
			    ranges: {
			      'Today': [moment(), moment()],
			      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			      'This Month': [moment().startOf('month'), moment().endOf('month')],
			      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			    },
			    opens: 'left',
			    buttonClasses: ['btn btn-default'],
			    applyClass: 'btn-small btn-primary',
			    cancelClass: 'btn-small',
			    format: 'MM/DD/YYYY',
			    separator: ' to ',
			    locale: {
			      applyLabel: 'Submit',
			      cancelLabel: 'Clear',
			      fromLabel: 'From',
			      toLabel: 'To',
			      customRangeLabel: 'Custom',
			      daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
			      monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
			      firstDay: 1
			    }
			  };
			  $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
			  $('#reportrange').daterangepicker(optionSet1, cb);
			  $('#reportrange').on('show.daterangepicker', function() {
			    console.log("show event fired");
			  });
			  $('#reportrange').on('hide.daterangepicker', function() {
			    console.log("hide event fired");
			  });
			  $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
			    console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
			  });
			  $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
			    console.log("cancel event fired");
			  });
			  $('#options1').click(function() {
			    $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
			  });
			  $('#options2').click(function() {
			    $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
			  });
			  $('#destroy').click(function() {
			    $('#reportrange').data('daterangepicker').remove();
			  });
			});
		</script>
		<!-- /bootstrap-daterangepicker -->
		<!-- gauge.js -->
		<script>
		$(document).ready(function(){
			if($(document).find('#canvas1').length){
				var opts = {
					lines: 12,
					angle: 0,
					lineWidth: 0.4,
					pointer: {
						length: 0.75,
						strokeWidth: 0.042,
						color: '#1D212A'
					},
					limitMax: 'false',
					colorStart: '#1ABC9C',
					colorStop: '#1ABC9C',
					strokeColor: '#F0F3F3',
					generateGradient: true
				};
				var target = document.getElementById('foo'),
					gauge = new Gauge(target).setOptions(opts);
				
				gauge.maxValue = 6000;
				gauge.animationSpeed = 32;
				gauge.set(3200);
				gauge.setTextField(document.getElementById("gauge-text"));
			}
		});
		</script>
		<!-- /gauge.js -->
		<!-- datatables.js -->
		<script>
		$(document).on('ready', function(){
			var handleDataTableButtons = function() {
			  if ($("#datatable-buttons").length) {
				$("#datatable-buttons").DataTable({
				  dom: "Bfrtip",
				  buttons: [
					{
					  extend: "copy",
					  className: "btn-sm"
					},
					{
					  extend: "csv",
					  className: "btn-sm"
					},
					{
					  extend: "excel",
					  className: "btn-sm"
					},
					{
					  extend: "pdfHtml5",
					  className: "btn-sm"
					},
					{
					  extend: "print",
					  className: "btn-sm"
					},
				  ],
				  responsive: true
				});
			  }
			};

			TableManageButtons = function() {
			  "use strict";
			  return {
				init: function() {
				  handleDataTableButtons();
				}
			  };
			}();

			$('#datatable').dataTable();
			$('#datatable-keytable').DataTable({
			  keys: true
			});

			$('#datatable-responsive').DataTable();

			$('#datatable-scroller').DataTable({
			  ajax: "js/datatables/json/scroller-demo.json",
			  deferRender: true,
			  scrollY: 380,
			  scrollCollapse: true,
			  scroller: true
			});

			var table = $('#datatable-fixed-header').DataTable({
			  fixedHeader: true
			});

			TableManageButtons.init();
		});
		</script>
		<!-- /datatables.js -->
	</body>
</html>
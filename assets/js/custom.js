var BASE_URL = document.getElementById('base-url').value,
	CURRENT_URL = window.location.href.split('?')[0],
    $BODY = $('body'),
    $MENU_TOGGLE = $('#menu_toggle'),
    $SIDEBAR_MENU = $('#sidebar-menu'),
    $SIDEBAR_FOOTER = $('.sidebar-footer'),
    $LEFT_COL = $('.left_col'),
    $RIGHT_COL = $('.right_col'),
    $NAV_MENU = $('.nav_menu'),
    $FOOTER = $('footer');

/* Sidebar */
$(document).ready(function() {
	$('.fancybox').fancybox({
		width: '80%',
		height: '80%'
	});
	setTimeout(function(){
		$(document).find('.inline-alerts').html('');
	}, 5000);
	
    var setContentHeight = function () {
        $RIGHT_COL.css('min-height', $(window).height());
        var bodyHeight = $BODY.outerHeight(),
            footerHeight = $BODY.hasClass('footer_fixed') ? 0 : $FOOTER.height(),
            leftColHeight = $LEFT_COL.eq(1).height() + $SIDEBAR_FOOTER.height(),
            contentHeight = bodyHeight < leftColHeight ? leftColHeight : bodyHeight;
        contentHeight -= $NAV_MENU.height() + footerHeight;
        $RIGHT_COL.css('min-height', contentHeight);
    };
    $SIDEBAR_MENU.find('a').on('click', function(ev) {
        var $li = $(this).parent();
        if ($li.is('.active')) {
            $li.removeClass('active active-sm');
            $('ul:first', $li).slideUp(function() {
                setContentHeight();
            });
        } else {
            if (!$li.parent().is('.child_menu')) {
                $SIDEBAR_MENU.find('li').removeClass('active active-sm');
                $SIDEBAR_MENU.find('li ul').slideUp();
            }
            $li.addClass('active');
            $('ul:first', $li).slideDown(function() {
                setContentHeight();
            });
        }
    });
    $MENU_TOGGLE.on('click', function() {
        if ($BODY.hasClass('nav-md')) {
            $SIDEBAR_MENU.find('li.active ul').hide();
            $SIDEBAR_MENU.find('li.active').addClass('active-sm').removeClass('active');
        } else {
            $SIDEBAR_MENU.find('li.active-sm ul').show();
            $SIDEBAR_MENU.find('li.active-sm').addClass('active').removeClass('active-sm');
        }
        $BODY.toggleClass('nav-md nav-sm');
        setContentHeight();
    });
    $SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('current-page');

    $SIDEBAR_MENU.find('a').filter(function () {
        return this.href == CURRENT_URL;
    }).parent('li').addClass('current-page').parents('ul').slideDown(function() {
        setContentHeight();
    }).parent().addClass('active');
    $(window).smartresize(function(){  
        setContentHeight();
    });
    setContentHeight();
	
	/* intlInput */
	if($(document).find('.intl-num-input').length){
		$(document).find('.intl-num-input').intlTelInput({
			initialCountry: "nz",
			nationalMode: false,
			preferredCountries: ['nz', 'au'],
			utilsScript: BASE_URL+"assets/js/utils.js"
		});
		
		$(document).find('.intl-num-input').on('blur', function(e){
			var phone = $(this).intlTelInput("getNumber"),
				country = $(this).intlTelInput("getSelectedCountryData");
			if($(this).parent().parent().find('input[name="customer[country]"]').length){
				$(this).parent().parent().find('input[name="customer[country]"]').val(country.name);
				$(this).parent().parent().find('input[name="customer_meta[country_code]"]').val(country.iso2);
			}
		});
	}
	
    /* fixed sidebar */
    if ($.fn.mCustomScrollbar) {
        $('.menu_fixed').mCustomScrollbar({
            autoHideScrollbar: true,
            theme: 'minimal',
            mouseWheel:{ preventDefault: true }
        });
    }
	
	/* autocomplete customers */
	$('.autocomplete-customers').on('keyup', function(event){
		var $el = $(this),
			$key = (event.keyCode) ? event.keyCode : event.charCode;
		if($key == 8 || $key == 46){
			$el.val('');
			$el.parent().find('.response-customers').html('');
			$(document).find('.new-customer-form input').attr('required', 'required');
		} else {
			$el.typeahead({
				ajax: {
					url: BASE_URL+'ajax/getAutocompleteCustomers',
					method: 'post',
					displayField: 'name',
				},
				highlighter: function(data){
					return data;
				},
				onSelect: function(response){
					$.ajax({
						type: 'post',
						url: BASE_URL+'ajax/getCustomer',
						data: {
							userId: response.value
						},
						success: function(data){
							var data = $.parseJSON(data),
								profileImg = (data.profile_img != '') ? data.profile_img : BASE_URL+'assets/images/user.png';
								$html = '<div class="clearfix">&nbsp;</div>\
										<input type="hidden" name="existing-customer-id" value="'+data.id+'">\
										<table class="table table-responsive">\
											<tr>\
												<td class="col-xs-4 text-right">\
													<img src="'+profileImg+'" class="img-circle profile_img" style="max-width: 80px;">\
												</td>\
												<td class="col-xs-8" style="vertical-align: middle;">\
													<h2>'+data.firstname+' '+data.lastname+'</h2>\
													&nbsp;'+data.company+'\
												</td>\
											</tr>\
											<tr>\
												<td class="col-xs-4 text-right">\
													<strong>Email:</strong>\
												</td>\
												<td class="col-xs-8">'+data.email+'</td>\
											</tr>\
											<tr>\
												<td class="col-xs-4 text-right">\
													<strong>Phone:</strong>\
												</td>\
												<td class="col-xs-8">'+data.phone+'</td>\
											</tr>\
											<tr>\
												<td class="col-xs-4 text-right">\
													<strong>Address:</strong>\
												</td>\
												<td class="col-xs-8">'+data.street+', '+data.city+', '+data.postcode+', '+data.country+'</td>\
											</tr>\
										</table>';
							$el.val(data.firstname+' '+data.lastname);
							$el.parent().find('.response-customers').html($html);
							$(document).find('.new-customer-form input').removeAttr('required');
						}
					});				
				}
			});
		}
	});
	$('input[type="checkbox"]').iCheck({
		checkboxClass: 'icheckbox_flat-red',
	});
	$('input[type="radio"]').iCheck({
		radioClass: 'iradio_flat-red',
	});
	$('input[name="payment[total]"]').on('ifChecked', function(event){
		console.log(event);
	});
	
	/* datatables */
	$('.datatable').dataTable({
		fixedHeader: true,
		bAutoWidth: false,
	});
	
	/* skyicons */
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
	
	/* Doughnut chart */
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
	
	/* bootstrap-daterangepicker */
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


/* window.scroll */
$(window).bind('scroll', function () {
	if($(document).find('.to-fixed').length){
		if($(window).scrollTop() > 100){
			$('.to-fixed').addClass('fixed');
			$('.to-fixed').parent().css('height', $('.to-fixed').outerHeight());
		} else {
			$('.to-fixed').removeClass('fixed');
			$('.to-fixed').parent().css('height', 'auto');
		}
	}
});
/**
 * Resize function without multiple trigger
 * 
 * Usage:
 * $(window).smartresize(function(){  
 *     // code here
 * });
 */
(function($,sr){
    /* http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/ */
    var debounce = function (func, threshold, execAsap) {
      var timeout;

        return function debounced () {
            var obj = this, args = arguments;
            function delayed () {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null; 
            }
            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);

            timeout = setTimeout(delayed, threshold || 100); 
        };
    };
    /* smartresize  */
    jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };
})(jQuery,'smartresize');
$(document).ready(function() {
	$('.regionList').select2();		
	$('.regionList2').select2();		
	$('.provinceList').select2();		
	$('.provinceList2').select2();		
	$('.cityList').select2();		
	$('.cityList2').select2();
	//findProvince(151);		
	// $('#menu').hide();
	// $('.side-navbar').addClass('shrink');
	//$('#menu').hide();
	//$('.side-navbar').addClass('shrink');
	//$('.page').addClass('active');
	$('.regionSpecList').select2({
		placeholder: "Please select a Region",
		dropdownParent: $('.RegionSpec'),
	});

	$('.regionSpecList2').select2({
		placeholder: "Please select a Region",
		dropdownParent: $('.RegionSpec'),
	});

	$('.RegionSpecProvinceList').select2();

	$('.regionSpecList').on('select2:select', function(e) {
		var data = e.params.data;
		regionSpecProvChangeValue(data.id);
	});

	$('.regionSpecList2').on('select2:select', function(e) {
		var data = e.params.data;
		regionSpecProvChangeValue2(data.id);
	});		

	$('.regionList').on('select2:select', function (e) {
		var data = e.params.data;
		provChangeValue(data.id);
	});

	$('.regionList2').on('select2:select', function (e) {
		var data = e.params.data;
		provChangeValue2(data.id);
	});

	$('.regionList').on('select2:unselect', function (e) {
		var data = e.params.data;
		provDeleteValue(data.id);
		$('.cityList').val(null).trigger('change');
		// $('.cityList').children('option:not(:first)').remove();
		$('.cityList').children('option').remove();
	});

	$('.regionList2').on('select2:unselect', function (e) {
		var data = e.params.data;
		provDeleteValue2(data.id);
		$('.cityList2').val(null).trigger('change');
		// $('.cityList').children('option:not(:first)').remove();
		$('.cityList2').children('option').remove();
	});

	$('.provinceList').on('select2:select', function (e) {
		var data = e.params.data;
		cityChangeValue(data.id);
	});

	$('.provinceList2').on('select2:select', function (e) {
		var data = e.params.data;
		cityChangeValue2(data.id);
	});

	$('.provinceList').on('select2:unselect', function (e) {
		var data = e.params.data;
		console.log('hi');
	});

	// $('.provinceList').on('select2:unselect', function (e) {
	// 	var data = e.params.data;
	// 	cityDeleteValue(data.id);
	// });
});

$('#menuButton').click(function(event) {
	$('#menuButton').hide();
	$('#menu').fadeIn('slow/400/fast');
});
$('#miniClose').click(function(event) {
	$('#menuButton').show();
	$('#menu').fadeOut('slow/400/fast');
});

$('.interRegion[type=checkbox]').on('click', function(event) {
	if ($(this).prop('checked')) {
		var regionCode = $(this).val();
		$('#reg'+ regionCode).fadeIn();

		$.ajax({
			url: './getProvince',
			type: 'POST',
			dataType: 'json',
			data: {
				'_token': $('input[name=_token]').val(),
				'id'	: $(this).val()
			},
			success: function(data){
				console.log(data);
				$.each(data, function(index, item) {
					$('.reg' + regionCode).append(
						"<ul class=" + "'provList" + regionCode + "'" + ">" +
						"<input type='checkbox' class="+ "'prov" + item.id + "'" +">&nbsp"
						+ item.provName +
						"</ul>"
					);
				});
			}
		});

	} else {
		$( ".interRegion:checkbox:unchecked" ).each(function(index, el) {
		  	regionCode = $(this).val();
			$('.provList' + regionCode).remove();
			$('#reg'+ regionCode).hide();
		  });
	}
});

$('#proj_cov_main').on('change', function() {
  if ($(this).val() == 'Interregional') {
  	$('.interRegionalModal').modal('show');
  } else if ($(this).val() == 'Region Specific') {
  	$('.RegionSpec').modal('show');
  }	
})

$('.interRegionalModalClose').click(function(event) {
	/* Act on the event */
	if ($('.regionList').val() != '') {
		//alert('hi');
	}
});


// var countChecked = function() {
//   //var n = [];
//   $( ".interRegion:checkbox:checked" ).each(function(index, el) {
//   	//n[index] = $(this).val();
//   	regionNo = $(this).val();
// 	$('#reg'+ regionNo).fadeIn();
//   });
//   //console.log(a);
// };

function provChangeValue(data) {
	//console.log(data);
	$.ajax({
		url: './getProvince',
		type: 'POST',
		dataType: 'json',
		data: {
			'_token': $('input[name=_token]').val(),
			'id'	: data
		},
		success: function(data){
			$.each(data, function(index, item) {
				var newOption = new Option(item.provName, item.id, false, false);
				$('.provinceList').append(newOption).trigger('change');
			});
		}
	});
}

function provChangeValue2(data) {
	//console.log(data);
	$.ajax({
		url: '/getProvince',
		type: 'POST',
		dataType: 'json',
		data: {
			'_token': $('input[name=_token]').val(),
			'id'	: data
		},
		success: function(data){
			$.each(data, function(index, item) {
				var newOption = new Option(item.provName, item.id, false, false);
				$('.provinceList2').append(newOption).trigger('change');
			});
		}
	});
}

function provDeleteValue(data) {
	$.ajax({
		url: './getProvince',
		type: 'POST',
		dataType: 'json',
		data: {
			'_token': $('input[name=_token]').val(),
			'id'	: data
		},
		success: function(data){
			$.each(data, function(index, item) {
				var newOption = new Option(item.provName, item.id, false, false);
				$(".provinceList option[value='"+ item.id +"']").remove();
			});
		}
	});
}

function provDeleteValue2(data) {
	$.ajax({
		url: '/getProvince',
		type: 'POST',
		dataType: 'json',
		data: {
			'_token': $('input[name=_token]').val(),
			'id'	: data
		},
		success: function(data){
			$.each(data, function(index, item) {
				var newOption = new Option(item.provName, item.id, false, false);
				$(".provinceList2 option[value='"+ item.id +"']").remove();
			});
		}
	});
}

function cityChangeValue(data) {
	$.ajax({
		url: './getCity',
		type: 'POST',
		dataType: 'json',
		data: {
			'_token': $('input[name=_token]').val(),
			'id'	: data
		},
		success: function(data){
			$.each(data, function(index, item) {
				var newOption = new Option(item.cityName, item.id, false, false);
				$('.cityList').append(newOption).trigger('change');
			});
		}
	});
}

function cityChangeValue2(data) {
	$.ajax({
		url: '/getCity',
		type: 'POST',
		dataType: 'json',
		data: {
			'_token': $('input[name=_token]').val(),
			'id'	: data
		},
		success: function(data){
			$.each(data, function(index, item) {
				var newOption = new Option(item.cityName, item.id, false, false);
				$('.cityList2').append(newOption).trigger('change');
			});
		}
	});
}

function cityDeleteValue(data) {
	$.ajax({
		url: './getCity',
		type: 'POST',
		dataType: 'json',
		data: {
			'_token': $('input[name=_token]').val(),
			'id'	: data
		},
		success: function(data){
			$.each(data, function(index, item) {
				var newOption = new Option(item.cityName, item.id, false, false);
				$(".cityList option[value='"+ item.id +"']").remove();
			});
		}
	});
}

function cityDeleteValue2(data) {
	$.ajax({
		url: '/getCity',
		type: 'POST',
		dataType: 'json',
		data: {
			'_token': $('input[name=_token]').val(),
			'id'	: data
		},
		success: function(data){
			$.each(data, function(index, item) {
				var newOption = new Option(item.cityName, item.id, false, false);
				$(".cityList2 option[value='"+ item.id +"']").remove();
			});
		}
	});
}

function regionSpecProvChangeValue(data) {
	//console.log(data);
	$.ajax({
		url: './getProvince',
		type: 'POST',
		dataType: 'json',
		data: {
			'_token': $('input[name=_token]').val(),
			'id'	: data
		},
		success: function(data){
			$.each(data, function(index, item) {
				var newOption = new Option(item.provName, item.id, false, false);
				$('.RegionSpecProvinceList').append(newOption).trigger('change');
			});
		}
	});
}

function regionSpecProvChangeValue2(data) {
	//console.log(data);
	$.ajax({
		url: '/getProvince',
		type: 'POST',
		dataType: 'json',
		data: {
			'_token': $('input[name=_token]').val(),
			'id'	: data
		},
		success: function(data){
			$.each(data, function(index, item) {
				var newOption = new Option(item.provName, item.id, false, false);
				$('.RegionSpecProvinceList').append(newOption).trigger('change');
			});
		}
	});
}

// $('#proj_cov_main').click(function(event) {
// 	console.log('hi');
// 	if ($(this).val() == 'Interregional') {
// 		$('.interRegionalModal').modal('show');
// 	} else if ($(this).val() == 'Region Specific') {
// 		$('.RegionSpec').modal('show');
// 	}
// });

function findProvince(data) {
	var a;
  $.ajax({
  		url: '/findProvince',
  		type: 'POST',
  		dataType: 'json',
  		data: {
  			'_token': $('input[name=_token]').val(),
  			'id'	: data
  		},
  		success: function(data){
  			//console.log(data);
  			$.each(data, function(index, item) {
  				a = new Option(item, item, true);
  				$('.provinceList2').val(a).trigger('change');
  				//$('.provinceList2').select2().select2('val',a);
			});
  			console.log(a);
  		}
  	});
}

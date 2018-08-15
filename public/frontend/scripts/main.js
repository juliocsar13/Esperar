$(function(){
	$(document).ready(function(){
		var lifestyle = GetURLParameter('lifestyle');
		var place = GetURLParameter('place');
		var country = GetURLParameter('country');
		if (lifestyle) {
			localStorage.setItem('lifestyle', lifestyle);
			localStorage.setItem('select3', document.getElementById('lb-lifestyle-'+lifestyle+'').innerText);
		}
		if (place) {
			localStorage.setItem('place', place);
			localStorage.setItem('select2', document.getElementById('lb-place-'+place+'').innerText);
		}
		if (country) {
			localStorage.setItem('country', country);
			localStorage.setItem('select1', document.getElementById('lb-country-'+country+'').innerText);
		}
	})
	$(document).ready(function(){

		if (localStorage.getItem('country') && localStorage.getItem('select1')) {
			document.getElementById('check-country-'+localStorage.getItem('country')+'').setAttribute("checked", "checked");
		}
		if (localStorage.getItem('place') && localStorage.getItem('select2')) {
			document.getElementById('check-place-'+localStorage.getItem('place')+'').setAttribute("checked", "checked");
		}
		if (localStorage.getItem('select3') && localStorage.getItem('select3')) {
			document.getElementById('check-life-'+localStorage.getItem('select3')+'').setAttribute("checked", "checked");
		}
		preview();
		//setTimeout(getReviews(), 2000);
		getReviews();
	});
	$(document).ready(function(){
		$("#previewId").on("click", ".preview .preview_one", function() {
			//console.log('click')
	  		$(this).parent(".preview").remove();
	  		document.getElementById('check-country-'+localStorage.getItem('country')+'').checked = false;
	  		localStorage.removeItem('select1');
	  		localStorage.removeItem('country');
	  		getReviews();
	  	});
	  	$("#previewId").on("click", ".preview .preview_two", function() {
	  		$(this).parent(".preview").remove();
	  		document.getElementById('check-place-'+localStorage.getItem('place')+'').checked = false;
	  		localStorage.removeItem('select2');
	  		localStorage.removeItem('place');
	  		getReviews();
	  	});
	  	$("#previewId").on("click", ".preview .preview_three", function() {
	  		$(this).parent(".preview").remove();
	  		document.getElementById('check-life-'+localStorage.getItem('select3')+'').checked = false;
	  		localStorage.removeItem('select3');
	  		localStorage.removeItem('lifestyle');
	  		getReviews();
	  	});
			$("input:checkbox").on('click', function() {
				var checkbox_place = [];
				var checkbox_country = [];
				var checkbox_life = [];
		    var $box = $(this);
				if ($box.is(":checked")) {
		     	var group = "input:checkbox[name='" + $box.attr("name") + "']";
					if (this.className == "check_country") {
						localStorage.setItem('country', $box.val());
						localStorage.setItem('select1',$('#'+this.labels[0].id+'').text());
						getReviews();
					}
					if (this.className=="check_place") {
						localStorage.setItem('place', $box.val());
						localStorage.setItem('select2',$('#'+this.labels[0].id+'').text());
						getReviews();
					}
					if (this.className=="check_life") {
						localStorage.setItem('lifestyle',$box.val());
						localStorage.setItem('select3',$('#'+this.labels[0].id+'').text());
						getReviews();
					}
					$(group).prop("checked", false);
			      $box.prop("checked", true);
			    }else {
					if (this.className == 'check_country') {
						localStorage.removeItem('select1');
						localStorage.removeItem('country');
						preview();
						getReviews();
					}
					if (this.className == 'check_place') {
						localStorage.removeItem('select2');
						localStorage.removeItem('place');
						preview();
						getReviews();
					}
					if (this.className == 'check_life') {
						localStorage.removeItem('select3');
						localStorage.removeItem('lifestyle');
						preview();
						getReviews();
					}
					$box.prop("checked", false);
				}
		  	});
	})
	function preview(){
		$("#previewId").empty();

		if (localStorage.getItem('select1')) {
			$("#previewId").append('<li  class="preview"><a class="preview_one"><i  class="sl sl-icon-close"></i></a>'+localStorage.getItem('select1')+'</li>');
		}
		if (localStorage.getItem('select2')) {
			$("#previewId").append('<li class="preview"><a class="preview_two"><i  class="sl sl-icon-close"></i></a>'+localStorage.getItem('select2')+'</li>');
		}
		if (localStorage.getItem('select3')) {
			$("#previewId").append('<li class="preview"><a class="preview_three"><i  class="sl sl-icon-close"></i></a>'+localStorage.getItem('select3')+'</li>');
		}
	}
	function _html_(reviews){
		var review = $.map(reviews, function(value, index) {
				return [value];
		});
		var html = [];
		var fiveStars = starsOutput('star','star','star','star','star');
		var fourHalfStars = starsOutput('star','star','star','star','star half');
		var fourStars = starsOutput('star','star','star','star','star empty');
		var threeHalfStars = starsOutput('star','star','star','star half','star empty');
		var threeStars = starsOutput('star','star','star','star empty','star empty');
		var twoHalfStars = starsOutput('star','star','star half','star empty','star empty');
		var twoStars = starsOutput('star','star','star empty','star empty','star empty');
		var oneHalfStar = starsOutput('star','star half','star empty','star empty','star empty');
		var oneStar = starsOutput('star','star empty','star empty','star empty','star empty');
		var start = [];

		for (var i = 0; i < review.length; i++) {
			if (review[i].state == 'Ocultar') {
				for (var j = 0; j < review[i].valoration; j++) {
					if (review[i].valoration >= 4.75) {
							start[i] = fiveStars;
					} else if (review[i].valoration >= 4.25) {
							start[i] = fourHalfStars;
					} else if (review[i].valoration >= 3.75) {
							start[i] = fourStars;
					} else if (review[i].valoration >= 3.25) {
							start[i] = threeHalfStars;
					} else if (review[i].valoration >= 2.75) {
							start[i] = threeStars;
					} else if (review[i].valoration >= 2.25) {
							start[i] = twoHalfStars;
					} else if (review[i].valoration >= 1.75) {
							start[i] = twoStars;
					} else if (review[i].valoration >= 1.25) {
							start[i] = oneHalfStar;
					} else if (review[i].valoration < 1.25) {
							start[i] = oneStar;
					}
				}
				console.log(start[0]);

				html[i] = '<div class="col-lg-12 col-md-12">'+
					'<div class="listing-item-container list-layout">'+
						'<a href="/reviews/'+ review[i].slug +'" class="listing-item">'+
							'<div class="listing-item-image">'+
									'<img src='+ review[i].image_first +'>'+
								'<span class="tag">'+ review[i].category_name + '</span>'+
							'</div>'+
							'<div class="listing-item-content">'+
								'<div class="listing-badge now-open">Nueva</div>'+
								'<div class="listing-item-inner">'+
									'<h3>'+review[i].name+'<i class="verified-icon"></i></h3>'+
									'<span>'+ review[i].place_name +', '+ review[i].place_province +','+ review[i].place_city+'</span>'+
									'<h5 style="margin-bottom: -20px;">'+review[i].description.split(" ").splice(0, 7).join(" ")+'</h5>'+
									'<div class="star-init star-rating" data-rating='+review[i].valoration+'>'+
										'<div class="rating-counter">'+review[i].calification+'</div>'+
										''+start[i]+''
									'</div>'+
								'</div>'+
							'</div>'+
						'</a>'+
					'</div>'+
				'</div>';
			}
		}
		return html;
	}
	function getReviews(){
		updateURL();
		var data  = {
			country: localStorage.getItem('country'),
			place: localStorage.getItem('place'),
			lifestyle: localStorage.getItem('lifestyle')
		};
		if (localStorage.getItem('country')== null &&localStorage.getItem('place') == null &&localStorage.getItem('lifestyle') == null) {
			localStorage.setItem('all', 'all');
			data.all = localStorage.getItem('all');
		}else {
			data.all = null;
			localStorage.removeItem('all')
		}
		$.ajax({
			url: '/listar-reviews',
			type: 'get',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			contentType: 'json',
			data: data,
			success: function(review){
				if (review.data) {
					if(review){
						var html = _html_(review.data);
						$("#filterId").empty().append(html);
						preview();
					} else {
						$('#filterId').empty();
					}
				}
			}, error: function(xhr, status){
				//console.log('status error',JSON.stringify(status));
			}, complete: function(xhr, status, data){
				//console.log('status complete',JSON.stringify(status));
			}
		})
	}
	function updateURL() {
	  if (history.pushState) {
				if (localStorage.getItem('lifestyle') == null && localStorage.getItem('place') && localStorage.getItem('country')) {
					var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?lifestyle=&'+'place='+localStorage.getItem('place')+'&'+'country='+localStorage.getItem('country')+'';
					window.history.pushState({path:newurl},'',newurl);
				} else if (localStorage.getItem('lifestyle') == null && localStorage.getItem('place') == null && localStorage.getItem('country')) {
					var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?lifestyle=&'+'place=&'+'country='+localStorage.getItem('country')+'';
					window.history.pushState({path:newurl},'',newurl);
				}else if (localStorage.getItem('place') == null && localStorage.getItem('lifestyle') && localStorage.getItem('country')) {
					var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?lifestyle='+localStorage.getItem('lifestyle')+'&'+'place=&'+'country='+localStorage.getItem('country')+'';
					window.history.pushState({path:newurl},'',newurl);
				}else if (localStorage.getItem('country') == null && localStorage.getItem('place') && localStorage.getItem('lifestyle')) {
					var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?lifestyle='+localStorage.getItem('lifestyle')+'&'+'place='+localStorage.getItem('place')+'&'+'country=';
					window.history.pushState({path:newurl},'',newurl);
				} else if (localStorage.getItem('country') == null && localStorage.getItem('lifestyle') == null && localStorage.getItem('place')) {
					var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?lifestyle=&'+'place='+localStorage.getItem('place')+'&'+'country=';
					window.history.pushState({path:newurl},'',newurl);
				}else if (localStorage.getItem('country') == null && localStorage.getItem('place') == null && localStorage.getItem('lifestyle')) {
					var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?lifestyle='+localStorage.getItem('lifestyle')+'&'+'place=&'+'country=';
					window.history.pushState({path:newurl},'',newurl);
				} else if (localStorage.getItem('country') == null && localStorage.getItem('place') == null && localStorage.getItem('lifestyle') == null) {
					var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?lifestyle=&'+'place=&'+'country=';
					window.history.pushState({path:newurl},'',newurl);
				}else if (localStorage.getItem('lifestyle') && localStorage.getItem('place') && localStorage.getItem('country')) {
					var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?lifestyle='+ localStorage.getItem('lifestyle')+'&'+'place='+localStorage.getItem('place')+'&'+'country='+localStorage.getItem('country')+'';
					window.history.pushState({path:newurl},'',newurl);
				}
	  }
	}
	function GetURLParameter(sParam){
	    var sPageURL = window.location.search.substring(1);
	    var sURLVariables = sPageURL.split('&');
	    for (var i = 0; i < sURLVariables.length; i++){
	        var sParameterName = sURLVariables[i].split('=');
	        if (sParameterName[0] == sParam){ return sParameterName[1]; }
	    }
	}
	function starsOutput(firstStar, secondStar, thirdStar, fourthStar, fifthStar) {
		return(''+
			'<span class="'+firstStar+'"></span>'+
			'<span class="'+secondStar+'"></span>'+
			'<span class="'+thirdStar+'"></span>'+
			'<span class="'+fourthStar+'"></span>'+
			'<span class="'+fifthStar+'"></span>');
	}
})

$(function(){
		$(document).ready(function(){
			localStorage.removeItem('select1');
			localStorage.removeItem('select2');
			localStorage.removeItem('select3');
			localStorage.removeItem('country');
			localStorage.removeItem('place');
			localStorage.removeItem('lifestyle');

			$('#searchHome').on('click', function(){
				var life  = $('#home-life-id').find(':selected').data('life')
				var country = $('#home-place-id').find(':selected').data('country')
				var place = $('#home-place-id').find(':selected').data('place')
				var life_id = $('#home-life-id').find(':selected').val();
				var place_id = $('#home-place-id').find(':selected').val();
				var country_id = $('#home-place-id').find(':selected').data('country-id')
				if (life) {
					localStorage.setItem('select3', life);
				}
				if (country) {
					localStorage.setItem('select1', country);
				}
				if (place) {
					localStorage.setItem('select2', place);
				}
				if (country_id) {
					localStorage.setItem('country', country_id);
				}
				if (place_id) {
					localStorage.setItem('place', place_id);
				}
				if (life_id) {
					localStorage.setItem('lifestyle', life_id);
				}
			})
		})
		$(document).ready(function(){
			$(document).ready(function(){
				$( "#home-place-id" )
				  .change(function() {
				    var str = "";
				    $( "select option:selected" ).each(function() {
				      country_id = $( this ).data('country-id')
				    });
						$('#id_country_hidden').val(country_id);
				  }).trigger( "change" );
			})
		})
})

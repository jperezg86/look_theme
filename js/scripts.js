(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		$('.ver_mas').on('click', function(e){
			e.preventDefault();
			$.ajax({
				url : liverpool_vars.ajaxurl,
				dataType: 'JSON',
				data : {
					action : 'get_more_notes'
				},
				success : function(result){
					console.log(result);
				}
			});
		});
		
	});


	
})(jQuery, this);

(function () {
	
	var parallax = function() {
		$(window).stellar();
	};

	var features = function() {
		if ( $('#features').length > 0 ) {	
			console.log($('#features').length);

			$('#features').waypoint( function( direction ) {
										
				if( direction === 'down' && !$(this.element).hasClass('animated') ) {


					setTimeout(function() {
						$('#features .to-animate').each(function( k ) {
							var el = $(this);
							
							setTimeout ( function () {
								el.addClass('fadeInRight animated');
							},  k * 200, 'easeInOutExpo' );
							
						});
					}, 1000);

					
					$(this.element).addClass('animated');
						
				}
			} , { offset: '80%' } );

		}
	};

	$(function(){

		parallax();
		features();
	}());

}());
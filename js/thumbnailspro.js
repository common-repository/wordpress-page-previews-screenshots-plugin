jQuery( function($) {
	$(window).on("load", function() {
		if ( (typeof tnp_filter_location != 'undefined') && ( tnp_filter_location=='all' ) ) {
			jQuery( 'a' ).each(function() {
	  		if( location.hostname === this.hostname || !this.hostname.length ) {
	      	if ( ( tnp_filter_scope=='all' ) || ( tnp_filter_scope=='internal' ) ) jQuery(this).addClass('thumbnailspro');
	  		} else {
	      	if ( ( tnp_filter_scope=='all' ) || ( tnp_filter_scope=='external' ) ) jQuery(this).addClass('thumbnailspro');
	  		}
			});		
		}
		
		$(".thumbnailspro").mouseover( function() {
			if ( $(this).hasClass('ab-item') ) return;
			if ( $(this).hasClass('preview-block-link') ) return;
			var preview_url = $(this).attr('href');
			var thumb_url = thumbnailspro_tnp_url + encodeURIComponent(preview_url)+'?s='+(thumb_size);
			var thumb_width = parseInt(thumb_size) + 2;
			var thumb_height = (parseInt(thumb_size) * .75) + 2;
			//@@@ we need to check scope
			$('#fdImage').attr('src', thumb_url );
			$("#fdImageThumb").css({"width": thumb_width + "px" });
			$("#fdImageThumb").css({"height": thumb_height + "px" });
			$("#fdImageThumb").show();
			$("#fdImageThumb").position({
		    my:        "left top",
		    at:        "right bottom",
		    of:        this, // or $("#otherdiv)
		    collision: "fit"
			});
		});

		$(".thumbnailspro").mouseout( function() {
			$('#fdImage').attr('src', "" );
			$("#fdImageThumb").hide();
		});


	});



});


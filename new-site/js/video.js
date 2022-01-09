$('#video-wrapper').click(function(e) {
	
	let video = $(this).find('video').get(0);
	if(e.target.classList.contains("eSwYtm")) {
		if($('#video-wrapper').hasClass('closed')) {
			$('#video-wrapper').remove();
			return false;
		}
		
	}
	if(e.target.classList.contains("eSwYtm")) {
		$('#video-wrapper').addClass('drKoCD iivicK closed').removeClass('jLZoYp');
		$('#video-wrapper video').get(0).muted = true;
		video.play();
		return false;
	}
	
	if($(this).prop('open')) {			
		if(video.paused) {
			video.play();
		} else {
			video.pause()
		}
		if($(this).hasClass('closed')) {
			$(this).removeClass('drKoCD iivicK closed').addClass('jLZoYp');
			video.play();
		}
	} else {
		$(this).removeClass('drKoCD iivicK').addClass('jLZoYp').prop('open', 'open');
	}
	video.muted = !video.muted;
});
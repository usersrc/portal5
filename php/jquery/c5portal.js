$(document).ready(function() {	
	navDisplayActiveSections();
	checkNav();
	dialog();
});


// ----- Navigation Anfang -----  
function navDisplayActiveSections() {
	$(".nav_section").each(function() {
		if(!$(this).find(".nav_visible").length) {
			$(this).css('display', 'none');
		}
	});
};

function checkNav() {
	if (window.location.href.search('content') == -1){
		window.location.href = window.location.href + '?content=start';
	} else {
		var split_url = window.location.href.split('?'),
			split_url2 = split_url[1].split('=');
			php_parameter = split_url2[1];

		$('#' + php_parameter).addClass('nav_active');
	}
};
// ----- Navigation Ende -----

// ----- Perso Anfang -----
function dialog() {
	var $background = $('#background'),
		$dialog = $('.dialog'),
		$close = $('.dialog_close');

	// set height when dialog is opened
	var dialogheight = $('body').css('height');
	$background.css('height', dialogheight);

	$('.button-dialog-open').on('click', function() {
		$background.fadeIn('fast');
		$dialog.fadeIn('fast');
	});
	$background.on('click', function() {
		closeDialog();
	});
	$close.on('click', function() {
		closeDialog();
	});
	function closeDialog() {
		$background.fadeOut('fast');
		$dialog.fadeOut('fast');
	};
};
// ----- Perso Ende -----
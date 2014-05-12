$(document).ready(function() {	
	navDisplayActiveSections();
	checkNav();
	openDialog();
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
function openDialog() {
	$('#button-dialog-open').on('click', function() {
		$('#background').show();
	});
};
// ----- Perso Ende -----
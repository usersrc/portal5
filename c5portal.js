$(document).ready(function() {	
	navDisplayActiveSections();
	// checkNav();

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
	alert(window.location.assign);
};
// ----- Navigation Ende -----
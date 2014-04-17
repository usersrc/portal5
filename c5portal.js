$(document).ready(function() {	
	navDisplayActiveSections();

});

function navDisplayActiveSections() {
	$(".nav_section").each(function() {
		if(!$(this).find(".nav_active").length) {
			$(this).css('display', 'none');
		}
	});
};
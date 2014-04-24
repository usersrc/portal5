$(document).ready(function() {	
	navDisplayActiveSections();

});

function navDisplayActiveSections() {
	$(".nav_section").each(function() {
		if(!$(this).find(".nav_visible").length) {
			$(this).css('display', 'none');
		}
	});
};
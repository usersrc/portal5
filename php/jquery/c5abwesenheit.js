jQuery(function ($) {
    $.datepicker.regional['de'] = {
        clearText: 'löschen', clearStatus: 'aktuelles Datum löschen',
        closeText: 'schließen', closeStatus: 'ohne Änderungen schließen',
        prevText: '<zurück', prevStatus: 'letzten Monat zeigen',
        nextText: 'Vor>', nextStatus: 'nächsten Monat zeigen',
        currentText: 'heute', currentStatus: '',
        monthNames: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni',
                'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
        monthNamesShort: ['Jan', 'Feb', 'März', 'April', 'Mai', 'Juni',
                'Juli', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'],
        monthStatus: 'anderen Monat anzeigen', yearStatus: 'anderes Jahr anzeigen',
        weekHeader: 'Wo', weekStatus: 'Woche des Monats',
        dayNames: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'],
        dayNamesShort: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'],
        dayNamesMin: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'],
        dayStatus: 'Setze DD als ersten Wochentag', dateStatus: 'Wähle D, M d',
        dateFormat: 'dd.mm.yy', firstDay: 1,
        initStatus: 'Wähle ein Datum', isRTL: false
    };
});

$(document).ready(function() {	
	$.datepicker.setDefaults($.datepicker.regional["de"]);
    $('#startdate').datepicker({
        dateFormat: "dd.mm.yy",
        minDate: new Date(),
        firstDay: 1,
        numberOfMonths: 3,
        changeMonth: true,
        onClose: function (selectedDate) {
            $("#enddate").datepicker("option", "minDate", selectedDate)
        }
    });

    $('#enddate').datepicker({
        dateFormat: "dd.mm.yy",
        minDate: new Date(),
        firstDay: 1,
        numberOfMonths: 3,
        changeMonth: true,
        onClose: function (selectedDate) {
            $("#startdate").datepicker("option", "maxDate", selectedDate)
        }
    });
});
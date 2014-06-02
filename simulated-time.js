$(function() {
	var update = parseInt($('#now').data('update')),
	    multiplier = parseInt($('body').data('multiplier'),10),
	    now = new Date(parseInt($('#now').data('timestamp') * 1000,10)),
	    start = new Date(parseInt($('#start').data('timestamp') * 1000,10)),
	    offset = parseInt($('#offset').text(),10),
	    simulated = parseInt($('#simulated').data('timestamp') * 1000,10),
	    simulated_date = new Date(simulated),
	    time;
	
	setInterval(function() {
		if (update) {
			time = new Date();
			timezone = (time.getTimezoneOffset() * 60);
			time = time.getTime();
			offset = time - start;
			simulated = -62135596800000 + (offset * multiplier);

			$('#now').attr(
				'data-timestamp',
				parseInt(time / 1000,10)
			).text(
				date('jS M Y @ g:ia',(time / 1000) + timezone)
			);

			$('#offset').text(
				parseInt(offset / 1000,10)
			);

			$('#simulated').attr(
				'data-timestamp',
				parseInt(simulated / 1000,10)
			).text(
				'Year ' + parseInt(date('Y',(simulated / 1000)),10) + ', Day ' + date('z - jS M @ g:ia',(simulated / 1000))
			);
		}
	}, (multiplier > 60 ? (1000 / (multiplier / 60)) : 1000));
});
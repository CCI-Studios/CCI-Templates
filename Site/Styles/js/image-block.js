window.addEvent('domready', function() {
	$$('img').addEvent('click', function(e) {
		e = new Event(e);
		e.stop();
		
		console.log(this);
	});
});
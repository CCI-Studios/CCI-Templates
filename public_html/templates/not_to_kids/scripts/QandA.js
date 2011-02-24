window.addEvent('domready', function() {
	$$('.QandA').each(function(block) {
		var q, a, toggle;
		q = block.getElement('.question');
		a = block.getElement('.answer');
		
		if (q === null || a === null)
			return;
			
		toggle = new Fx.Slide(a, {
			duration: 500,
			transition: Fx.Transitions.expoInOut
		});
		
		toggle.hide();
		
		q.setStyles({
			cursor: 'pointer',
			'font-weight': 'bold'
		})
		q.addEvent('click', function() {
			toggle.stop();
			toggle.toggle();
		});
		
	});
});
window.addEvent('domready', function() {
	var accordians = $$('.accordion');
	accordians.each(function(el) {
		var togglers = el.getElements('h2');
		var elements = el.getElements('ul');
		
		elements[elements.length-1].addClass('last');
		
		var accordion = new Fx.Accordion(togglers, elements, {
			alwaysHide: true,
			show: '-1'
		});
	});
});
(function(window, document, undefined) {
	
	function setupRollover(image) {
		if (image.src.indexOf('-normal') === -1) // -normal not found
			return;
			
		image.addEvents({
			mouseenter: function() {
				image.src = image.src.replace('-normal', '-over');
			},
			mouseleave: function() {
				image.src = image.src.replace('-over', '-normal');
			}
		});
		
		new Asset.image(image.src.replace('-normal', '-over'));
	}
	
	window.addEvent('domready', function() {
		var rollovers = $$('img.rollover');
		rollovers.each(setupRollover);
	});
})(this, this.document);
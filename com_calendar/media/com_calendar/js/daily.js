/*
 * automatically create the nessesary animations for the daily image.
 */

(function (window, document, undefined) {
	var dailyImage = {
		init: function(selector) {
			var els = this.els = $$(selector);
			
			for (var i = els.length-1; i>= 0; i--) {
				els[i].getElements('.image').each(function(image) {
					var description = image.parentNode.getElement('.description');
					description.setProperty('data-height', description.getSize().scrollSize.y);
					var toggle = new Fx.Style(description, 'height');
					toggle.set(0);
					
					image.addEvents({
						mouseenter: function() {
							toggle.stop();
							toggle.start(description.getProperty('data-height'));
						},
						mouseleave: function() {
							toggle.stop();
							toggle.start(0);
						}
					})
					
				});
			}
		},
		show: function() {
			
		},
		hide: function() {
			
		}
	};
	window.addEvent('domready', dailyImage.init.bind(dailyImage, '.com_calendar .daily_image'));
	

})(this, this.document);
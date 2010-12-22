(function (window, document, undefined) {
	
	var setupPop = function (elements) {
		elements.addEvents({
			mouseenter: function() {
				this.addClass('hover');
			},
			mouseleave: function() {
				this.removeClass('hover');
			}
		});
	}
	
	window.addEvent('load', function() {
		setupPop($$('#menu .menu li'));
		setupPop($$('#bottom .moduleBlock'));
	});
})(this, this.document);


(function (window, document, undefined) {
	
	var setupMove = function (element) {
		var toggle, left;
		toggle = new Fx.Styles(element, {
			duration: 200
		});
		left = parseInt(element.getStyle('left'), 10);
		
		element.addEvents({
			mouseenter: function() {
				toggle.stop();
				toggle.start({
					top: -23,
					left: left-20,
					width: 329,
					height: 357,
					padding: "16px 14px 15px 15px"
				})
			},
			mouseleave: function() {
				toggle.stop();
				toggle.start({
					top: 0,
					left: left,
					width: 316,
					height: 345,
					padding: 0
				});
			}
		})
	}
	
	window.addEvent('load', function() {
		$$('#bottom .moduleBlock').each(setupMove);
	});
})(this, this.document);

(function (window, document, undefined) {
	
	var setupMove = function (element) {
		var toggle, left;
		toggle = new Fx.Styles(element, {
			duration: 200
		});
		left = parseInt(element.getStyle('left'), 10);
		
		element.addEvents({
			mouseenter: function() {
				toggle.stop();
				toggle.start({
					top: -20,
					left: left-30,
					width: 333,
					height: 72,
					padding: "15px 15px 14px"
				})
			},
			mouseleave: function() {
				toggle.stop();
				toggle.start({
					top: 0,
					left: left,
					width: 316,
					height: 64,
					padding: 0
				});
			}
		})
	}
	
	window.addEvent('load', function() {
		$$('#menu .menu li').each(setupMove);
	});
})(this, this.document);


(function (window, document, undefined) {
	var menus, images, def;
	
	var setupImage = function(index) {
		menus[index].addEvents({
			mouseenter: function() {
				images[index].removeClass('hidden');
				def.addClass('hidden');
			},
			mouseleave: function() {
				images.addClass('hidden');
				def.removeClass('hidden');
			}
		})
	}
	
	window.addEvent('domready', function() {
		menus		= $$('body.home #menu .menu li');
		images	= $$('#header .header_image');
		
		def = images.shift();
		
		for (i = menus.length-1; i >= 0; i--) {
			setupImage(i);
		}
	});
})(this, this.document);
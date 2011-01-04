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
					top: -21,
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
		var toggleMenu, toggleTL, toggleBR, left, settings, topleft, bottomright;
		
		bottomright = new Element('div');
		topleft = new Element('div');
		
		bottomright.adopt(element.getFirst());
		bottomright.injectInside(topleft);
		topleft.injectInside(element);
		
		toggleMenu = new Fx.Styles(element, {
			duration: 200
		});
		toggleTL = new Fx.Styles(topleft, {
			duration: 200
		});
		toggleBR = new Fx.Styles(bottomright, {
			duration: 200
		});
		
		
		left = parseInt(element.getStyle('left'), 10);
		
		settings = {
			menuUp: {
				top: -20,
				left: left-23,
				width: 363,
				height: 106
			},
			menuDown: {
				top: 0,
				left: left,
				width: 316,
				height: 64
			},
			tlUp: {
				'padding-top': 18,
				'padding-right': 0,
				'padding-bottom': 0,
				'padding-left': 15
			},
			tlDown: { padding: 0 },
			brUp: {
				'padding-top': 0,
				'padding-right': 15,
				'padding-bottom': 15,
				'padding-left': 0
			},
			brDown: { padding: 0 }
		}
		
		element.addEvents({
			mouseenter: function() {
				toggleMenu.stop();
				toggleBR.stop();
				toggleTL.stop();
				
				toggleMenu.start(settings.menuUp);
				toggleBR.start(settings.brUp);
				toggleTL.start(settings.tlUp);
			},
			mouseleave: function() {
				return;
				toggleMenu.stop();
				toggleBR.stop();
				toggleTL.stop();
				
				toggleMenu.start(settings.menuDown);
				toggleBR.start(settings.brDown);
				toggleTL.start(settings.tlDown);
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
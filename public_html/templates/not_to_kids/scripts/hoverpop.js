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
		setupPop($$('#bottom .moduleBlock'));
	});
})(this, this.document);


(function (window, document, undefined) {
	
	var setupMove = function (element, index) {
		var toggle, left, settings, contents, cToggle;
		toggle = new Fx.Styles(element, {
			duration: 100
		});
		
		contents = element.getElement('.body');
		cToggle = new Fx.Styles(contents, {
			duration: 100
		});

		element.setStyles({
			position: 'absolute',
			top: 0,
			left: index*237
		});
		
		settings = {
			enter: {
				top: -21,
				left: index*237-8-15,
				width: 253,
				height: 357,
				'padding-top': 16,
				'padding-right': 14,
				'padding-bottom': 15,
				'padding-left': 15
			},
			leave: {
				top: 0,
				left: index*237,
				width: 237,
				height: 345,
				'padding-top': 0,
				'padding-right': 0,
				'padding-bottom': 0,
				'padding-left': 0
			},
			cOver: {
				'padding-left': 22,
				'padding-right': 22
			},
			cLeave: {
				'padding-left': 14,
				'padding-right': 14
			}
		}
		
		element.addEvents({
			mouseenter: function() {
				toggle.stop();
				cToggle.stop();
				toggle.start(settings.enter);
				cToggle.start(settings.cOver);
			},
			mouseleave: function() {
				toggle.stop();
				cToggle.stop();
				toggle.start(settings.leave);
				cToggle.start(settings.cLeave);
			}
		})
	}
	
	window.addEvent('load', function() {
		$$('#bottom .moduleBlock').each(setupMove);
	});
})(this, this.document);

(function (window, document, undefined) {
	
	var setupMove = function (element, index) {
		var toggleLi, toggleDiv1, toggleDiv2, toggleSpan, left, span, div1, div2, settings;
		
		span = element.getElement('* span');
		div1 = new Element('div');
		div2 = new Element('div');
		
		div1.injectInside(element)
		div2.injectInside(div1);
		div2.adopt(element.getFirst());
		
		toggleLi = new Fx.Styles(element, {
			duration: 100
		});
		toggleDiv1 = new Fx.Styles(div1, {
			duration: 100
		});
		toggleDiv2 = new Fx.Styles(div2, {
			duration: 100
		});
		toggleSpan = new Fx.Styles(span, {
			duration: 100
		});
		
		element.setStyles({
			position: 'absolute',
			top: 0,
			left: 237*index
		})
		left = parseInt(element.getStyle('left'), 10);
		
		settings = {
			liUp: {
				width: 247+15+15,
				left: left-23,
				top: -22
			},
			liDown: {
				width: 237,
				left: left,
				top: 0
			},
			div1Up: {
				'padding-top': 18,
				'padding-right': 0,
				'padding-bottom': 0,
				'padding-left': 15
			},
			div1Down: {
				'padding-top': 0,
				'padding-right': 0,
				'padding-bottom': 0,
				'padding-left': 0
			},
			div2Up: {
				'padding-top': 0,
				'padding-right': 15,
				'padding-bottom': 15,
				'padding-left': 0
			},
			div2Down: {
				'padding-top': 0,
				'padding-right': 0,
				'padding-bottom': 0,
				'padding-left': 0
			},
			spanUp: {
				'padding-top': 14,
				'padding-right': 9,
				'padding-bottom': 5,
				'padding-left': 9,
				'background-position-y': 9,
				'line-height': 54
			},
			spanDown: {
				'padding-top': 10,
				'padding-right': 0,
				'padding-bottom': 0,
				'padding-left': 0,
				'background-position-y': 5,
				'line-height': 57
			}
		}
		
		toggleLi.set(settings.liDown);
		toggleDiv1.set(settings.div1Down);
		toggleDiv2.set(settings.div2Down);
		toggleSpan.set(settings.spanDown);
		
		element.addEvents({
			mouseenter: function() {
				toggleLi.stop();
				toggleDiv1.stop();
				toggleDiv2.stop();
				toggleSpan.stop();
				
				toggleLi.start(settings.liUp);
				toggleDiv1.start(settings.div1Up);
				toggleDiv2.start(settings.div2Up);
				toggleSpan.start(settings.spanUp);
			},
			mouseleave: function() {
				toggleLi.stop();
				toggleDiv1.stop();
				toggleDiv2.stop();
				toggleSpan.stop();
				
				toggleLi.start(settings.liDown);
				toggleDiv1.start(settings.div1Down);
				toggleDiv2.start(settings.div2Down);
				toggleSpan.start(settings.spanDown);
			}
		});
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
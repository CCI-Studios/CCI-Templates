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
		menus	= $$('body.home #menu .menu li');
		images	= $$('#header .header_image');
				 
		def = images.shift();
		
		for (i = menus.length-1; i >= 0; i--) {
			setupImage(i);
		}
	});
})(this, this.document);

var ItemPop = new Class({
	
	elements: 	null,
	settings: 	null, 
	toggles:	null,
	
	initialize: function(container) {
		var i;
		
		this.elements	= this.getElements(container);
		this.settings	= this.getSettings();
		this.toggles	= new Array();
		
		for (i = 0; i < this.elements.length; i++) {
			this.toggles.push(new Fx.Styles(this.elements[i], this.getTransition()));
		}
		
		container.addEvents({
			mouseenter: this.transition.bind(this, 1),
			mouseleave: this.transition.bind(this, 0)
		});
		this.transition(0);
	},
	
	getElements: function(container) {
		return new Array();
	},
	getSettings: function() {
		return new Array();
	},
	getTransition: function () {
		return { 'duration': 200 };
	},
	
	transition: function(index) {
		var i;
		for (i = this.toggles.length - 1; i >= 0; i--) {
			this.toggles[i].stop();
			this.toggles[i].start(this.settings[i][index]);
		}
	},
});

var MenuItemPop = ItemPop.extend({
	getElements: function (container) {
		var elements = new Array();
		
		elements.push(container);
		elements.push((container.getElement('a') !== null)? container.getElement('a') : container.getElement('span'));
		elements.push(elements[1].getElement('span'));
		
		return elements;
	},
	getSettings: function() {
		return [
				[ {}, {} ],
				[ { 'padding-top': 5, 'top': 0 }, { 'padding-top': 9, 'top': -4 } ],
				[ { 'padding-bottom': 0 }, { 'padding-bottom': 4 } ]
			   ];
	}
});

var MenuItemPop = ItemPop.extend({
	getElements: function (container) {
		var elements = new Array();
		
		elements.push(container);
		elements.push((container.getElement('a') !== null)? container.getElement('a') : container.getElement('span'));
		elements.push(elements[1].getElement('span'));
		
		return elements;
	},
	getSettings: function() {
		return [
				[ {}, {} ],
				[ { 'padding-top': 5, 'top': 0 }, { 'padding-top': 9, 'top': -4 } ],
				[ { 'padding-bottom': 0 }, { 'padding-bottom': 4 } ]
			   ];
	}
});

var BottomItemPop = ItemPop.extend({
	getElements: function (container) {
		var elements = new Array();
		
		elements.push(container);
		elements.push(container.getElement('.title'));
		elements.push(container.getElement('.inner'));
		elements.push(container.getElement('.body'));
		elements.push(container.getElement('h3'));
		
		return elements;
	},
	getSettings: function () {
		return [
				[ {}, {} ],	// .moduleBlock
				[ {'margin-top': 15 }, { 'margin-top': 20 } ],	// .title
				[ { 'height': 343, 'left': 0, 'top': 0, 'width': 237 }, { 'height': 355, 'left': -5, 'top': -5, 'width': 247 } ],	// .inner
				[ { 'padding-right': 14, 'padding-left': 14 }, { 'padding-right': 16, 'padding-left': 16 } ],	// .body
				[ { 'line-height': 32 }, { 'line-height': 41 } ],	// h3
			   ];
	}
});

window.addEvent('domready', function() {
	$$('#menu .moduletable_menu')[0].getElements('li').each(function(li) {
		new MenuItemPop(li);
	});
	
	$$('#bottom')[0].getElements('.moduleBlock').each(function(li) {
		new BottomItemPop(li);
	});
	
});


var DS = new Class({
	container: null,
	direction: null,
	
	initialize: function(element, direction) {
		this.container = element;
		this.direction = direction;
		
		window.addEvent('domready', this._setup.bind(this));
	},
	_setup: function() {
		this.container = $(this.container);
		
		elements = this.container.getElements('li');
		elements.each(function(el) { this._setupElement(el); }, this);
	},
	
	_setupElement: function(el) {
		var image = el.getElement('div');
		image.setStyles({
			display: 'block',
			overflow: 'hidden'
		});
		var toggle = new Fx.Styles(image, {
			duration: 200
		});
		toggle.set({
			width: 0,
			height: 0,
			padding: 0
		})
		
		el.addEvents({
			mouseenter: function() {
				toggle.stop();
				toggle.start({
					width: 104,
					height: 98,
					padding: 6
				});
			},
			mouseleave: function() {
				toggle.stop();
				toggle.start({
					width: 0,
					height: 0,
					padding: 0
				});
			}
		})
		
		
	}
});
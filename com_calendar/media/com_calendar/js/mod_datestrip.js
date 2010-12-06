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
		var image, toggle, width, height;
		
 		image = el.getElement('div');
		image.getElement('img').setStyle('display', 'block');
		image.setStyles({
			display: 'block',
			overflow: 'hidden'
		});
		width = image.getSize().size.x - 4;
		height = image.getSize().size.y - 4;
		toggle = new Fx.Styles(image, {
			duration: 200
		});
		toggle.set({
			width: 0,
			height: 0,
			'border-width': 0
		});		
		
		el.addEvents({
			mouseenter: function() {
				toggle.stop();
				toggle.start({
					width: width,
					height: height,
					'border-width': 2
				});
			},
			mouseleave: function() {
				toggle.stop();
				toggle.start({
					width: 0,
					height: 0,
					'border-width': 0
				});
			}
		})
		
		
	}
});
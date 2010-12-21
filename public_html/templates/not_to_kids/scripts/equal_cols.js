(function(window, document, undefined) {
	var setup = function() {
		containers = $$('.col_containers');
		containers.each(function(c) { setup_cols(c); });
	};
	
	var setup_cols = function(container) {
		alert(container.length);
	};

	window.addEvent('domready', setup());
})(this, this.document);
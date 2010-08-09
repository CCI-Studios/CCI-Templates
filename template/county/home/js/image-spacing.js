window.addEvent('domready', function() {
	image_autospace('img.autosize', 18);
});

function image_autospace(class, lineHeight) {
	images = $$(class);
	
	images.each(function(image) {
		height = image.getSize().size.y;
		height = Math.ceil(height/lineHeight);
		
		image.setProperty('height', lineHeight * height);
	});
}
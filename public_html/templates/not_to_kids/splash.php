<!DOCTYPE html>
<html>
<head>
	<title>Not To Kids | Pas Aux Jeunes</title>

	<link href="/templates/not_to_kids/css/splash.css" rel="stylesheet" />

	<script src="/media/system/js/mootools.js" type="text/javascript"></script>
	<script>
		(function (window, document, undefined) {
			window.addEvent('load', function() { // dont need to fill domready
				$$('img').each(function(img) {
					var normal, rollover;

					if (img.src.indexOf('_normal') === -1)
						return;	// do nothing if image doesn't have _normal in name

					normal = img.src;
					rollover = img.src.replace('_normal', '_rollover'); // get both filenames

					new Asset.image(rollover, {
						onload: function() {
							img.addEvents({
								mouseenter: function() {
									img.src = rollover;
								},
								mouseleave: function() {
									img.src = normal;
								}
							});
						}
					});
				});
			});
		})(this, this.document);

	</script>
</head>

<body>
	<div id="content"><div>
		<p class="center">Get Hooked on life not for life<br/>
			Accroches a la vie pas pour la vie</p>

		<div id="logo"><img src="/templates/not_to_kids/images/logo_both.png" /></div>

		<ul>
			<li><a href="/"><img src="/templates/not_to_kids/images/welcome_normal.png" /></a></li>
			<li><a href="/fr/"><img src="/templates/not_to_kids/images/bienview_normal.png" /></a></li>
		</ul>
	</div></div>
	<div id="footer">
		<div class="left">&copy; Not to Kids <?php echo date('Y'); ?></div>
		<div class="right">&copy; Pas aux Jeunes <?php echo date('Y'); ?></div>
	</div>
</body>
</html>

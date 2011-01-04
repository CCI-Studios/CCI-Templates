<!DOCTYPE html>
<html>
<head>
	
</head>

<?php
	$width = isset($_GET['width'])? $_GET['width'] : '480';
	$height = isset($_GET['height'])? $_GET['height'] : '385';
	$movie = isset($_GET['movie'])? $_GET['movie'] : false;

	$rel = isset($_GET['rel'])? $_GET['rel'] : '0';
	$fs = isset($_GET['fs'])? $_GET['fs'] : '0';
?>

<body style="margin:0; background: #000;">
	<?php if ($movie !== false): ?>
	<div style="width: <?php echo $width; ?>px; margin: 0 auto;">
	<object width="<?php echo $width; ?>" height="<?php echo $height; ?>">
		<param name="movie" 
			value="http://www.youtube.com/v/<?php echo $movie; ?>?fs=<?php echo $fs; ?>&amp;hl=en_us&amp;rel=<?php echo $rel; ?>"></param>
		<param name="allowFullScreen" 
			value="true"></param>
		<param name="allowscriptaccess" 
			value="always"></param>
		
		<embed 
			src="http://www.youtube.com/v/<?php echo $movie; ?>?fs=<?php echo $fs; ?>&amp;hl=en_US&amp;rel=<?php echo $fs; ?>" 
			type="application/x-shockwave-flash" 
			allowscriptaccess="always" 
			allowfullscreen="true" 
			width="<?php echo $width; ?>" 
			height="<?php echo $height; ?>">
		</embed>
	</object>
	</div>
	<?php endif; ?>
</body>
</html>
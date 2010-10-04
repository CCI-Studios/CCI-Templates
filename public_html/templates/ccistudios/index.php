<!DOCTYPE html>
<?php
$menu = JSite::getMenu();
if ($menu)
    $menu = $menu->getActive();
if ($menu)
    $menu = $menu->alias;
$testing = "true";

?>
<html>
<head>
	<jdoc:include type="head" />

<?php if ($testing): ?>
	<meta name="robots" content="nofollow, noindex" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/960/template.css" />
<?php else: ?>
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/template.min.css" />
	<script type="text/javascript" src="/templates/<?php echo $this->template ?>/scripts/app.min.js"></script>
<?php endif; ?>

	<!-- iPhone -->
	<meta name="viewport" content="width=device-width,user-scalable=no" />
<link rel="apple-touch-icon" href="image.png" />
	
</head>

<body class="<?php echo $menu; ?>">
<?php if (!$testing): ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php endif; ?>


	<div class="hidden"><jdoc:include type="modules" name="hidden" style="raw" /></div>
</body>
</html>
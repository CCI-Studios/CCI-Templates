<!DOCTYPE html>
<?php
$menu = JSite::getMenu();
if ($menu)
    $menu = $menu->getActive();
if ($menu)
    $menu = $menu->alias;
$testing = true;

?>
<html>
<head>
	<jdoc:include type="head" />

<?php if ($testing): ?>
	<meta name="robots" content="nofollow, noindex" />
<?php endif; ?>

<?php if ($testing): ?>
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/template.css" />
<?php else: ?>
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/template.min.css" />
<?php endif; ?>

	<script type="text/javascript" src="/templates/<?php echo $this->template ?>/scripts/dropmenu.js"></script>
</head>

<body class="<?php echo $menu; ?>">
<?php if (!$testing): ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3335172-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php endif; ?>
	<div id="wrapper">
		<div id="body">
			<div id="header">
				<jdoc:include type="modules" name="header" style="xhtml" />
				<div class="clear"></div>
			</div>
			
			<div class="inner">
				<div id="menu">
					<jdoc:include type="modules" name="menu" style="xhtml" />
					<div class="clear"></div>
				</div>
				
				<div id="content"><div><div>
					<div id="component">
						<jdoc:include type="component" />
						<div class="clear"></div>
					</div>
					
					<div id="sidebar">
						<jdoc:include type="modules" name="sidebar" style="xhtml" />
						<div class="clear"></div>
					</div>
					
					<div class="clear"></div>
				</div></div></div>
				
				<div id="bottom">
					<jdoc:include type="modules" name="bottom" style="titleBlock" />
					<div class="clear"></div>
				</div>
			</div>
		</div>
		
		<div id="footer_spacer"></div>
		<div id="footer"><div class="inner">
			<jdoc:include type="modules" name="footer" style="xhtml" />
			<div class="clear"></div>
		</div></div>
	</div>
	
	<div class="hidden"><jdoc:include type="modules" name="hidden" style="raw" /></div>
</body>
</html>
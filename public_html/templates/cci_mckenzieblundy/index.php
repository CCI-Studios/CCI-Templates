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
<?php endif; ?>


<?php if ($testing): ?>
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/template.css" />
	<script type="text/javascript" src="/templates/<?php echo $this->template ?>/scripts/dropmenu.js"></script>
	<script type="text/javascript" src="/templates/<?php echo $this->template ?>/scripts/accordian.js"></script>
<?php else: ?>
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/template.css" />
<?php endif; ?>
</head>

<body class="<?php echo $menu; ?>">
<?php if (!$testing): ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19372383-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php endif; ?>

	<div id="wrapper">
		<div id="header"><div>
			<jdoc:include type="modules" name="header" style="xhtml" />
			
			<div class="clr"></div>
		</div></div>
	
		<div id="menu">
			<jdoc:include type="modules" name="menu" style="xhtml" />
			
			<div class="clr"></div>
		</div>
	
		<div id="body"><div>
			<div id="content" <?php echo (!$this->countModules('sidebar'))? 'class="wide"': ''; ?>>
				<jdoc:include type="component" />
				<jdoc:include type="modules" name="post-content" style="xhtml" />
				
				<div class="clr"></div>
			</div>
		
			<?php if ($this->countModules('sidebar')): ?>
			<div id="sidebar">
				<jdoc:include type="modules" name="sidebar" style="xhtml" />

				<div class="clr"></div>
			</div>
			<?php endif; ?>
			
			<div class="clr"></div>
		</div></div>
	
		<div id="footer">
			<p class="right">
				Site Developed by <a href="http://www.ccistudios.com" target="_blank">CCI Studios</a>
			</p>
			<p class="left">
				&copy; Copyright <?php echo date('Y'); ?> McKenzie & Blundie
			</p>
			<jdoc:include type="modules" name="footer" style="xhtml" />
			
			<div class="clr"></div>
		</div>
	</div>
			
	
	<div class="hidden"><jdoc:include type="modules" name="hidden" style="raw" /></div>
</body>
</html>
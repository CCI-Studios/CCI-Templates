<?php
	$menu = JSite::getMenu();
	if ($menu)
	    $menu = $menu->getActive();
	if ($menu)
	    $menu = $menu->alias;

	$testing = true;

	JHTML::_('behavior.modal');
	
	$current_host = 'http://'.$_SERVER['HTTP_HOST'].'/';
	if ((isset($_SERVER["HTTP_REFERER"]) && strpos($_SERVER["HTTP_REFERER"], $current_host) === 0) || ($menu !== 'home' && $menu !== 'maison')) {
	} else {
		header('Location:?tmpl=splash');
	}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<jdoc:include type="head" />

<?php if ($testing && false): ?>
	<meta name="robots" content="nofollow, noindex" />
<?php endif; ?>

	<!-- styles -->
<?php if ($testing): ?>
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/template.css" />
<?php else: ?>
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/template.min.css" />
<?php endif; ?>

	<!-- scripts -->
	<script type="text/javascript" src="/templates/<?php echo $this->template ?>/scripts/hoverpop.js"></script>
	
	<!-- fonts -->
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
			</div>
			
			<div class="inner">
				<div id="menu"><div class="inner">
					<jdoc:include type="modules" name="menu" style="xhtml" />
					<div class="clear"></div>
				</div></div>
				
				<div id="content"><div><div>
					<div id="component" <? echo !$this->countModules('sidebar')? 'class="wide"' : ''; ?>>
						<jdoc:include type="component" />
						<div class="clear"></div>
					</div>
					
					<? if ($this->countModules('sidebar')): ?>
					<div id="sidebar"><div><div>
						<jdoc:include type="modules" name="sidebar" style="xhtml" />
						<div class="clear"></div>
						<div id="social_spacer"></div>
					</div></div></div>
					<? endif; ?>
					
					<div id="social">
						<jdoc:include type="modules" name="social" style="xhtml" />
					</div>
					
					<div class="clear"></div>
				</div></div></div>
				
				<?php if ($this->countModules('bottom')): ?>
				<div style="clear: both; height:22px; width: 100%"></div>
				<div id="bottom"><div class="inner">
					<jdoc:include type="modules" name="bottom" style="titleBlock" />
					<div class="clear"></div>
				</div></div>
				<?php endif; ?>
			</div>
		</div>
		
		<div id="footer_spacer"></div>
		<div id="footer"><div class="inner"><div>
			<jdoc:include type="modules" name="footer" style="xhtml" />
			<div class="clear"></div>
		</div></div></div>
	</div>
	
	<div class="hidden">
		<jdoc:include type="modules" name="hidden" style="raw" />
	</div>
</body>
</html>
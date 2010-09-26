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
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/joomla.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/960/reset.css" />
	<!--<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/960/960.css" />-->
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/960/text.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/forms.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/layout.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/modules.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/editorStyles.css" />
	
	<script type="text/javascript" src="/templates/<?php echo $this->template ?>/scripts/dropmenu.js"></script>
<?php else: ?>
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/template.css" />
<?php endif; ?>
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
<div id="outer">
	<div id="top"><div>
		top
		<jdoc:include type="modules" name="top" style="xhtml" />
		<div class="clr"></div>
	</div></div>
	
	<div id="menu"><div>
		<jdoc:include type="modules" name="menu" style="xhtml" />
		<div class="clr"></div>
	</div></div>
	
	
	<div id="wrapper"><div>
		<div id="header"><div>
			header
			<jdoc:include type="modules" name="header" style="xhtml" />
			<div class="clr"></div>
		</div></div>
		
		<div id="title"><div>
			<h1 class="heading"><span>
				<?php echo JFactory::getApplication()->getPageTitle(); ?>
			</h1></span>
		</div></div>
		
		<div id="body">
			body
			<div id="precontent">
				precontent
				<jdoc:include type="modules" name="precontent" style="xhtml" />
				<div class="clr"></div>
			</div>
			
			<div id="content">
				content
				<jdoc:include type="component" />
				<div class="clr"></div>
			</div>
			
			<div id="postcontent">
				postcontent
				<jdoc:include type="modules" name="postcontent" style="xhtml" />
				<div class="clr"></div>
			</div>
		</div>
		
		<div id="sidebar">
			sidebar
			<jdoc:include type="modules" name="sidebar" style="xhtml" />
			<div class="clr"></div>
		</div>
	</div></div>
	
	<div id="footer_spacer"></div>
	<div id="footer"><div>
		<p class="left">Site by <a href="" target="">CCI Studios</a></p>
		<p class="right">Copyright &copy; <?=date('Y');?> Mindbridge Strategies</p>
	</div></div>
</div>
	
<div class="hidden"><jdoc:include type="modules" name="hidden" style="raw" /></div>
</body>
</html>
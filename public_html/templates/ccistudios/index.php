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
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/960/reset.css" />
	<!--<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/960/960.css" />-->
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/960/text.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/forms.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/layout.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/modules.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/editorStyles.css" />
	
	<?php JHtml::_('behavior.mootools')?>
	<script type="text/javascript" src="/templates/<?php echo $this->template ?>/scripts/dropmenu.js"></script>
<?php else: ?>
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/template.css" />
<?php endif; ?>
	   <link rel="icon" type="image/gif" href="/templates/<?php echo $this->template?>/images/favicon.ico" />
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

	<div id="wrapper"><div>
		<div id="wrapper2"><div>
			<div id="header"><div>
				<jdoc:include type="modules" name="header" style="xhtml" />
				<div class="clr"></div>
			</div></div>
				
			<div id="content"><div><div><div><div>
				<jdoc:include type="message" />
				
				<jdoc:include type="component" />
				<div class="clr" style="padding: 0;"></div>
			</div></div></div></div></div>
			
			<div id="leftstrip">
				<jdoc:include type="modules" name="days" style="xhtml" />
				<div class="clr"></div>
			</div>
			
			<div id="rightstrip">
				<jdoc:include type="modules" name="months" style="xhtml" />
				<div class="clr"></div>
			</div>
			
			<div class="clr"></div>
		</div></div>
		
		<div id="footer">
			<div id="title">
				<jdoc:include type="modules" name="title" style="xhtml" />
			</div>
			<div id="social">
				<jdoc:include type="modules" name="social" style="xhtml" />
			</div>
			<div id="menu">
				<jdoc:include type="modules" name="menu" style="xhtml" />
			</div>
			
			<div id="copyright">
				Site By <a href="http://www.ccistudios.com" target="_blank">CCI Studios</a>
			</div>
			
			<div class="clr"></div>
		</div>
	</div></div>
	
	<div class="hidden"><jdoc:include type="modules" name="hidden" style="raw" /></div>
</body>
</html>
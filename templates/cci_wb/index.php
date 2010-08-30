<!DOCTYPE html>
<?php
    $testing = true;

    $menu = JSite::getMenu();
    if ($menu)
        $menu = $menu->getActive();
    if ($menu)
        $menu = $menu->alias;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<jdoc:include type="head" />
	
	<link rel="stylesheet" type="text/css" href="/templates/cci_wb/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="/templates/cci_wb/css/template.css" />
	
	<link type="image/ico" href="/templates/cci_wb/images/favicon.ico" rel="icon" />
	<link type="image/ico" href="/templates/cci_wb/images/favicon.ico" rel="shortcut icon" />
	
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-18039579-1']);
	  _gaq.push(['_setDomainName', '.wellingtonbuilders.com']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
</head>

<body class="<?php echo $menu; ?>">
	<div id="wrapper"><div>
		<div class="inner clearfix">
			<div id="header" class="clearfix">
				<jdoc:include type="modules" name="header" style="xhtml" />
			</div><!-- header -->
			
			<div id="menu" class="clearfix">
				<jdoc:include type="modules" name="menu" style="xhtml" />
			</div><!-- menu -->
			
			<div id="body"><div class="clearfix">
				<div id="content"><div><div>
					<jdoc:include type="component" />
				</div></div></div>
				
				<div id="sidebar">
					<jdoc:include type="modules" name="sidebar" style="xhtml" />
				</div>			
			</div></div><!-- body -->
		</div>	
		<div id="footer" class="clearfix">
			<div class="left">
				Site By <a href="http://www.ccistudios.com" target="_blank">CCI Studios</a>
			</div>
			
			<div class="right">
				Copyright &copy; <?php echo date('Y'); ?> Wellington Builders, Inc.
			</div>
		</div><!-- footer -->
	</div></div>
	
	<div id="shadow"></div>
</body>
</html>
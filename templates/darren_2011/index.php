<!DOCTYPE html>
<html>
	<head>
		<jdoc:include type="head" />
		 
		<link href="/templates/darren_2011/css/template.css" rel="stylesheet" />
	</head>
	
	<body>
		
		<div id="wrapper">
			
			<div id="header">
				<jdoc:include type="modules" name="header" style="xhtml" />
			</div>
			
			<div id="body">
				<div id="component">
					<jdoc:include type="component" />
				</div>
				<div id="sidebar">
					<jdoc:include type="modules" name="sidebar" style="xhtml" />
				</div>
				<div class="clear"></div>
				
				<div id="bottom">
					<jdoc:include type="modules" name="bottom" style="xhtml" />
				</div>
			</div><!-- end body -->
		
			<div id="footer">
				<div class="left">&copy; Copyright <?php echo date('Y'); ?> Darren</div>
				<div class="right">Site By <a href="http://ccistudios.com" target="_blank">CCI Studios</a></div>
			</div>
		</div><!-- end wrapper -->
	</body>
</html>
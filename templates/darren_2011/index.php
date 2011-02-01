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
			
			<div id="body"><div>
				<div id="component"
				<?php if ($this->countModules('sidebar') === 0): ?>
					class="wide"
				<?php endif; ?>
				>
					<jdoc:include type="component" />
				</div>
				
				<?php if ($this->countModules('sidebar') !== 0): ?>
				<div id="sidebar">
					<jdoc:include type="modules" name="sidebar" style="xhtml" />
				</div>
				<?php endif; ?>
				
				
				<div class="clear"></div>
				
				<div id="bottom">
					<jdoc:include type="modules" name="bottom" style="xhtml" />
				</div>
			</div></div><!-- end body -->
		
			<div id="footer">
				<div class="left">&copy; Copyright <?php echo date('Y'); ?> Darren</div>
				<div class="right">Site By <a href="http://ccistudios.com" target="_blank">CCI Studios</a></div>
			</div>
		</div><!-- end wrapper -->
	</body>
</html>
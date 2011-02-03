<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 
Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="language; ?>" lang="language; ?>">
	<head>
		<title>Welcome to the Frontpage</title>   
		<link rel="stylesheet" href="/templates/system/css/system.css" type="text/css" />
		<link rel="stylesheet" href="/templates/system/css/general.css" type="text/css" />
		<link rel="stylesheet" href="/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
<!--[if lte IE 6]>
		<link href="/templates/template ?>/css/ie6only.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if lte IE 7]>
		<link href="/templates/template ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
<![endif]-->
		
	</head>
<body>
	<?php if ($this->countModules('top')) : ?>
		<div id="top">
			<div class="inside">
				<jdoc:include type="modules" name="top" style="xhtml" />
			</div>
		</div>
		
		<div id="top">&nbsp;</div>
	<?php endif; ?>
	
	<div id="wrap">
		<?php if($this->countModules('left')) : ?>
			<div id="leftfauxcol">
				modules
			</div>
		<?php endif; ?>
		
		<?php if($this->countModules('right')) : ?>
			<div id="rightfauxcol">
				modules
			</div>
		<?php endif; ?>
	</div>
		
	<div id="header"> 
    <div class="inside">  
    	<h1>Joomla 1.5 RC 2</h1>
		<jdoc:include type="modules" name="top" style="xhtml" />
	</div>
	</div>
		
	<div id="sidebar">
	<div class="inside">
		<jdoc:include type="modules" name="left" style="xhtml" />     
	</div>
	</div>

	<div id="content">
    <div class="inside">
		<jdoc:include type="module" name="breadcrumbs" style="none" />
		<jdoc:include type="component" /> 
	</div>
	</div>
	
	<div id="sidebar-2"> 
    <div class="inside">
		<jdoc:include type="modules" name="right" style="xhtml" /> 
	</div>
	</div>

	<div id="footer">
	<div class="inside"> Powered by <a href="http://validator.w3.org/check/referer">XHTML</a> and
		<a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>.
		<jdoc:include type="modules" name="footer" style="xhtml" />     
	</div>
	</div>
</body>
</html>


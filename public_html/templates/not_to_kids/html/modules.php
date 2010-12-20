<?php

function modChrome_titleBlock($module, &$params, &$attribs)
{
	echo '<div class="moduleBlock'.$params->get('moduleclass_sfx').'">';
	echo '	<div class="inner">';
	if ($module->showtitle) {
		echo '		<div class="title">';
		echo '			<h3>'.$module->title.'</h3>';
		echo '		</div>';
	}
	echo '		<div class="body">';
	echo 			$module->content;
	echo '		</div>';
	echo '	</div>';
	echo '</div>';
}
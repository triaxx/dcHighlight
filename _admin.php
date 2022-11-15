<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
#
# This file is part of dcHighlight, a plugin for Dotclear 2.
# 
# Copyright (c) 2011 Osku and contributors
#
# Licensed under the GPL version 2.0 license.
# A copy of this license is available in LICENSE file or at
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
#
# Based on the awesome Highlight.js script
# See http://softwaremaniacs.org/soft/highlight/en/
# -- END LICENSE BLOCK ------------------------------------
if (!defined('DC_RC_PATH')) { return; }

$core->addBehavior('adminBlogPreferencesForm',array('adminHightlightBehaviors','adminBlogPreferencesForm'));
$core->addBehavior('adminBeforeBlogSettingsUpdate',array('adminHightlightBehaviors','adminBeforeBlogSettingsUpdate'));

class adminHightlightBehaviors
{
	public static function adminBlogPreferencesForm($core,$settings)
	{
		$settings->addNameSpace('highlight');
		
		$styles = array(
			'' => 'default',
			'Dark'=> 'dark',
			'FAR' => 'far',
			'IDEA' => 'idea',
			'Sunburst' => 'sunburst',
			'Zenburn' => 'zenburn',
			'Visual Studio' => 'vs',
			'Ascetic' => 'ascetic',
			'Magula' => 'magula',
			'GitHub' => 'github',
			'Google Code' => 'googlecode',
			'Brown Paper' => 'brown_paper',
			'School Book' => 'school_book',
			'IR_Black' => 'ir_black',
			'Solarized - Dark' => 'solarized_dark',
			'Solarized - Light' => 'solarized_light',
			'Arta' => 'arta',
			'Monokai' => 'monokai',
			'XCode' => 'xcode',
			'Pojoaque' => 'pojoaque',
			'Rainbow' => 'rainbow',
			'Tomorrow' => 'tomorrow',
			'Tomorrow Night' => 'tomorrow-night',
			'Tomorrow Night Bright' => 'tomorrow-night-bright',
			'Tomorrow Night Blue' => 'tomorrow-night-blue',
			'Tomorrow Night Eighties' => 'tomorrow-night-eighties'
		);
		$demo_url ='<a href="http://softwaremaniacs.org/media/soft/highlight/test.html"
			onclick="window.open(this.href);return false;"
			 title="'._('To help you choose the style.').'">'.__('Demo').'
			<img src="images/outgoing-blue.png" alt="" /></a>';
		
		echo
		'<fieldset id="highlight"><legend>Hightlight.js</legend>'.
		'<p><label class="classic" for="highlight_enabled">'.
		form::checkbox('highlight_enabled','1',$settings->highlight->enabled).
		__('Enable Highlight.js').' - '.$demo_url.'</label></p>'.
		'<p><label for="highlight_style">'.__('Style:').
		form::combo('highlight_style',$styles,$settings->highlight->style).'</label></p>';
		'</fieldset>';
	}
	
	public static function adminBeforeBlogSettingsUpdate($settings)
	{
		$settings->addNameSpace('highlight');
		$settings->highlight->put('enabled',!empty($_POST['highlight_enabled']));
		$settings->highlight->put('style',$_POST['highlight_style']);
	}
}
?>

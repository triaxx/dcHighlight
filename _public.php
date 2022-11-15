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

$core->addBehavior('publicHeadContent',array('publicHightlightBehaviors','headContent'));
$core->addBehavior('publicFooterContent',array('publicHightlightBehaviors','footerContent'));

class publicHightlightBehaviors
{
	public static function headContent($core)
	{
		if (!$core->blog->settings->highlight->enabled) {
			return;
		}
		
		$url = $core->blog->getQmarkURL().'pf=dcHighlight';
		$style = $core->blog->settings->highlight->style;
		
		echo '<link rel="stylesheet" href="'.$url.'/styles/'.$style.'.css" type="text/css" media="screen" />'."\n";
	}
	
	public static function footerContent($core)
	{
		if (!$core->blog->settings->highlight->enabled) {
			return;
		}
		
		$url = $core->blog->getQmarkURL().'pf=dcHighlight';
		echo
		'<script type="text/javascript" src="'.$url.'/js/highlight.min.js"></script>'."\n".
		'<script type="text/javascript">'."\n".
		"//<![CDATA[\n".
		'$(function() {'."\n".
			'$("pre").each(function(i, e) {hljs.highlightBlock(e, "     ")});'."\n".
		"});\n".
		"\n//]]>\n".
		"</script>\n";
	}
}
?>

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
if (!defined('DC_CONTEXT_ADMIN')) { exit; }
 
$new_version = $core->plugins->moduleInfo('dcHightlight','version');
$current_version = $core->getVersion('dcHightlight');
 
if (version_compare($current_version,$new_version,'>=')) {
	return;
}

$s =& $core->blog->settings;
$s->addNameSpace('highlight');
$s->highlight->put('enabled',false,'boolean','Highlight.js flag',true,true);
$s->highlight->put('style','','string','Highlight.js CSS',true,true);

$core->setVersion('dcHightlight',$new_version);
return true;
?>
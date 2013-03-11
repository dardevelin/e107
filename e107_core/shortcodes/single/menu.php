<?php
if(!defined('e107_INIT'))
{
	exit();
}

function menu_shortcode($parm, $mode='')
{
	list($path,$echo) = explode(':', $parm);
		
	if(is_numeric($path)) // eg. {MENU=1} - renders area 1 as found in the e107_menu db table. 
	{
		return e107::getMenu()->renderArea($parm);		
	}
	else // eg. {MENU=contact} for e107_plugins/contact/contact_menu.php OR {MENU=contact/other} for e107_plugins/contact/other_menu.php 
	{
		list($plugin,$menu) = explode("/",$path,2); 
		
		if($menu == '')
		{
			$menu = $plugin;	
		}
		
		return e107::getMenu()->renderMenu($plugin,$menu."_menu");		
	}
}


?>
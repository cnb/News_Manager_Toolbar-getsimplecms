<?php

# register plugin
$thisfile = basename(__FILE__, ".php");
register_plugin(
	$thisfile,
	'News Manager Toolbar',
	'0.1',
	'Carlos Navarro',
	'http://www.cyberiada.org/cnb/',
	'SA GS Admin Toolbar + News Manager integration'
);

add_action('sa_toolbar_disp','nm_sa_toolbar');

function nm_sa_toolbar(){
	global $SATB_MENU_ADMIN,$SATB_MENU_STATIC;
	global $fullpath, $GSADMIN;
	$SATB_MENU_STATIC['news'] = array('title'=> i18n_r('news_manager/PLUGIN_NAME'),'url'=>$fullpath.$GSADMIN.'/load.php?id=news_manager');
	$SATB_MENU_STATIC['add_news'] = array('title'=> '+ '.i18n_r('news_manager/NEW_POST'),'url'=>$fullpath.$GSADMIN.'/load.php?id=news_manager&edit');
	
	global $NMPAGEURL, $id;
	if ($id == $NMPAGEURL) {
		unset($SATB_MENU_STATIC['edit']);
		if (isset($_GET['post'])) {
			$slug = $_GET['post'];
			$SATB_MENU_STATIC['edit_news'] = array('title'=> i18n_r('news_manager/EDIT_POST'),'url'=>$fullpath.$GSADMIN.'/load.php?id=news_manager&edit='.$slug);
		}
	}
}

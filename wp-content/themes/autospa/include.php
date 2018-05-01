<?php

/******************************************************************************/
/******************************************************************************/

require_once(get_template_directory().'/define.php');

/******************************************************************************/

require_once(AUTOSPA_THEME_PATH_CLASS.'Theme.File.class.php');
require_once(AUTOSPA_THEME_PATH_CLASS.'Theme.Include.class.php');

require_once(AUTOSPA_THEME_PATH_CLASS.'Theme.Widget.class.php');

Autospa_ThemeInclude::includeClass(AUTOSPA_THEME_PATH_CLASS.'Walker_Nav_Menu.php',array('Walker_Nav_Menu_Edit_Custom'));

Autospa_ThemeInclude::includeFileFromDir(AUTOSPA_THEME_PATH_CLASS,array('Walker_Nav_Menu.php'));

Autospa_ThemeInclude::includeClass(AUTOSPA_THEME_PATH_LIBRARY.'tgm_plugin_activation/class-tgm-plugin-activation.php',array('TGM_Plugin_Activation'));

/******************************************************************************/
/******************************************************************************/
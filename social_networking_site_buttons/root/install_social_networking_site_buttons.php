<?php
/**
*
* @author _Vinny_ ( http://www.suportephpbb.com.br )
* @package umil
* @version $Id: 
* @copyright (c) _Vinny_, DoYouSpeakWak, Jaymie1989, KellyBean 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/


/**
* @ignore
*/
define('UMIL_AUTO', true);
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
$user->session_begin();
$auth->acl($user->data);
$user->setup();

if (!file_exists($phpbb_root_path . 'umil/umil_auto.' . $phpEx))
{
	trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
}

// The language file which will be included when installing
$language_file = 'mods/social_networking_buttons';

// The name of the mod to be displayed during installation.
$mod_name = 'SOCIAL_NETWORKING_SITE_BUTTONS';

/*
* The name of the config variable which will hold the currently installed version
* You do not need to set this yourself, UMIL will handle setting and updating the version itself.
*/
$version_config_name = 'social_networking_site_buttons_version';

/*
* The array of versions and actions within each.
* You do not need to order it a specific way (it will be sorted automatically), however, you must enter every version, even if no actions are done for it.
*
* You must use correct version numbering.  Unless you know exactly what you can use, only use X.X.X (replacing X with an integer).
* The version numbering must otherwise be compatible with the version_compare function - http://php.net/manual/en/function.version-compare.php
*/
$versions = array(

	// Version 1.0.0
	'1.0.0'	=> array(
		// Lets add a new column to the phpbb_users and topics table
		'table_column_add' => array(
			array('phpbb_users', 'user_bebo', array('VCHAR', '')),
			array('phpbb_users', 'user_blogger', array('VCHAR', '')),
			array('phpbb_users', 'user_facebook', array('VCHAR', '')),
			array('phpbb_users', 'user_goodreads', array('VCHAR', '')),
			array('phpbb_users', 'user_linkedin', array('VCHAR', '')),
			array('phpbb_users', 'user_myspace', array('VCHAR', '')),
			array('phpbb_users', 'user_netlog', array('VCHAR', '')),
			array('phpbb_users', 'user_twitter', array('VCHAR', '')),
		),
	'cache_purge' => array('imageset', 'template', 'theme'),
	),
	
);

// Include the UMIF Auto file and everything else will be handled automatically.
include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);

?>
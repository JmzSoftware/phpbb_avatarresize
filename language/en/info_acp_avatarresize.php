<?php
/**
*
* @package phpBB Extension - Avatar Resize
* @copyright (c) 2016 Jmz Software
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
   exit;
}
if (empty($lang) || !is_array($lang))
{
   $lang = array();
}

$lang = array_merge($lang, array(
   'ACP_AVATARRESIZE'         => 'Avatar Resize',
   'AVATARRESIZE_CONFIG'      => 'Avatar Resize Settings',
));


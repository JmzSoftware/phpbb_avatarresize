<?php
/**
*
* @package phpBB Extension - Avatar Resize
* @copyright (c) 2016 Jmz Software
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace jmz\avatarresize\acp;

class avatarresize_info
 {
    function module()
    {
         return array(
			'filename'  => '\jmz\avatarresize\acp\avatarresize_module',
			'title'     => 'ACP_AVATARRESIZE',
			'modes'     => array(
				'config' => array(
					'title' => 'ACP_AVATARRESIZE_CONFIG', 
					'auth' => 'ext_jmz/avatarresize && acl_a_board', 
					'cat' => array('ACP_AVATARRESIZE')
				),
			),
		);
   }
}

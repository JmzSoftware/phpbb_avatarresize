<?php
/**
*
* @package phpBB Extension - Avatar Resize
* @copyright (c) 2016 Jmz Software
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace jmz\avatarresize\migrations;

class avatarresize_module extends \phpbb\db\migration\migration
{
   
   public function update_data()
   {
      return array(
          array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'ACP_AVATARRESIZE')),
         array('module.add', array(
         'acp', 'ACP_AVATARRESIZE', array(
         'module_basename' => '\jmz\avatarresize\acp\avatarresize_module', 'modes'   => array('config'),
             ),
         )),
      );
   }
}

<?php
/**
*
* @package phpBB Extension - Avatar Resize
* @copyright (c) 2016 Jmz Software
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace jmz\avatarresize\acp;

class avatarresize_module
{
var $u_action;

   function main($id, $mode)
   {
      global $db, $user, $auth, $template, $cache, $request;
      global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

      $this->tpl_name = 'acp_avatarresize_config';
      $this->page_title = $user->lang['AVATARRESIZE_CONFIG'];
      add_form_key('acp_avatarresize_config');
      
      $submit = $request->is_set_post('submit');
      if ($submit)
      {
         if (!check_form_key('acp_avatarresize_config'))
         {
            trigger_error('FORM_INVALID');
         }
         $config->set('avatarresize_enable', $request->variable('avatarresize_enable', 0));

         trigger_error($user->lang['AVATARRESIZE_CONFIG_SAVED'] . adm_back_link($this->u_action));
      }
      $template->assign_vars(array(
         'AVATARRESIZE_VERSION'        => (isset($config['avatarresize_version'])) ? $config['avatarresize_version'] : '',
         'AVATARRESIZE_ENABLE'         => (!empty($config['avatarresize_enable'])) ? true : false,
         'U_ACTION'              => $this->u_action
      ));
   }
}

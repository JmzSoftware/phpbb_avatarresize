<?php
/**
 *
 * @package phpBB Extension - Avatar Resize
 * @copyright (c) 2016 Jmz Software
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */
namespace jmz\avatarresize\event;
/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup' => 'load_language_on_setup',
			'core.avatar_upload' => 'avatar_upload'
		);
	}

	protected $config;

	public function __construct(\phpbb\config\config $config)
	{
		$this->config = $config;
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext          = $event['lang_set_ext'];
		$lang_set_ext[]        = array(
			'ext_name' => 'jmz/avatarresize',
			'lang_set' => 'common'
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	function avatar_upload($event)
	{
		if ($this->config['avatarresize_enable'] == 1)
		{
error_log("entering");
			$file = $event['filename'];
			$w = $event['max_width'];
			$h = $event['max_height'];
			$extension = $event['extension'];
			list($width, $height) = getimagesize($file);
			$r = $width / $height;
			if ($w/$h > $r) {
				$newwidth = $h*$r;
				$newheight = $h;
			} else {
				$newheight = $w/$r;
				$newwidth = $w;
			}
			if($extension == "jpg") $src = imagecreatefromjpeg($file);
			if($extension == "png") $src = imagecreatefrompng($file);
			$dst = imagecreatetruecolor($newwidth, $newheight);
			imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
			if($extension == "jpg") imagejpeg($dst,$file);
			if($extension == "png") imagepng($dst,$file);
		}
	}
}


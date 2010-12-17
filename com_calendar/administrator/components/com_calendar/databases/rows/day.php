<?php
defined('KOOWA') or die;
jimport('joomla.filesystem.file');

class ComCalendarDatabaseRowDay extends KDatabaseRowAbstract {
	protected $storage = '/media/com_calendar/uploads/';
	
	public function save() {
		$file = KRequest::get('FILES.file_upload', 'raw');

		if ($file && $file['error'] !== 4) {	
			if ($file['error'] === 0) {
				$extension	= JFile::getExt($file['name']);
				$src 		= $file['tmp_name'];
				
				// delete current file if it exists
				$this->deleteImages();
				
				// find available file name
				do {
					$dest = time().rand(0,100).'.'.$extension;
				} while (JFile::exists(JPATH_SITE.$this->storage.$dest));
				
				if (!JFile::upload($src, JPATH_SITE.$this->storage.$dest)) {
					return false;
				}
				
				$this->filename = $dest;
				$this->createThumbs();
			} else {
				return false;
			}
		}

		return parent::save();
	}
	
	
	public function delete() {
		$this->deleteImages();
		return parent::delete();
	}
	
	public function createThumbs() {
		$component = JComponentHelper::getComponent('com_calendar');
		$params = new JParameter($component->params);
		
		$this->resizeImage($this->filename, $params->get('day_width'), $params->get('day_height'), 'day_');
		$this->resizeImage($this->filename, $params->get('month_width'), $params->get('month_height'), 'month_');
	}
	
	public function deleteImages($original = true) {
		if ($original) $this->deleteImage($this->filename);
		$this->deleteImage('day_'.$this->filename);
		$this->deleteImage('month_'.$this->filename);
	}
	
	protected function deleteImage($filename) {
		if (JFile::exists(JPATH_SITE.$this->storage.$filename)) {
			JFile::delete(JPATH_SITE.$this->storage.$filename);
		}
	}
	
	protected function resizeImage($filename, $_width, $_height, $_pre) {
		if (!JFile::exists(JPATH_SITE.$this->storage.$filename))
			return false;

		list($src_width, $src_height, $src_type) = getimagesize(JPATH_SITE.$this->storage.$filename);
		
		ini_set('memory_limit', '64M');
		switch($src_type) {
			case IMAGETYPE_GIF:
				$src_img = imagecreatefromgif(JPATH_SITE.$this->storage.$filename);
				break;
			case IMAGETYPE_PNG:
				$src_img = imagecreatefrompng(JPATH_SITE.$this->storage.$filename);
				break;
			case IMAGETYPE_JPEG:
				$src_img = imagecreatefromjpeg(JPATH_SITE.$this->storage.$filename);
				break;
		}
		
		$src_ratio 	= $src_width/$src_height;
		$dest_ratio	= $_width/$_height;
		
		if ($src_ratio >= 1) {
			$temp_height 	= $_height;
			$temp_width		= (int)($_height*$dest_ratio);
		} else {
			$temp_height 	= (int)($_width*$dest_ratio);
			$temp_width		= $_width;
		}
		
		$temp_img = imagecreatetruecolor($temp_width, $temp_height);
		imagecopyresampled($temp_img, $src_img, 0,0,0,0, $temp_width, $temp_height, $src_width, $src_height);
		imagedestroy($src_img);
		
		$final_img = imagecreatetruecolor($_width, $_height);
		imagecopy($final_img, $temp_img, 
			0,0, 
			($temp_width-$_width)/2,($temp_height-$_height)/2,
			$_width, $_height
		);
		
		switch($src_type) {
			case IMAGETYPE_GIF:
				imageGif($final_img, JPATH_SITE.$this->storage.$_pre.$filename);
				break;
			case IMAGETYPE_PNG:
				imagePng($final_img, JPATH_SITE.$this->storage.$_pre.$filename);
				break;
			case IMAGETYPE_JPEG:
				imageJpeg($final_img, JPATH_SITE.$this->storage.$_pre.$filename);
				break;
		}
		
		imagedestroy($temp_img);
		imagedestroy($final_img);

		return true;
	}
}
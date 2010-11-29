<?php
defined('KOOWA') or die;
jimport('joomla.filesystem.file');

class ComCalendarDatabaseRowSponsor extends KDatabaseRowAbstract {
	protected $storage = '/media/com_calendar/uploads/sponsors/';
	
	public function save() {
		$file = KRequest::get('FILES.file_upload', 'raw');
		
		if ($file['error'] !== 4) {
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
		$params = &JComponentHelper::getParams( 'com_calendar' );
		
		$this->resizeImage($this->filename, $params->get('banner_width'), $params->get('banner_height'), 'banner_');
	}
	
	public function deleteImages($original = true) {
		if ($original) $this->deleteImage($this->filename);
		$this->deleteImage('banner_'.$this->filename);
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
		
		if ($src_ratio > $dest_ratio) {
			$temp_height 	= $_height;
			$temp_width		= (int)($_height*$src_ratio);
		} else {
			$temp_height 	= (int)($_width*$src_ratio);
			$temp_width		= $_width;
		}
		
		$temp_img = imagecreatetruecolor($temp_width, $temp_height);
		imagecopyresampled($temp_img, $src_img, 0,0,0,0, $temp_width, $temp_height, $src_width, $src_height);
		
		$final_img = imagecreatetruecolor($_width, $_height);
		imagecopy($final_img, $temp_img, 
			0,0, 
			($temp_width-$_width)/2,($temp_height-$_height)/2,
			$_width, $_height
		);
		
		echo (($temp_width-$_width)/2).' '.
			 (($temp_height-$_height)/2);
		
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

		return true;
	}
}
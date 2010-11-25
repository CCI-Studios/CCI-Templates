<?php
/*
 * $uploadable = KFactory::tmp('admin::com.calendar.database.behavior.uploadable', array(
 *		'columns' 	= 'filename', // filename_upload
 *		'types'		= array('jpg', 'png', 'gif'),
 *		'size'		= array(300,250),
 * 		'prefixes'	= 'thumb_',
 *		'suffxes'	= ''
 *	));
 *	
 * $uploadable = KFactory::tmp('admin::com.calendar.database.behavior.uploadable', array(
 * 		'columns'	= array('img1', 'img2', doc1),
 *		'types'		= array(array('jpg', 'png', 'gif'),
						array('jpg', 'png', gif'),
						array('doc', 'docx', 'pages')),
 *		'size'		= array(array(500,450),
						array(100,200),
						null);
 *		'prefixes'	= array('thumb_',null,null);
 *		'suffixes'	= array(null, '_temp', null)
 * ));
 */


defined('KOOWA') or die;
jimport('joomla.filesystem.file');

class ComCalendarDatabaseBehaviorUploadable extends KDatabaseBehaviorAbstract {
	
	// array of columns to allow uploading on
	protected $_columns;
	
	// array of arrays of file types to allow
	protected $_types;
	
	// array of file sizes
	protected $_sizes;
	
	// array of file prefixes
	protected $_prefixes;
	
	// array of file suffixes
	protected $_suffixes;
	
	public function __construct(KConfig $config = null) {
		parent::__construct($config);
		
		foreach($config as $key=>$value) {
			$this->{$key} = $value;
		}
		
	}
	
	protected function _initialize(KConfig $config) {
		$config->append(array(
			'columns'	=> 'filename',
			'types'		=> array('jpg', 'png', 'jpeg', 'gif'),
			'sizes'		=> array(100,100),
			'prefixes'	=> 'thumb_',
			'suffixes'	=> '', 
		));
		
		parent::_initialize($config);
	}
	
	
	protected function _beforeTableInsert(KCommandContext $context) {
		echo "<pre>";		
		print_r($context);
		die;
	}
	
	protected function _beforeTableUpdate(KCommandContext $context) {
		echo "<pre>";		
		print_r($context);
		die;
	}
	
	private function uploadFiles($row) {
		settype($this->columns, 'array');
		
		foreach($this->columns as $index=>$column) {
			$this->uploadFile($column, $index, $row)
		}	
	}
	
	private function uploadFile($name, $index, $row) {
		$upload = KRequest::get('FILES.'.$name,'_upload', 'raw');
		if ($upload['error'] !== 0) return;
		
		$this->deleteCurrentImage($row->$name);
		$this->saveNewImage
		
		
	}
	
	private function deleteCurrentImage() {}
	private function saveNewImage($index, $path) {}
	private function createThumbs($index) {}
	private function createThumb() {}
	private function resizeImage($index) {}
	
	
}
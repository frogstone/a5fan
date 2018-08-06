<?php

//namespace Model;

class Model_Method extends Model
{
	
	public static function f($path) {

		$path = str_replace(" ","",$path);
		$url	= Uri::base(false).$path;
		
		if(file_exists(DOCROOT.$path)) {
			$mt	= filemtime($path);
			echo $url."?".$mt;
		}

	}

}

?>

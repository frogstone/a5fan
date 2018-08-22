<?php

//namespace Model;

class Model_Hush extends Model
{
	
	public static function get_column_name($t_name) {
		
		$db = new Model_Database();
	
		return $db->get_table_structure($t_name);
		
	}
	
	public static function school($hush) {

		$data		= array();
		$columns = Model_Hush::get_column_name("school");
		
		foreach($columns as $k => $v) {
			$data[$k] = $hush[$k] ?? "";
		}
		
		$data["v_time"] = "";
		
		if(!empty($data["flg24"])) {
			$data["v_time"] = "24時間";
		} else {
			$html = "";
			for($i=1; $i<=3; $i++) {
				if(!empty($data["time".$i."Label"])) {
					$html .= '<dt>'.$data["time".$i."Label"].'</dt>';
				}
				if(!empty($data["time".$i])) {
					$html .= '<dd>'.$data["time".$i].'</dd>';
				}
			}
			if($html) {
				$data["v_time"] = '<dl class="timetable">'.$html.'</dl>';
			}
		}
		
		foreach(Config::get("C.school.flg") as $k => $v) {
			$data["v_flg".$k] = "×";
			if(!empty($data["flg".$k])) {
				$data["v_flg".$k] = "○";
			}
		}
		
		$data["v_imgTag"] = "";
		$data["v_imgUrl"] = "";
		
		if(!preg_match("/^http/",$data["img"])) {
			
			foreach(array("jpg","png","gif") as $v) {
				//die(sprintf(DOCROOT."images/school_banner/%s.%s",$data["id"],$v));
				if(file_exists(sprintf(DOCROOT."images/school_banner/%s.%s",$data["id"],$v))) {
					$data["v_imgTag"] = sprintf('<img src="%s">',sprintf("%simages/school_banner/%s.%s",Uri::base(false),$data["id"],$v));
					break;
				}
				if(empty($data["v_imgTag"])) {
					$data["v_imgTag"] = sprintf('<img src="%s">',sprintf("%simages/school_banner/noimage.jpg",Uri::base(false)));					
				}				
			}
		}
		
		return $data;
		
	}

}

?>

<?php

class Controller_Adminyy_school extends Controller_Adminyy
{

	var $params = array(
		"name",
		"url",
		"img",
		"heading",
		"excerpt",
		"spTitle1",
		"spText1",
		"spTitle2",
		"spText2",
		"spTitle3",
		"spText3",
		"freeTrial",
		"time1Label",
		"time1",
		"time2Label",
		"time2",
		"time3Label",
		"time3",
		"establishedTime"
	);
	
	public function __construct() {
	  parent::__construct();
	}

	private function get_school_data($schoolId) {
		
		$db = $this -> db;
		
		$school = array();
		
		if($schoolId) {
			$school = Model_hush::school($db->pdo->query(sprintf("SELECT * from school where schoolId = %d",$schoolId)) -> fetch());
		}
		
		return $school;
		
	}
	
	public function action_detail($schoolId) {
		
		if(Input::param("edit")) {
			$this -> action_form($schoolId);
		} else if(Input::param("delete")) {
			$this -> delete_cfm($schoolId);
		}
			
		if($schoolId and $school = $this -> get_school_data($schoolId)) {
			
			$param = $school;
			foreach($this->conf["school"]["flg"] as $k => $v) {
				$param["flg"][$k] = $school["flg".$k] ?? "";
			}
			
//			Debug::dump($param);
//			exit;
			
			$view	= View::forge("show",array(
					"template"	=> "admin",
					"view"		=> "admin/school_detail",
					"param"		=> $param
				),
				false
			);

			echo $view;
			exit;
				
		}

	}
	
	public function action_form($schoolId=false) {
		
		$db = $this -> db;
		
		$school = array();
		
		if($schoolId) {
			$school = $this -> get_school_data($schoolId);
		}
		
		$param = array();
		
		$param["schoolId"] = Input::param("schoolId") ?? $school["schoolId"] ?? "";
		foreach($this -> params as $v) {
			$param[$v] = Input::param($v) ?? $school[$v] ?? "";
		}
		
		foreach($this->conf["school"]["flg"] as $k => $v) {
			$param["flg"][$k] = array(
				"label" 	=> $v,
				"value"	=> Input::param("flg".$k) ?? $school["flg".$k] ?? ""
			);
		}
		
		$view	= View::forge("show",array(
				"template"	=> "admin",
				"view"		=> "admin/school_form",
				"param"		=> $param,
			)
		);

		echo $view;
		exit;
		
	}

	public function action_end($schoolId=false) {

		$db = $this -> db;
		$uploadFile = "";
		$uploadExt	= "";
		$formData	= $_REQUEST;
		
		$update_colums = $this -> params;
		foreach($this->conf["school"]["flg"] as $k => $v) {
			$update_colums[] = "flg".$k;
		}
		
		if(!empty($_FILES["upload"]["name"])) {
			$array 		= explode(".",$_FILES["upload"]["name"]);
			$uploadExt	= mb_strtolower($array[count($array)-1]);
			$uploadFile = DOCROOT."images/bnr_school/temp.".$uploadExt;
			if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadFile)) {
				$formData["img"] = $uploadExt;
			}
			
		}
		
		if($schoolId) {
			$db -> update("school",$formData,array("schoolId"=>$schoolId),$update_colums,true);
		} else {
			$schoolId = $db -> insert("school",$formData,true);
		}
		
		if(!empty($uploadFile)) {
			$file = DOCROOT."images/bnr_school/".$schoolId.".".$uploadExt;
			rename($uploadFile,$file);
		}
		
		$this -> action_detail($schoolId);
		
	}

	private function delete_cfm($schoolId) {
		
		if($schoolId and $school = $this -> get_school_data($schoolId)) {
			
			$param = $school;
			
			$view	= View::forge("show",array(
					"template"	=> "admin",
					"view"		=> "admin/school_delete",
					"param"		=> $param
				)
			);

			echo $view;
			exit;
				
		}
		
	}
	
	public function action_delete_end($schoolId) {
		
		$this -> db -> delete("school",array("schoolId"=>$schoolId));
		
		header('location: '.Uri::base(false)."adminyy");
		exit;
		
	}
	
	
}

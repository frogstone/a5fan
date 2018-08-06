<?php

class Controller_Adminyy_import extends Controller_init
{

	var $colums = array(
		"name",
		"id",
		"url",
		"freeTrial",
		"time1Label",
		"time1",
		"time2Label",
		"time2",
		"time3Label",
		"time3",
		"establishedTime",
		"flgFreeTrial",
		"flgNative",
		"flgJapanese",
		"flgKids",
		"flg24",
		"flgTicket",
		"heading",
		"excerpt"
	);
	
	public function __construct() {
	  parent::__construct();
	}

	public function action_index() {
		
		$csv = file(DOCROOT."school.csv");

		foreach($csv as $line) {
			$line		= str_replace("\n",'',$line);
			$line		= str_replace("\r",'',$line);
			$line		= str_replace(PHP_EOL,'',$line);
			$data 	= array();
			$array 	= explode(",",$line);
			foreach($this->colums as $i => $c) {
				if(!empty($array[$i])) {
					$data[$c] = $array[$i];
				}
			}
			$this -> db -> insert("school",$data);
			//print $data["name"]."<br>";
		}
		die("complete");
		
	}
	
	/*
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

			//Debug::dump($param);
			//exit;
			
			$view	= View::forge("show",array(
					"template"	=> "admin",
					"view"		=> "admin/school_detail",
					"param"		=> $param
				)
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
		
		$update_colums = $this -> params;
		foreach($this->conf["school"]["flg"] as $k => $v) {
			$update_colums[] = "flg".$k;
		}
		
		//Debug::dump($update_colums);
		//exit;
		
		if($schoolId) {
			$db -> update("school",$_REQUEST,array("schoolId"=>$schoolId),$update_colums,true);
		} else {
			$schoolId = $db -> insert("school",$_REQUEST,true);
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
	*/
	
	
}

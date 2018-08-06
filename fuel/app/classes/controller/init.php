<?php

//use Model\Database;
	
class Controller_Init extends Controller
{

	var $db;
	var $conf;
	
	public function __construct() {

		//Debugの際に最初から展開する設定に
		Debug::$js_toggle_open = true;

		$this -> conf 	= Config::get("C");
		$this -> db_init();
	}
	
	private function db_init() {
		
		$this -> db = new Model_Database();
		
		/*
		$this -> db -> connect(
			$this -> conf["database"]["host"],
			$this -> conf["database"]["dbname"],
			$this -> conf["database"]["user"],
			$this -> conf["database"]["pw"]
		);
		*/
		
	}
	
	
}

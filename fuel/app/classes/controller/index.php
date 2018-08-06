<?php

class Controller_Index extends Controller_init
{

	public function __construct() {

		parent::__construct();
       
	}
	
	public function action_index() {

		$schools = array();
		
		if($q = $this->db->pdo->query("select * from school")) {
			while($hush = $q->fetch()){
				$schools[] = $hush;
			}		
		}

//		Debug::dump($schools);
//		exit;
		$view	= View::forge("show",array(
				"template"	=> true,
				"view"		=> "index",
				"css" 		=> "index",
				"param"		=> array(
					"schools"	=> $schools
				)
			)
		);

		echo $view;
		exit;
		
	}
	
	
	
}

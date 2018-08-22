<?php

class Controller_Detail extends Controller_init
{

	public function __construct() {

		parent::__construct();
		       
	}
	
	public function action_index($name) {

		if($name and $school = $this->db->select("school",array("name"=>$name))) {		
			
			$school = Model_Hush::school($school);
			
			//Debug::dump($school);
			
			$view	= View::forge("show",array(
					"template"	=> true,
					"view"		=> "detail",
					"css" 		=> "detail",
					"param"		=> array(
						"school"		=> $school
					)
				)
			);

			echo $view;
			exit;
			
		}
		
		
	}
	
	
	
}

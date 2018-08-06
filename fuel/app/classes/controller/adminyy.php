<?php

class Controller_Adminyy extends Controller_init
{

	public function __construct() {

        parent::__construct();
        
        $this -> admin_ninsyo();
        
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
				"template"	=> "admin",
				"view"		=> "admin/index",
				"param"		=> array(
					"css" => "",
					"schools"	=> $schools
				)
			)
		);

		echo $view;
		exit;
		
	}
	
	private function admin_ninsyo() {
        
			$flg    	= false;
			$adminPw	= "";

			if(Session::get("adminLogin")) {
				$flg = true;
			} else if(Input::param("adminPw")) {
				$adminPw = Input::param("adminPw");
				if(Input::param("adminPw") === $this->conf["adminPw"]) {
					Session::set("adminLogin",time());
					$flg = true;                
				}
			}
        
			if(!$flg) {
				
				$view	= View::forge("show",array(
					"view"		=> "admin/login",
					"param"		=> array(
						"css"			=> "",
						"adminPw"	=> $adminPw
					)
				));	

				echo $view;
				exit;

			}

    }
	
}

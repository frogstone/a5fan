<?php

class Controller_Show extends Controller_init
{

	public function __construct() {

		parent::__construct();

		if(Uri::segment(1)) {
			
			switch(Uri::segment(1)) {
					
				case "オンライン英会話スクールの選び方":
					$view	= View::forge("show",array(
							"template"	=> true,
							"view"		=> "blog",
							"css" 		=> "blog",
							"param"		=> array(
								"bodyclass"	=> "article"
							)
						)
					);
					echo $view;
					break;
			
					
			}
		}
		
	}
	
}

<?php
return array(

	'_root_'									=> 'index',  // The default route
	'_404_'   								=> 'welcome/404',    // The main 404 route
	'hello(/:name)?'						=> array('welcome/hello', 'name' => 'hello'),
	"スクール詳細(/:any)"					=>	"detail/$1",
	"オンライン英会話スクールの選び方"		=> "show"

);

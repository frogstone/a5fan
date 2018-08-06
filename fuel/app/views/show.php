<?php

if(!empty($template)) {
	
	$params = array(
		"param" 	=> $param
	);
	
	if(!empty($css)) {
		$params["css"] = $css;
	}
	
	$file = "header";
	if($template === "admin") {
		$file = "admin/header";
	} else {
		$file = "header";		
	}
	
	echo View::forge(
		$file,
		$params,
		false
	);
}

echo View::forge(
	$view,
	array("param" => $param),
	false
);

if(!empty($template)){
	
	$file = "footer";
	if($template === "admin") {
		$file = "admin/footer";
	} else {
		$file = "footer";
	}
	
	echo View::forge(
		$file,array("param" => $param),false
	);
}

exit;

?>
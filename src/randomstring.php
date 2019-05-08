<?php
function string_generator(){
	$string = "";
	for($i=0; $i<20; $i++){
		$num = mt_rand(0, 15);
		
		switch($num){
			case 10: $out = "a"; break;
			case 11: $out = "b"; break;
			case 12: $out = "c"; break;
			case 13: $out = "d"; break;
			case 14: $out = "e"; break;
			case 15: $out = "f"; break;
			default: $out = "$num";
		}
		$string = $string . $out;
	}
	return $string;
}
?>
<?php

function convert_object_to_string($object) {
	
	ob_start();
	print_r($object);
	$string = ob_get_contents();
	ob_end_clean();
	
	return $string;
}

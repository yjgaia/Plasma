<?php

function get_parameter($name = null, $xss = null) {

	$value = $_GET[$name];

	if (empty($value) === true) {
		return false;
	} else {
		
		if ($xss === true) {
			$value = htmlspecialchars($value);
		}

		return $value;
	}
}

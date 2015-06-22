<?php

function get_form_value($name = null, $xss = null) {

	$value = $_POST[$name];

	if (empty($value) === true) {
		return false;
	} else {
	
		if ($xss === true) {
			$value = htmlspecialchars($value);
		}

		return $value;
	}
}

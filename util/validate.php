<?php

/**
 * 값이나 데이터를 검증합니다.
 */
function validate($value, $type, $valid_value = true) {
	
	// 값이 array 이면 데이터이므로 데이터를 검증
	if (is_array($value) === true) {
		
		foreach ($type as $name => $types) {
			foreach ($types as $t => $v) {
				$r = validate($value[$name], $t, $v);
				
				if ($r === false) {
					$result[$name] = $t;
				
					break;
				}
			}
		}
		
		return $result;
	}
	
	// 값을 검증
	else {
		
		if ($type === 'not_empty') {
			return $value !== null && trim($value) !== '';
		}
		
		if ($type === 'equal') {
			return $value === $valid_value;
		}
		
		if ($type === 'bool') {
			return is_bool($value);
		}
		
		if ($type === 'integer') {
			return is_int($value);
		}
		
		if ($type === 'min_size') {
			return strlen($value) >= $valid_value;
		}
		
		if ($type === 'max_size') {
			return strlen($value) <= $valid_value;
		}
		
		if ($type === 'regex') {
			return validate($value, 'not_empty') === true
			&& preg_match($valid_value, $value) !== 0;
		}
		
		if ($type === 'username') {
			return validate($value, 'regex', '/^[_a-zA-Z0-9\-]+$/');
		}
		
		if ($type === 'email') {
			return filter_var($value, FILTER_VALIDATE_EMAIL);
		}
		
		if ($type === 'url') {
			return filter_var($value, FILTER_VALIDATE_URL);
		}
		
		if ($type === 'korea_phone_number') {
			return validate($value, 'regex', '/^\d{2,3}-\d{3,4}-\d{4}$/');
		}
	}
}
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
		
		if ($type === 'username') {
			return validate($value, 'not_empty') === true
			// 영어 대소문자와 숫자, 하이픈(-), 언더바(_)만 됨
			&& preg_match('/^[_a-zA-Z0-9\-]+$/', $value) !== 0;
		}
		
		if ($type === 'min_size') {
			return strlen($value) >= $valid_value;
		}
		
		if ($type === 'max_size') {
			return strlen($value) <= $valid_value;
		}
		
		if ($tpye === 'regex') {
			//TODO:
		}
	}
}

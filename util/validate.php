<?php

/**
 * 값이나 데이터를 검증합니다.
 */
function validate($value, $type, $valid_value = true) {
	
	// 값이 array 이면 데이터이므로 데이터를 검증
	if (is_array($value) === true) {
		
		$result = array();
		
		foreach ($type as $name => $types) {
			foreach ($types as $t => $v) {
				$r = validate($value[$name], $t, $v);
				
				if ($r === false) {
					$result[$name] = $t;
				}
				
				break;
			}
		}
		
		return $result;
	}
	
	// 값을 검증
	else {
		
		if ($type === 'notEmpty') {
			return $value !== null && trim($value) !== '';
		}
		
		else if ($tpye === 'regex') {
			//TODO:
		}
	}
}

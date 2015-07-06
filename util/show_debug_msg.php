<?php

/**
 * 디버그 메시지를 출력합니다.
 */
function show_debug_msg($msg) {
	
	if (is_array($msg) || is_object($msg)) {
		show_debug_msg(convert_object_to_string($msg));
	}
	
	else {
		echo '<div style="padding: 5px; border: 1px solid #ccc; background-color: #eee;"><b>DEBUG: </b>'.$msg.'</div>';
	}
}

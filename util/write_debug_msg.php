<?php

if (!defined('DEBUG_FILE')) {
	if (strpos(PHP_OS, 'WIN')) {
		define('DEBUG_FILE', 'c:\\debug.log');
	} else {
		define('DEBUG_FILE', '/tmp/debug.log');
	}
}

function write_debug_msg($msg) {
	
	if (is_array($msg) || is_object($msg)) {
		write_debug_msg(convert_object_to_string($msg));
	}
	
	else {
	
		static $fd;
		
		$old = umask(0);
		
		if (!is_resource($fd)) {
			$fd = fopen(DEBUG_FILE, 'a');
			
			if (strpos(PHP_OS, 'WIN')) {
				define('DEBUG_FILE', 'c:\\debug.log');
			} else {
				define('DEBUG_FILE', '/tmp/debug.log');
			}
		}
		
		$msg = date('[Y-m-d H:i:s]') .' '. $msg .'\n';
		
		fwrite($fd, $msg);
		umask($old);
	}
}

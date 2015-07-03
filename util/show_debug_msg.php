<?php

/**
 * 디버그 메시지를 출력합니다.
 */
function show_debug_msg($msg) {
	echo '<div style="padding: 5px; border: 1px solid #ccc; background-color: #eee;"><b>DEBUG: </b>'.$msg.'</div>';
}
if(!defined('DEBUG_FILE')) {
	if(strpos(PHP_OS, "WIN")) {
		define('DEBUG_FILE', 'c:\\debug.log');
	} else {
		define('DEBUG_FILE', '/tmp/debug.log');
	}
}

function _write_log($msg) {
		static $fd;
		$old = umask(0);
		if (!is_resource($fd)) $fd = fopen(DEBUG_FILE, 'a');
		$msg = date('[Y-m-d H:i:s]') .' '. $msg ."\n";
		fwrite($fd, $msg);
		umask($old);
}

function debug_backtrace_log() {
	$backtrace = debug_backtrace();
	ob_start();
	echo "\n";
	for($i=1;$i<count($backtrace);$i++) {
		echo $backtrace[$i]['file'].', line:'.$backtrace[$i]['line'].", function:".$backtrace[$i]['function']."\n";
		var_dump($backtrace[$i]['args']);
	}
	$trace = ob_get_contents();
	ob_end_clean();
	_write_log($trace);
}

function debug_log ($msg) {
	if ( is_array($msg) || is_object($msg) ) {
		debug_object_log($msg);
	}
	else {
		_write_log($msg);
	}
}

function debug_object_log ($obj) {
	ob_start();
	print_r($obj);
	$msg = ob_get_contents();
	ob_end_clean();
	_write_log($msg);
}
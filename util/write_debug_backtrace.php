<?php

function write_debug_backtrace() {
	
	$backtrace = debug_backtrace();
	
	ob_start();
	
	echo '\n';
	
	for ($i = 1; $i < count($backtrace); $i++) {
		echo $backtrace[$i]['file'].', line:'.$backtrace[$i]['line'].', function:'.$backtrace[$i]['function'].'\n';
		var_dump($backtrace[$i]['args']);
	}
	
	$trace = ob_get_contents();
	ob_end_clean();
	
	write_debug_msg($trace);
}

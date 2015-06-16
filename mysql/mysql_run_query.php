<?php

/**
 * MySQL에 접속후 쿼리를 실행합니다.
 * 결과를 반환하지 않습니다.
 */
function mysql_run_query($query) {
	
	global $plasma_config;
	
	$conn = mysql_connect($plasma_config['mysql']['server'], $plasma_config['mysql']['username'], $plasma_config['mysql']['password']);
	mysql_select_db($plasma_config['mysql']['database'], $conn);
	mysql_query($query, $conn);
	mysql_close($conn);
}

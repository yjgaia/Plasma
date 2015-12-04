<?php

/**
 * MySQL에 접속후 쿼리를 실행하여 결과를 가져옵니다.
 */
function mysql_get_one($query) {
	
	global $plasma_config;
	
	// 코드 트래킹
	if ($plasma_config['is_dev_mode'] === true) {
		$backtrace = debug_backtrace();
		show_debug_msg($backtrace[0]['args'][0].' # '.$backtrace[0]['file'].', line:'.$backtrace[0]['line']);
	}

	$conn = mysqli_connect($plasma_config['mysql']['server'], $plasma_config['mysql']['username'], $plasma_config['mysql']['password'], $plasma_config['mysql']['database']);

	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
	
	// 값이 없는 경우 null 반환
	if ($row === false) {
		return null;
	}
	$return = new Object();
	foreach ($row as $key => $data) {
		$return->$key = $data;
	}

	mysqli_close($conn);
	
	return $return;
}

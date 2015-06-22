<?php

// 플라즈마가 설치된 폴더입니다.
$PLASMA_FOLDER_PATH = dirname(__FILE__);

// 컨트롤러 로드
include $PLASMA_FOLDER_PATH.'/controller/Controller.php';


// 유틸리티 로드
include $PLASMA_FOLDER_PATH.'/util/RequestInfo.php';

include $PLASMA_FOLDER_PATH.'/util/show_debug_msg.php';
include $PLASMA_FOLDER_PATH.'/util/validate.php';
include $PLASMA_FOLDER_PATH.'/util/redirect.php';


// MySQL 관련 기능 로드
include $PLASMA_FOLDER_PATH.'/mysql/mysql_get_one.php';
include $PLASMA_FOLDER_PATH.'/mysql/mysql_get_list.php';
include $PLASMA_FOLDER_PATH.'/mysql/mysql_run_query.php';

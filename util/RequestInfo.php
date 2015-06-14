<?php

/**
 * request의 정보를 지니고 있는 클래스
 */
class Plasma_RequestInfo {
	
	public static $ip;
	
	// request 메소드 ex) GET, POST, PUT, DELETE
	public static $method;
	
	// 파라미터들
	public static $params;
}

Plasma_RequestInfo::$ip = $_SERVER['REMOTE_ADDR'];

Plasma_RequestInfo::$method = strtoupper($_SERVER['REQUEST_METHOD']);

Plasma_RequestInfo::$params = Plasma_RequestInfo::$method === 'GET' ? $_GET : $_POST;

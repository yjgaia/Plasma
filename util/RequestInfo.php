<?php

/**
 * request의 정보를 지니고 있는 클래스
 */
class Plasma_RequestInfo {
	
	public static $ip;
	
	public static $method;
}

Plasma_RequestInfo::$ip = $_SERVER['REMOTE_ADDR'];

Plasma_RequestInfo::$method = strtoupper($_SERVER['REQUEST_METHOD']);

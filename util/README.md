# Plasma 유틸리티

## show_debug_msg($msg)
Dev Mode 일 때 디버그 메시지를 출력합니다.
```php
show_debug_msg('This is debug message.');
```

## redirect($url)
`$url`로 redirect 합니다.
```php
redirect('https://github.com/Hanul/Plasma');
```

## validate($value, $type, $valid_value = true)
`$value`가 값이면 `$type`에 해당하는 검증을 수행하고, `Array`면 `$type`에도 검증 `Array`를 넣어 데이터를 검증합니다.
```php
validate('', 'notEmpty') // false
validate('Hello!', 'notEmpty') // true

$data = array(
	username => ''
);

validate($data, , array(
	username => array(
		notEmpty => true
	)
)); // array(username => 'notEmpty')
```

## RequestInfo
request의 정보를 지니고 있는 클래스입니다.

### Static Properties
- `$ip` request의 IP입니다.
```php
// 127.0.0.1
echo Plasma_RequestInfo::$ip;
```
- `$method` request의 method입니다.
```php
// GET or POST or PUT or DELETE
echo Plasma_RequestInfo::$method;
```
- `$params` request의 파라미터들입니다.
```php
Plasma_RequestInfo::$params['username'];
```

## get($index = null, $xss = null)
URL 파라메타를 가져올수 있습니다
```php
get("parameter", TRUE); // xss 필터링
get("parameter", FALSE); // xss 필터링 비사용
```

## post($index = null, $xss = null)
폼값을 가져올수 있습니다
```php
post("parameter", TRUE); // xss 필터링
post("parameter", FALSE); // xss 필터링 비사용
```

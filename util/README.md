# Plasma 유틸리티

## plsm_redirect($url)
`$url`로 redirect 합니다.
```php
plsm_redirect('https://github.com/Hanul/Plasma');
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

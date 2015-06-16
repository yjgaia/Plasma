# Plasma MySQL 관련 기능

## 설정하기
```php
$plasma_config['mysql'] = array(
	database => '데이터베이스명',
	username => '유저네임',
	password => '비밀번호'
);
```

## mysql_get_one($query)
MySQL에 접속후 쿼리를 실행하여 결과를 가져옵니다.
```php
mysql_get_one("SELECT * FROM user_info;");
```

## mysql_get_list($query)
MySQL에 접속하여 결과를 배열로 가져옵니다.
```php
mysql_get_list("SELECT * FROM user_info;");
```

## mysql_run_query($query)
MySQL에 접속후 쿼리를 실행합니다.
결과를 반환하지 않습니다.
```php
mysql_run_query("SELECT * FROM user_info;");
```

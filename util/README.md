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
`$value`가 값이면 `$type`에 해당하는 검증을 수행하고, `Array`면 `$type`에도 검증 `Array`를 넣어 데이터를 검증합니다. `$value`가 값일 때는 `true`나 `false`를 반환하고, `Array`면 검증을 통과하면 `null`을, 검증을 통과하지 못하면 오류 정보를 `Array`로 반환합니다.
```php
validate('', 'not_Empty') // false
validate('Hello!', 'not_Empty') // true

$data = array(
	username => ''
);

validate($data, array(
	username => array(
		notEmpty => true
	)
)); // array(username => 'notEmpty')
```

### 처리할 수 있는 `$type`들
* `not_empty` 빈 값이 아닌지 검증합니다.
* `bool` 값이 `true`나 `false`인지 검증합니다.
* `integer` 값이 정수인지 검증합니다.
* `equal` 값이 `$valid_value`와 같은지 검증합니다.
* `min_size` 값의 길이가 `$valid_value` 이상인지 검증합니다.
* `max_size` 값의 길이가 `$valid_value` 이하인지 검증합니다.
* `regex` 정규 표현식 `$valid_value`을 통과하는지 검증합니다.
* `username` 영어 대소문자와 숫자, 하이픈(-), 언더바(_)만 가능한 아이디 형태인지 검증합니다.
* `email` 이메일인지 검증합니다.
* `korea_phone_number` 대한민국 전화번호인지 검증합니다.

### 사용 예
`validate`를 사용하는 예제를 작성합니다.

1. 검증 결과를 가져옵니다.
```php
$vr = validate($p, array(

	username => array(
		not_empty => true,
		username => true,
		min_size => 4,
		max_size => 20
	),
	
	password => array(
		not_empty => true,
		min_size => 4,
		max_size => 20
	)
));
```

2. 검증 메시지를 작성합니다.
```php
$vm = array(

	username => array(
		not_empty => '아이디를 입력해주세요.',
		username => '아이디는 영어 대소문자와 숫자, 하이픈(-), 언더바(_)만 사용 가능합니다.',
		min_size => '아이디는 4글자 이상으로 작성해주세요.',
		max_size => '아이디는 20글자 이하로 작성해주세요.'
	),

	password => array(
		not_empty => '비밀번호를 입력해주세요.',
		min_size => '비밀번호는 4글자 이상으로 작성해주세요.',
		max_size => '비밀번호는 20글자 이하로 작성해주세요.'
	)
);
```

3. 검증 결과와 메시지를 조합하여 화면에 출력합니다.
```html
<?php if ($vr !== null) { ?>
	<!-- 오류 출력 -->
	<div class="alert alert-danger" role="alert">
		<?php foreach ($vr as $name => $type) { ?>
			<p>
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				<?=$vm[$name][$type] ?>
			</p>
		<?php } ?>
	</div>
<?php } ?>
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

## get_parameter($name = null, $xss = null)
URL 파라메타를 가져올수 있습니다.
```php
get('parameter', true); // xss 필터링
get('parameter', false); // xss 필터링 비사용
```

## get_form_value($name = null, $xss = null)
폼값을 가져올수 있습니다.
```php
post('parameter', true); // xss 필터링
post('parameter', false); // xss 필터링 비사용
```

## write_debug_msg($msg)
DEBUG_FILE 상수로 지정된 위치의 debug.log 파일 해에당 변수의 내용을 기록합니다
* array, object는 print_r 함수를 통해 기록합니다.
* Windows 계열 기본 위치 C:\debug.log, 그외 /tmp/debug.log

```php
write_debug_msg($variable);
```

## write_debug_backtrace()
DEBUG_FILE 상수로 지정된 위치의 debug.log 파일에 debug_backtrace() 정보를 기록합니다.
파일명, 라인넘버, 함수명, 변수 내용 을 출력하며 write_debug_backtrace 함수가 있는 파일은 출력하지 않습니다.
```php
write_debug_backtrace();
```

## convert_object_to_string($object)
Object 혹은 Array 형태를 가진 변수의 값을 print_r 함수를 이용해 출력되는 형태의 String 형으로 변환합니다.
```php
$array = Array('abc' => 'def');
var_dump($array);
array(1){
  ["abc"]=>
  string(3) "def"
}

$string = convert_object_to_string($array);
var_dump($string);
string(27) "Array
(
    [abc] => def
)
"

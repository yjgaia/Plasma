# Plasma 유틸리티

## check_is_null($value)
`$value`가 `null`인지 확인합니다.
```php
// true
echo plsm_check_is_null(null) ? 'true' : 'false';
echo '<br>';

// false
echo plsm_check_is_null('test') ? 'true' : 'false';
```
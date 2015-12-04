# Plasma DB Connection Handling

## Plasma_Registry
DB Connection 을 생성하거나 생성된 Connection을 가져오기 위해 작성된 Class(Registry Pattern 이용)

Connection을 가져올 때 아래와 같이 사용한다
```php
require_once($PLASMA_FOLDER_PATH . '/db/Registry.php');
$db_conn = Plasma_Registry::getConnection();
```

## Plasma_Database

## Plasma_DatabaseResult
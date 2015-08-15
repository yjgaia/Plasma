# Plasma
오픈소스 PHP 프레임워크

## PHP 버전
PHP 5.2 이상에서 작동합니다.

## 설치
### 윈도에 [APMSETUP](http://www.apmsetup.com/)을 설치했을 경우
```
cd C:\APM_Setup\htdocs
git clone https://github.com/Hanul/Plasma.git
```

## Plasma 불러오기
```php
include 'Plasma/include.php';
```

## 업데이트
### 윈도에 [APMSETUP](http://www.apmsetup.com/)을 설치했을 경우
```
cd C:\APM_Setup\htdocs
cd Plasma
git pull
```

## 코드 컨벤션
개발을 시작하시기 전에 [Plasma의 코드 컨벤션](https://github.com/Hanul/Plasma/wiki/Plasma-%ED%94%84%EB%A0%88%EC%9E%84%EC%9B%8C%ED%81%AC-%EC%BD%94%EB%93%9C-%EC%BB%A8%EB%B2%A4%EC%85%98)을 먼저 살펴보시기 바랍니다.

## 벤더 접두어
- Plasma의 Class는 이름 앞에 `Plasma_`가 붙습니다. ex) Plasma_Validator

## 라이센스
[MIT 라이센스](LICENSE)

## 커뮤니티
- [위키](https://github.com/Hanul/Plasma/wiki)
- [Plasma PHP 프레임워크 개발 Facebook 그룹](https://www.facebook.com/groups/plasmaframework/)

## SourceTree에서 Plasma 열기
상단 메뉴 중 복제 / 생성을 누른 뒤, 작업공간 열기를 누르고 Plasma를 clone한 경로를 지정합니다.

## TODO
- mysql 기능들 구현 시 mysql_xxx -> mysqli_xxx

<?php
class My_ModelBox extends Plasma_ModelBox
{
    function __construct()
    {

        $this->columns = array(

            'created_at' => new Plasma_DatetimeColumn(null, '칼럼 이름'),
            'name' => new Plasma_CharColumn('기본 값', '칼럼 이름'),
            'age' => new Plasma_IntColumn('기본 값')
        );

        $this->tableName = 'My_Table_Name';
    }
}

/*
 * 자. 이렇게 우리는 성공적으로 모델을 정의했습니다.
 *
 * 이걸 어떻게 사용해야 할까요?
 *
 * 우선 만든 클레스를 바탕으로 인스턴스부터 생성 해 봅시다.
 */

$my_model = new My_ModelBox();

// DB에서 뭔가를 찾고싶으면 이렇게 해주면 됩니다.
$my_model_objects = $my_model->find(array('asdf'=>'asdf'));

// 세로운 객체를 만들어 내고 싶다면 이렇게 하면 됩니다.
$myNewModelObj = $my_model->createEmptyObject();

/*
 * 이름을 바꿔봅시다.
 *
 * 해당 모델의 칼럼의 값을 바꾸는것은 이렇게 해주면 됩니다.
 */
$myNewModelObj->columns['name']->setValue('홍길동');

// 참 쉽죠? 이렇게 칼럼의 fieldName으로 불러오고, setValue라는 메서드를 실행시켜주면 됩니다.

// 이번엔 이걸 저장해보겠습니다.


// 쉽습니다. 그냥 ->save()하면 데이터베이스에 성공적으로 저장이 됩니다.

// 이번엔 지워볼께요.
$myNewModelObj->delete();
// 이렇게하면 성공적으로 지워집니다. 굳!
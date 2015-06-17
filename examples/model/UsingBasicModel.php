<?php

class My_Model extends Plasma_Model
{
    /*
     * 모델은 기본적으로 Plasma_Model 클레스를 상속받습니다.
     *
     * 각 모델에 함수는 원하는대로 만들 수 있으며,
     * __construct()함수, 즉 생성자에서 해당 모델들의 칼럼과, 테이블 명을 지정해야 합니다.
     * 각 모델은 id라는 이름의 Primary Key를 가져야 합니다.
     */

    function function1()
    {
        return $this->columns['column1'];
    }
    function __construct()
    {
        /*
         * 칼럼은 이런식으로 생성자에서 꼭 array() 형태로 지정해줘야 합니다.
         */
        $this->columns = array(
            /*
             * 칼럼을 생성 할 때, new Plasma_<칼럼 타입>()으로 생성해주면 됩니다.
             *
             * 이걸 생성할 때 2가지 파라미터가 있는데,
             *  첫번째는 기본 값입니다. DB에 들어갈 때 기본 값입니다.
             *  두번째는 칼럼 이름입니다. 비워두면 array의 key가 DB의 칼럼이름으로 인식합니다.
             */
            'created_at' => new Plasma_DatetimeColumn(null, '칼럼 이름'),
            'name' => new Plasma_CharColumn('기본 값', '칼럼 이름'),
            'age' => new Plasma_IntColumn('기본 값')
        );
        /*
         *  테이블 이름도 이렇게 지정 해 줍시다.
         */
        $this->tableName = 'My_Table_Name';
    }
}
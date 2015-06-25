<?php

class Plasma_ModelBox extends Plasma_BaseModel
{

    function __construct()
    {
        $this->tableName = '';
        $this->columns = array();
        $this->id = 0;
    }

    public function createEmptyObject()
    {
        return new Plasma_ModelObject($this, $this->columns);
    }

    public function find($findArray)
    {
        /*
         * 검색 방식 생각중.
         *
         * 1. 단순히 칼럼 => 텍스트
         * 2. 제외, 텍스트 포함, 등 옵션까지 설정
         *
         * 일단 1번부터 만들기로 함.
         * array()를 받아야함.
         *
         * 필드 이름 => 값
         */

        $findQuery = '';
        foreach ($findArray as $findFieldName => $findKey)
        {
            if (!array_key_exists($findFieldName, $this->columns))
            {
                throw new Plasma_NoColumnException;
            }
            $findQuery .= ' '.$findFieldName.'='.$findKey.' AND';
        }
        $findQuery = substr($findQuery, 0, -3);
        $thisTableName = $this->tableName;
        $query = 'SELECT * FROM $thisTableName WHERE $findQuery;';

        $list = mysql_get_list($query);
        $returnArray = array();
        /*
         * columnName => value
         */
        foreach ($list as $singleRow)
        {
            $_columns = $this->columns;
            foreach ($singleRow as $columnName => $value)
            {
                $_columns[$columnName]->setValue($value);
            }
            array_push($returnArray, new Plasma_ModelObject($this, $_columns));
        }
        return $returnArray;
        // TODO: 이 값들을 해당 모델에다가 넣어주고, 객체로 리턴해야 함.
    }

    public function findOne($findArray)
    {
        $findQuery = '';
        foreach ($findArray as $findFieldName => $findKey)
        {
            if (!array_key_exists($findFieldName, $this->columns))
            {
                throw new Plasma_NoColumnException;
            }
            $findQuery .= ' '.$findFieldName.'='.$findKey.' AND';
        }
        $findQuery = substr($findQuery, 0, -3);
        $thisTableName = $this->tableName;
        $query = 'SELECT * FROM $thisTableName WHERE $findQuery;';
        return mysql_get_one($query);
        // TODO: 이 값들을 해당 모델에다가 넣어주고, 객체로 리턴해야 함.
    }

}
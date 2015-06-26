<?php

class Plasma_ModelBox extends Plasma_BaseModel
{

    function __construct()
    {
        $this->table_name = '';
        $this->columns = array();
        $this->id = 0;
    }

    public function createEmptyObject()
    {
        return new Plasma_ModelObject($this, $this->columns);
    }

    public function find($find_array)
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

        $find_query = '';
        foreach ($find_array as $find_field_name => $find_key)
        {
            if (!array_key_exists($find_field_name, $this->columns))
            {
                throw new Plasma_NoColumnException;
            }
            $find_query .= ' '.$find_field_name.'='.$find_key.' AND';
        }
        $find_query = substr($find_query, 0, -3);
        $this_table_name = $this->table_name;
        $query = 'SELECT * FROM $this_table_name WHERE $find_query;';

        $list = mysql_get_list($query);
        $return_array = array();
        /*
         * columnName => value
         */
        foreach ($list as $single_row)
        {
            $_columns = $this->columns;
            foreach ($single_row as $column_name => $value)
            {
                $_columns[$column_name]->setValue($value);
            }
            array_push($return_array, new Plasma_ModelObject($this, $_columns));
        }
        return $return_array;
        // TODO: 이 값들을 해당 모델에다가 넣어주고, 객체로 리턴해야 함.
    }

    public function findOne($find_array)
    {
        $find_query = '';
        foreach ($find_array as $find_field_name => $find_key)
        {
            if (!array_key_exists($find_field_name, $this->columns))
            {
                throw new Plasma_NoColumnException;
            }
            $find_query .= ' '.$find_field_name.'='.$find_key.' AND';
        }
        $find_query = substr($find_query, 0, -3);
        $this_table_name = $this->table_name;
        $query = 'SELECT * FROM $this_table_name WHERE $find_query;';
        return mysql_get_one($query);
        // TODO: 이 값들을 해당 모델에다가 넣어주고, 객체로 리턴해야 함.
    }

}
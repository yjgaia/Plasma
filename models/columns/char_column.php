<?php

class Plasma_charColumn extends Plasma_baseColumn
{

    function __construct($columnName)
    {
        $this->columnType = 'charColumn';
        $this->columnName = (string)$columnName;
    }

    function plsm_getColumnType()
    {
        return $this->columnType;
    }

    function plsm_getColumnName()
    {
        return $this->columnName;
    }
}
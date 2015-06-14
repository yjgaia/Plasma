<?php

class Plasma_charColumn extends Plasma_baseColumn
{

    function __construct($columnName)
    {
        // TODO: Implement __construct() method.
        $this->columnType = 'charColumn';
        $this->columnName = (string)$columnName;
    }

    function plsm_getColumnType()
    {
        // TODO: Implement getColumnType() method.
        return $this->columnType;
    }

    function plsm_getColumnName()
    {
        // TODO: Implement getColumnName() method.
        return $this->columnName;
    }
}
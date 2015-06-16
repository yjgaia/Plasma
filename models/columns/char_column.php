<?php

class Plasma_charColumn extends Plasma_baseColumn
{

    function __construct($columnName)
    {
        $this->columnType = 'charColumn';
        $this->columnName = (string)$columnName;
    }

    function getColumnType()
    {
        return $this->columnType;
    }

    function getColumnName()
    {
        return $this->columnName;
    }
}
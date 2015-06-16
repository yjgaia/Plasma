<?php

class Plasma_charColumn extends Plasma_baseColumn
{

    function __construct($_value = null)
    {
        $this->columnType = 'charColumn';
        $this->value = $_value;
    }

    function getColumnType()
    {
        return $this->columnType;
    }

}
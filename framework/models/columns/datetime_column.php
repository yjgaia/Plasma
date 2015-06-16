<?php

class Plasma_datetimeColumn extends Plasma_baseColumn{

    function __construct($_value = null)
    {
        $this->columnType = 'datetimeColumn';
        $this->value = $_value;
    }

    protected function getColumnType()
    {
        return $this->columnType;
    }

}
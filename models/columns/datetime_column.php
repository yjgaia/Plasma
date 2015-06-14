<?php

class Plasma_datetimeColumn extends Plasma_baseColumn{

    function __construct($columnName)
    {
        $this->columnType = 'datetimeColumn';
        $this->columnName = (string)$columnName;
    }

    protected function plsm_getColumnType()
    {

    }

    protected function plsm_getColumnName()
    {

    }

}
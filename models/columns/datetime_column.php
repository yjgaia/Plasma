<?php

class Plasma_datetimeColumn extends Plasma_baseColumn{

    function __construct($columnName)
    {
        $this->columnType = 'datetimeColumn';
        $this->columnName = (string)$columnName;
    }

    protected function getColumnType()
    {

    }

    protected function getColumnName()
    {

    }

}
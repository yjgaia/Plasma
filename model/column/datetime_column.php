<?php

class Plasma_datetimeColumn extends Plasma_baseColumn{

    function __construct($columnName)
    {
        // TODO: Implement __construct() method.
        $this->columnType = 'datetimeColumn';
        $this->columnName = (string)$columnName;
    }

    protected function getColumnType()
    {
        // TODO: Implement getColumnType() method.
    }

    protected function getColumnName()
    {
        // TODO: Implement getColumnName() method.
    }

}
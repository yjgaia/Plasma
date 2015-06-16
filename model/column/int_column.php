<?php

class Plasma_intColumn extends Plasma_baseColumn {

    function __construct($columnName)
    {
        // TODO: Implement __construct() method.
        $this->columnType = 'intColumn';
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
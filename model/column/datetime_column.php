<?php

class Plasma_datetimeColumn extends Plasma_baseColumn{

    function __construct($columnName)
    {
        // TODO: Implement __construct() method.
        $this->columnType = 'datetimeColumn';
        $this->columnName = (string)$columnName;
    }

    protected function plsm_getColumnType()
    {
        // TODO: Implement plsm_getColumnType() method.
    }

    protected function plsm_getColumnName()
    {
        // TODO: Implement plsm_getColumnName() method.
    }

}
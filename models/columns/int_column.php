<?php

class Plasma_intColumn extends Plasma_baseColumn {

    function __construct($columnName)
    {

        $this->columnType = 'intColumn';
        $this->columnName = (string)$columnName;
    }

    protected function plsm_getColumnType()
    {

    }

    protected function plsm_getColumnName()
    {

    }
}
<?php

class Plasma_intColumn extends Plasma_baseColumn {

    function __construct($columnName)
    {

        $this->columnType = 'intColumn';
        $this->columnName = (string)$columnName;
    }

    protected function getColumnType()
    {

    }

    protected function getColumnName()
    {

    }
}
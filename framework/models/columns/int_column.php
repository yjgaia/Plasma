<?php

class Plasma_intColumn extends Plasma_baseColumn {

    function __construct($_value = null)
    {
        $this->columnType = 'intColumn';
        $this->value = $_value;
    }

    protected function getColumnType()
    {

    }

}
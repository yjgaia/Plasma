<?php

abstract class Plasma_baseColumn {

    public $value;

    public $columnName;

    public $columnType;

    abstract public function getColumnType();

    abstract public function generateValueForSQL();

    abstract public function setValue($_value);

}
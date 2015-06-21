<?php

abstract class Plasma_BaseColumn {

    public $value;

    public $columnName;

    public $columnType;

    abstract public function generateValueForSQL();

    abstract public function setValue($_value);

}
<?php

abstract class Plasma_baseColumn {

    protected $value;

    protected $columnName;

    protected $columnType;

    abstract protected function getColumnType();

    abstract protected function getColumnName();

}
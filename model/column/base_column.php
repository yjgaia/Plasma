<?php

abstract class Plasma_baseColumn {

    protected $columnName;

    protected $columnType;

    abstract protected function getColumnType();

    abstract protected function getColumnName();

}
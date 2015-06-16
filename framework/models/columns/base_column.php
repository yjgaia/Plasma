<?php

abstract class Plasma_baseColumn {

    protected $value;

    protected $columnType;

    abstract protected function getColumnType();

}
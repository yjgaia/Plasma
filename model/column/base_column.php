<?php
/**
 * Created by PhpStorm.
 * User: Min
 * Date: 2015. 6. 13.
 * Time: 오후 7:16
 */

namespace column;

abstract class baseColumn {

    protected $columnName;

    protected $columnType;

    abstract protected function getColumnType();

    abstract protected function getColumnName();

}
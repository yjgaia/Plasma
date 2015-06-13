<?php
/**
 * Created by PhpStorm.
 * User: Min
 * Date: 2015. 6. 13.
 * Time: 오후 7:00
 */

namespace column;


class intColumn extends baseColumn {

    function __construct($columnName)
    {
        // TODO: Implement __construct() method.
        $this->columnType = 'intColumn';
        $this->columnName = (string)$columnName;
    }

    protected function getColumnType()
    {
        // TODO: Implement getColumnType() method.
    }

    protected function getColumnName()
    {
        // TODO: Implement getColumnName() method.
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Min
 * Date: 2015. 6. 13.
 * Time: 오후 7:02
 */

namespace column;


class charColumn extends baseColumn
{

    function __construct($columnName)
    {
        // TODO: Implement __construct() method.
        $this->columnType = 'charColumn';
        $this->columnName = (string)$columnName;
    }

    function getColumnType()
    {
        // TODO: Implement getColumnType() method.
        return $this->columnType;
    }

    function getColumnName()
    {
        // TODO: Implement getColumnName() method.
        return $this->columnName;
    }
}
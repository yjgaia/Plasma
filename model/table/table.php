<?php
/**
 * Created by PhpStorm.
 * User: Min
 * Date: 2015. 6. 13.
 * Time: 오후 6:36
 */

abstract class Table {

    protected $columns; // Column must be declared in Array()

    protected $function;

    abstract protected function getId();

    abstract protected function setId($id);

    abstract protected function save();

    abstract protected function update($column, $value);

    abstract protected function delete();

}
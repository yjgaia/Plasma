<?php

abstract class Plasma_baseTable {

    protected $columns; // Columns must be declared in Array()

    abstract protected function getId();

    abstract protected function setId($id);

    abstract protected function save();

    abstract protected function update($column, $value);

    abstract protected function delete();

}
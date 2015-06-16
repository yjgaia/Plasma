<?php

abstract class Plasma_baseModel {

    protected $id;

    protected $columns; // Columns must be declared in Array()

    abstract protected function getId();

    abstract protected function setId($id);

    abstract protected function save();

    abstract protected function update($column, $value);

    abstract protected function delete();

    abstract protected function find();

    abstract protected function findOne();

}
<?php

abstract class Plasma_baseModel {

    public $tableName;

    public $id;

    public $columns; // Columns must be declared in Array()

    abstract public function save();

    abstract public function update($fieldName, $_value);

    abstract public function delete();

    abstract public function find($findArray);

    abstract public function findOne();

}
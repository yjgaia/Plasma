<?php

abstract class Plasma_baseModel {

    public $tableName;

    public $id;

    public $columns; // Columns must be declared in Array()

    abstract public function getId();

    abstract public function getTableName();

    abstract public function setTableName($tableName);

    abstract public function save();

    abstract public function update($fieldName, $_value);

    abstract public function delete();

    abstract public function find();

    abstract public function findOne();

}
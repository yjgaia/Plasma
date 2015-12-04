<?php

/**
 * Created by IntelliJ IDEA.
 * User: ingdya
 * Date: 2015-12-04
 * Time: 오전 11:41
 */
class Plasma_DatabaseResult {
    private $stmt;
    public $num_rows;
    public $field_count;

    public function __construct($stmt) {
        $this->stmt = $stmt;
        $this->num_rows = $this->stmt->rowCount();
        $this->field_count = $this->stmt->columnCount();
    }

    public function fetch_array() {
        return $this->stmt->fetch();
    }

    public function fetch_assoc() {
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetch_array_all() {
        return $this->stmt->fetchAll();
    }

    public function fetch_assoc_all() {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetch_row() {
        return $this->stmt->fetch(PDO::FETCH_NUM);
    }

    public function fetch_row_all() {
        return $this->stmt->fetchAll(PDO::FETCH_NUM);
    }

    public function fetch_object() {
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function fetch_object_all() {
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function errorCode() {
        return $this->stmt->errorCode();
    }

    public function errorInfo() {
        return $this->stmt->errorInfo();
    }
}
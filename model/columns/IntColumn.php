<?php

class Plasma_IntColumn extends Plasma_BaseColumn {

    function __construct($_value = null, $_columnName = null)
    {
        $this->columnType = 'intColumn';
        $this->columnName = $_columnName;
        $this->value = $_value;
    }

    public function getColumnType()
    {
        return $this->columnType;
    }

    public function generateValueForSQL()
    {
        return "'".(string)$this->value."'";
    }

    public function setValue($_value)
    {
        if (gettype($_value) == 'integer')
        {
            $this->value = $_value;
        }
        else
        {
            throw new Plasma_WrongTypeException;
        }
    }


}
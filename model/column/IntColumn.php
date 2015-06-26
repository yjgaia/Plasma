<?php

class Plasma_IntColumn extends Plasma_BaseColumn {

    function __construct($defaultValue = null, $_columnName = null)
    {
        $this->columnType = 'intColumn';
        $this->columnName = $_columnName;
        $this->value = $defaultValue;
    }

    public function generateValueForSQL()
    {
        return "'".(string)$this->value."'";
    }

    public function setValue($_value)
    {
        if (gettype($_value) === 'integer')
        {
            $this->value = $_value;
        }
        else
        {
            throw new Plasma_WrongTypeException;
        }
    }

}
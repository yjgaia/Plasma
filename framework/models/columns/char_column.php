<?php

class Plasma_charColumn extends Plasma_baseColumn
{

    function __construct($_value = null, $_columnName)
    {
        $this->columnType = 'charColumn';
        $this->columnName = $_columnName;
        $this->value = $_value;
    }

    public function getColumnType()
    {
        return $this->columnType;
    }

    public function generateValueForSQL()
    {
        return "'".$this->value."'";
    }

    public function setValue($_value)
    {
        if (gettype($_value) == 'string')
        {
            $this->value = $_value;
        }
        else
        {
            throw new Plasma_WrongTypeException;
        }
    }


}
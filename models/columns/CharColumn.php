<?php

class Plasma_CharColumn extends Plasma_BaseColumn
{

    function __construct($defaultValue = null, $_columnName = null)
    {
        $this->columnType = 'charColumn';
        $this->columnName = $_columnName;
        $this->value = $defaultValue;
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
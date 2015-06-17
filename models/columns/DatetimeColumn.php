<?php

class Plasma_DatetimeColumn extends Plasma_BaseColumn{

    function __construct($defaultValue = null, $_columnName = null)
    {
        $this->columnType = 'datetimeColumn';
        $this->columnName = $_columnName;
        $this->value = $defaultValue;
    }

    public function generateValueForSQL()
    {
        return "'".(string)date("Y-m-d H:i:s", $this->value)."'";
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
        // TODO: Damn Type!!! Let's think how to check type well.
    }


}
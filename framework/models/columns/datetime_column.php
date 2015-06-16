<?php

class Plasma_datetimeColumn extends Plasma_baseColumn{

    function __construct($_value = null, $_columnName)
    {
        $this->columnType = 'datetimeColumn';
        $this->columnName = $_columnName;
        $this->value = $_value;
    }

    public function getColumnType()
    {
        return $this->columnType;
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
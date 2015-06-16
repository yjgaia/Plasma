<?php

class My_Model extends Plasma_Model
{

    function function1()
    {
        return $this->columns['column1'];
    }

    function __construct()
    {
        $this->columns = array(
            'column1' => new Plasma_CharColumn(),
            'column2' => new Plasma_IntColumn()
        );
    }

}
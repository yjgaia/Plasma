<?php

class My_model extends Plasma_Model
{

    function function1()
    {
        return $this->columns['column1'];
    }

    function __construct()
    {
        $this->columns = array(
            'column1' => new Plasma_charColumn(),
            'column2' => new Plasma_intColumn()
        );
    }

}
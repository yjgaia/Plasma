<?php

class My_model extends Plasma_Model
{
    function function1()
    {
        return $this->columns['column1'];
    }

    function __construct()
    {
        $this->setTableName('tablename');
        $this->setColumns(array(
            'created_at' => new Plasma_datetimeColumn(),
            'name' => new Plasma_charColumn('default name'),
            'age' => new Plasma_intColumn(0)
        ));
    }
}

$model = new Plasma_Model();

$my_model_instance = new My_model();

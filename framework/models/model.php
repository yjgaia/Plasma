<?php

class Plasma_Model extends Plasma_baseModel
{

    function __construct()
    {
        $this->columns = array();
        $this->id = 0;
    }

    protected function getId()
    {
        return $this->id;
    }

    protected function setId($_id)
    {
        $this->id = $_id;
    }

    protected function save()
    {
        // execute query to save
    }

    protected function update($columnName, $value)
    {
        try
        {
            /*
             * variable columns forms this structure -
             * columnName => columnObject(contains type, value)
             */
            if (array_key_exists($columnName, $this->columns))
            {
                $this->columns[$columnName] = $value;
                // execute query to update
            }
            else
            {
                throw new Plasma_noColumnException;
            }

        }
        catch(Plasma_noColumnException $e)
        {
            // No column.
        }
    }

    protected function delete()
    {
        // execute query to delete
    }

    protected function find()
    {

    }

    protected function findOne()
    {

    }

    protected function setColumns($columnsArray)
    {
        $this->columns = $columnsArray;
    }

}
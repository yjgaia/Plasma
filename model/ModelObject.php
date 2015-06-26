<?php
class Plasma_ModelObject extends Plasma_BaseModel
{

    public $model_box;

    function __construct($model_box, $_columns)
    {
        $this->model_box = $model_box;
        $this->table_name = $model_box->table_name;
        $this->columns = $_columns;
        $this->id = 0;
    }

    public function save()
    {
        // execute query to save

        // generate all column's sql query
        $column_names = '';
        $column_values = '';
        foreach ($this->columns as $field_name => $column_obj)
        {
            if ($column_obj->columnName === null) {
                $column_names .= $field_name.', ';
            } else {
                $column_names .= $column_obj->columnName.', ';
            }
            $column_values .= $column_obj->generateValueForSQL().', ';
        }
        $column_names = substr($column_names, 0, -1);
        $column_values = substr($column_values, 0, -1);
        $this_table_name = $this->table_name;
        $this_id = $this->id;

        if ($this->id === 0) {
            // This object is not saved yet.
            $query = 'INSERT INTO $this_table_name ($column_names) VALUES ($column_values);';
            // Execute query
        } else {
            // This object is on the DB.
            $query = 'INSERT INTO $this_table_name ($column_names) VALUES ($column_values) WHERE id=$this_id;';
            // Execute query
        }

        mysql_run_query($query);

    }

    public function update($field_name, $_value)
    {
        if ($this->id === 0)
        {
            throw new Plasma_ObjectNotExists;
        }

        try
        {
            /*
             * variable columns forms this structure -
             * fieldName => columnObject(contains type, value, columnName)
             */
            if (array_key_exists($field_name, $this->columns))
            {
                // make query to update
                $this->columns[$field_name]->setValue($_value);

                $this_table_name = $this->table_name;
                $column_name = $this->columns[$field_name]->columnName;
                if ($column_name === null) {
                    $column_name = $field_name;
                }
                $column_value = $this->columns[$field_name]->generateValueForSQL();
                $this_id = $this->id;
                $query = 'UPDATE $this_table_name SET $column_name=$column_value WHERE id=$this_id';

                // Execute Query
                mysql_run_query($query);

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

    public function delete()
    {
        if ($this->id === 0)
        {
            throw new Plasma_ObjectNotExists;
        }
        $this_table_name = $this->table_name;
        $this_id = $this->id;
        $query = 'DELETE FROM $this_table_name WHERE id=$this_id';
        // Execute Query
        mysql_run_query($query);
    }
}
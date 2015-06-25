<?php
class Plasma_ModelObject extends Plasma_BaseModel
{

    function __construct($_modelBox, $_columns)
    {
        $this->modelBox = $_modelBox;
        $this->tableName = $_modelBox->tableName;
        $this->columns = $_columns;
        $this->id = 0;
    }

    public function save()
    {
        // execute query to save

        // generate all column's sql query
        $columnNames = '';
        $columnValues = '';
        foreach ($this->columns as $fieldName => $columnObj)
        {
            if ($columnObj->columnName == null) {
                $columnNames .= $fieldName.', ';
            } else {
                $columnNames .= $columnObj->columnName.', ';
            }
            $columnValues .= $columnObj->generateValueForSQL().', ';
        }
        $columnNames = substr($columnNames, 0, -1);
        $columnValues = substr($columnValues, 0, -1);
        $thisTableName = $this->tableName;
        $thisId = $this->id;

        if ($this->id == 0) {
            // This object is not saved yet.
            $query = 'INSERT INTO $thisTableName ($columnNames) VALUES ($columnValues);';
            // Execute query
        } else {
            // This object is on the DB.
            $query = 'INSERT INTO $thisTableName ($columnNames) VALUES ($columnValues) WHERE id=$thisId;';
            // Execute query
        }

        mysql_run_query($query);

    }

    public function update($fieldName, $_value)
    {
        if ($this->id == 0)
        {
            throw new Plasma_ObjectNotExists;
        }

        try
        {
            /*
             * variable columns forms this structure -
             * fieldName => columnObject(contains type, value, columnName)
             */
            if (array_key_exists($fieldName, $this->columns))
            {
                // make query to update
                $this->columns[$fieldName]->setValue($_value);

                $thisTableName = $this->tableName;
                $columnName = $this->columns[$fieldName]->columnName;
                if ($columnName == null) {
                    $columnName = $fieldName;
                }
                $columnValue = $this->columns[$fieldName]->generateValueForSQL();
                $thisId = $this->id;
                $query = 'UPDATE $thisTableName SET $columnName=$columnValue WHERE id=$thisId';

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
        if ($this->id == 0)
        {
            throw new Plasma_ObjectNotExists;
        }
        $thisTableName = $this->tableName;
        $thisId = $this->id;
        $query = 'DELETE FROM $thisTableName WHERE id=$thisId';
        // Execute Query
        mysql_run_query($query);
    }
}
<?php

/**
 * Created by IntelliJ IDEA.
 * User: ingdya
 * Date: 2015-12-04
 * Time: 오전 11:30
 */

require_once($PLASMA_FOLDER_PATH . '/db/DatabaseResult.php');

class Plasma_Database {
    private $handler;
    private $is_transaction;
    private $is_proc = FALSE;
    private $query_count = 0;
    private $errorInfo;
    private $errorCode;

    public function __construct() {
        $options[PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES UTF8';
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
        $this->handler = new PDO($dsn, DB_USER, DB_PASS, $options);
        if (!($this->handler instanceof PDO)) {
            throw new Exception ('CONSTRUCT:Cannot Create Handle');
        }
        $this->is_transaction = FALSE;
    }

    public function &query($statement) {
        $stmt = $this->handler->query($statement);
        $ret = new DBMS_Result($stmt);
        $this->query_count++;
        return $ret;
    }

    public function &query_fetch_one($statement) {
        $result =& $this->query($statement);
        if (!empty($result))
            list($ret, ) = $result->fetch_array();
        else
            $ret = FALSE;
        return $ret;
    }

    public function &proc_call($proc_name, $params)
    {
        if (empty($proc_name)) {
            throw new Exception ('PROCEDURE has not exists!!');
        }
        $chk_output = FALSE;
        if (is_array($params) && ($params_cnt = count($params)) > 0) {
            $params_out = array();
            foreach ($params as $key => $val) {
                if (preg_match_all('/^@[a-z_]+$/i', $val)) {
                    $params_out[] = $val;
                    $chk_output = TRUE;
                }
                else {
                    $params_out[] = "'". $this->handler->quote($val) ."'";
                }
            }
            $params_list = implode(", ", $params_out);
        }
        else {
            $params_list = '';
        }
        $result = $this->handler->query("CALL " . $proc_name ($params_list));
        $this->is_proc = $chk_output;
        return $result;
    }

    public function proc_finish() {
        $this->is_proc = FALSE;
    }

    public function prepare ($statement) {
        $parameters = func_get_args();
        array_shift($parameters);
        if(count($parameters) == 1 && is_array($parameters[0]))
        {
            $parameters = $parameters[0];
        }
        if (count($parameters) > 0) {
            $stmt = $this->handler->prepare($statement);
            $stmt->execute($parameters);
        } else {
            $stmt = $this->handler->query($statement);
        }
        $this->errorInfo = $this->handler->errorInfo();
        $this->errorInfo = $this->handler->errorCode();
        $ret = new DatabaseResult($stmt);
        $this->query_count++;
        return $ret;
    }

    public function lastInsertID() {
        return $this->handler->lastInsertId();
    }

    public function begin() {
        if(!$this->handler->beginTransaction()) {
            throw new Exception('BEGIN:Cannot Initialize Transaction');
        }
        $this->is_transaction = TRUE;
        return TRUE;
    }

    public function rollback() {
        if ($this->is_transaction !== TRUE) {
            throw new Exception ('ROLLBACK:Transaction is not Initialized!');
        }
        else {
            $this->handler->rollback();
            $this->is_transaction = FALSE;
        }
    }

    public function commit() {
        if ($this->is_transaction !== TRUE) {
            throw new Exception ('COMMIT:Transaction is not Initialized!');
        } else {
            $this->handler->commit();
            $this->is_transaction = FALSE;
        }
    }

    public function quote ($string) {
        return $this->handler->quote($string);
    }

    public function errorInfo() {
        return $this->errorInfo;
    }

    public function errorCode() {
        return $this->errorCode;
    }

    public function getQueryCount() {
        return $this->query_count;
    }
}
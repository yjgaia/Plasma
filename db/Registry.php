<?php

/**
 * Created by IntelliJ IDEA.
 * User: ingdya
 * Date: 2015-12-04
 * Time: 오전 11:28
 */

require_once($PLASMA_FOLDER_PATH . '/db/DatabaseStore.php');

class Plasma_Registry
{
    private static $db_conn = NULL;

    public static function &getConnection ($db_name = '', $is_new = FALSE)
    {
        if (empty(Plasma_Registry::$db_conn) || $is_new) {
            $dbms = new Database();
            Plasma_Registry::$db_conn =& $dbms;
        }
        return Plasma_Registry::$db_conn;
    }

    public static function resetConnection ()
    {
        Plasma_Registry::$db_conn = NULL;
    }

}
?>

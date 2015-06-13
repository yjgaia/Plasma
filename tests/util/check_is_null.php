<?php
$FOLDER = dirname(__FILE__);

include $FOLDER.'/../../include.php';

// true
echo plsm_check_is_null(null) ? 'true' : 'false';
echo '<br>';

// false
echo plsm_check_is_null('test') ? 'true' : 'false';

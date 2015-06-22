<?php

function post($index = null, $xss = null) {

  $data = $_POST[$index];

  if( empty($data) ) {

    $return = false;

  } else {

    if( $xss === TRUE ) {

      $data = htmlspecialchars($data);

    }

    $return = $data;

  }

  return $return;

}

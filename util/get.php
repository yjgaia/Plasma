<?php

function get($index = null, $xss = null) {

  $data = $_GET[$index];

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

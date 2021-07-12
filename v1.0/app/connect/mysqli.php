<?php


  if (in_array('mysqli', $configs['DRIVERS'])):
    try {
      $connect = new mysqli($configs['DB_HOST'], $configs['DB_USERNAME'], $configs['DB_PASSWORD'], $configs['DB_NAME']);
      // echo "Connected By MySQLi";
    } catch (Exception $err) {
      echo $err->getMessage();
    }
  endif;

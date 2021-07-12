<?php

  if (in_array('PDO', $configs['DRIVERS'])):

    $dsn = strtolower($configs['USING_ADMIN_SYSTEM']) . ':host=' . $configs['DB_HOST'] . ';dbname=' . $configs['DB_NAME'];

    global $connect;

    try {
      $connect = new PDO(
        $dsn,
        $configs['DB_USERNAME'],
        $configs['DB_PASSWORD'],
        $configs['DB_OPTIONS']
      );
      // TODO: To check if database connected to your app or not
      // echo "Connected By PDO";

    } catch (PDOException $error) {
      echo $error->getMessage();
    }

  endif;

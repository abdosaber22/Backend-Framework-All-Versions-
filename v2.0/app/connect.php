<?php

  $dsn = strtolower('mysql:host=' . config('DB_HOST') . ';dbname=' . config('DB_NAME'));

  global $connect;

  try {
    $connect = new PDO(
      $dsn,
      config('DB_USER'),
      config('DB_PASSWORD'),
      config('DB_OPTIONS')
    );
    // TODO: To check if database connected to your app or not
    // echo "Connected By PDO";

  } catch (PDOException $error) {
    echo $error->getMessage();
  }

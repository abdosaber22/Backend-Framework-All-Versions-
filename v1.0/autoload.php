<?php

  $configs  = require 'app/configs.php';
  $table    = require 'app/db-configs.php';

  require $configs['USE_LOADER'];

  define('DB_DSN', 'mysql:host=' . $configs['DB_HOST'] . ';dbname=' . $configs['DB_NAME']);
  define('DB_USERNAME', $configs['DB_USERNAME']);
  define('DB_PASSWORD', $configs['DB_PASSWORD']);

  $loader = new Application\LoaderABV_1($configs['FRAMEWORK_FILES']);

  $loader->render();

  $required = [
    $configs['CONNECT_BY'],
    $configs['STYLE_LOADER']
  ];

  foreach ($required as $file) { include_once $file; }

  $style = new Application\LoadingStyle('layout/', 'packages/themes/', 'packages/libs/');
  $style->defPackages = $configs['DEFAULT_PACKAGES'];

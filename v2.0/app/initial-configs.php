<?php

  define('INITIAL_APP_CONFIGS', 'app/configs.php');
  define('INITIAL_APP_CONNECT', 'app/connect.php');
  define('INITIAL_APP_ENV', 'app/env.php');
  define('HELPERS_PATH', 'helpers/');
  define('LOADER_LAYOUT', 'app/layout.php');

  require INITIAL_APP_ENV;
  require INITIAL_APP_CONNECT;

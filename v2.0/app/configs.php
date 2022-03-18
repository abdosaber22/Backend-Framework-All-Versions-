<?php
return [
  'APP_NAME'                => 'TESTING_APP',
  'APP_ICON'                => 'layout/imgs/test-icon.png',
  'APP_PATH'                => './',
  'DB_NAME'                 => 'education',
  'DB_USER'                 => 'root',
  'DB_HOST'                 => 'localhost',
  'DB_PASSWORD'             => '',
  'DB_OPTIONS'              => [
    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND    => 'SET NAMES utf8',
    PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC
  ],
  'LAYOUT_CSS'              => 'layout/css/',
  'LAYOUT_JS'               => 'layout/js/',
  'PACKAGES_PATH'           => 'packages/',
  'THEMES_PATH'             => 'packages/themes/',
  'FRONTEND_PACKAGES'                => [
    'packages/front-end/jquery/',
    'packages/front-end/popper/',
    'packages/front-end/bootstrap/',
    'packages/front-end/font-awesome/',
  ],
  'USE_THEME'               => 'packages/themes/default/',
  'CONNECTOR'               => 'database/connect.php',
  'FRAMEWORK_FILES'         => [
    'functions'                   => glob('helpers/functions/*.php'),
    'file-control'                => glob('helpers/file-system/*.php'),
    'form'                        => glob('helpers/fields/*.php'),
    'local-storage'               => glob('helpers/local-storage/*.php'),
    'database'                    => glob('helpers/db/*.php')
  ],
  'HEADER'                  => 'structure/header.php',
  'NAVBAR'                  => 'structure/navbar.php',
  'FOOTER'                  => 'structure/footer.php',
  'ONLINE_PACKAGES'         => [
    'SweetAlert'          => 'https://unpkg.com/sweetalert/dist/sweetalert.min.js',
  ],
];

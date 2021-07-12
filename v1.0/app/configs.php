<?php
  return [
    'DB_NAME'                 => 'usersystem',
    'DB_HOST'                 => 'localhost',
    'DB_USERNAME'             => 'root',
    'DB_PASSWORD'             => '',
    'APP_NAME'                => 'get.<span>IT</span>',
    'APP_ICON'                => 'layout/imgs/favicon.ico',
    'DB_OPTIONS'              => [
      PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
      PDO::MYSQL_ATTR_INIT_COMMAND    => 'SET NAMES utf8',
      PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC
    ],
    'APP'                     => '/',
    'HELPERS'                 => 'helpers/',
    'FUNCTIONS'               => 'helpers/functions/',
    'DATABASE'                => 'helpers/db/',
    'VALIDATE'                => [
      'WAYS'  => ['default', 'filterVAR'],
      'USE'   => 'default'
    ],
    'SANITIZE'                => [
      'WAYS'  => ['default', 'filter'],
      'USE'   => 'default'
    ],
    'DEFAULT_LAYOUT'          => 'layout/',
    'DEFAULT_CSS'             => 'layout/css/',
    'DEFAULT_JS'              => 'layout/js/',
    'PACKAGES_PATH'           => 'packages/libs/',
    'THEMES_PATH'             => 'packages/themes/',
    'DEFAULT_PACKAGES'        => [
      'FontAwesome'           => 'packages/libs/font-awesome/',
      'jQuery'                => 'packages/libs/jquery/',
      'BootStrap'             => 'packages/libs/bootstrap/',
    ],
    'ADD_PACKAGES'            => [],
    'DEFAULT_THEME_NAME'      => 'packages/themes/default/',
    'THEMES'                  => 'packages/themes/',
    'LOADERS_PATH'            => 'app/loaders/',
    'DRIVERS'                 => ['PDO', 'mysqli'],
    'LOADERS'                 => [
      'abv-1'   => 'USING glob()',
      'afo-80'  => 'USING scandir()',
      'spl'     => 'USING spl_autoload_register'
    ],
    'USE_LOADER'              => 'app/loaders/abv-1.php',
    'USING_ADMIN_SYSTEM'      => 'mysql',
    'CREATE_CONNECTION'       => 'app/connect/do.php',
    'CONNECT_BY'              => 'app/connect/PDO.php',
    'FRAMEWORK_FILES'         => [
      glob('helpers/functions/*.function.php'),
      glob('helpers/sanitize/*.php'),
      glob('helpers/db/*.php'),
      glob('helpers/validator/*.php'),
      glob('helpers/models/*.model.php'),
      glob('helpers/file_control/*.php')
    ],
    'STYLE_LOADER'            => 'app/load.php',
    'HEADER'                  => 'structure/header.php',
    'NAVBAR'                  => 'structure/navbar.php',
    'FOOTER'                  => 'structure/footer.php',
    'HOME-BG'                 => 'layout/imgs/home-bg.jpg',
    'PATHS'                   => [
      'user_pictures'   => 'uploaded/user_pics/',
      'products_pics'   => 'uploaded/products/',
      'edit_personal'   => 'settings.php?edit=personal',
      'edit_contact'    => 'settings.php?edit=contact-information',
    ],
    'GO'                      => [
      'profile'    => 'profile.php',
      'main'       => './',
      'settings'   => 'settings.php',
      'logout'     => 'logout.php'
    ],

  ];

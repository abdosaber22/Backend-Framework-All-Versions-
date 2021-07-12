<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?php title(); ?></title>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <?php $style->loadDefaultPackages('css'); // packages/libs/{lib_name_from_default_configs}/css/*.css ?>
  <?php $style->defaultLayout('css'); // layout/css/*.css ?>
  <?php
    if (isset($_COOKIE['username']) && !isset($_SESSION['username'])) {
      $_SESSION['username'] = $_COOKIE['username'];
    }
  ?>
</head>
<body <?php setBodyID(); ?>>

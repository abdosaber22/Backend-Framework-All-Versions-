<?php

  function view($d, $type = ':session')
  {
    if ($type == ':session') {
      echo $_SESSION[$d];
    } elseif ($type == ':cookie') {
      echo $_COOKIE[$d];
    }
  }

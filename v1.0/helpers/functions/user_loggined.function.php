<?php

  function checkUser($cookieAndSession = 'username')
  {
    if (!isset($_COOKIE[$cookieAndSession]) || !isset($_SESSION[$cookieAndSession])) {
      redirect($configs['DO_ACTIONS']['login'], 0);
    }
  }

  function user_exists($cookieAndSession = 'username')
  {
    if (isset($_COOKIE[$cookieAndSession]) || isset($_SESSION[$cookieAndSession])):
      return true;
    else:
      return false;
    endif;
  }

  function check($to = 'profile.php')
  {
    if (!user_exists()) {
      redirect($to);
    }
  }

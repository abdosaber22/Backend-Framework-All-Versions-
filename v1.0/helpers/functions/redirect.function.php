<?php

  function redirect($to, $after = 3000)
  {
    echo "<script> setTimeout(function () { window.location.href = '$to'; }, $after); </script>";
  }

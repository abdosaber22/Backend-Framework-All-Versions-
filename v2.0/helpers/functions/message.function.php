<?php

  function message($msg, $type = 'error')
  {
    echo "<div class='alert alert-$type' role='alert'>$msg</div>";
  }

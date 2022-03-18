<?php

  function addBodyClass() {
    global $bodyID;
    if (isset($bodyID)) {
      echo "class='$bodyID'";
    } else {
      echo "class='default-body'";
    }
  }

<?php

 /**
  * @method setBodyClass()
  * @return NULL
  * Responsible for giving class if isset $bodyID.
  */
  function setBodyID() {
    global $bodyID;
    if (isset($bodyID)) {
      echo "id='$bodyID'";
    } else {
      echo "id='default-body'";
    }
  }

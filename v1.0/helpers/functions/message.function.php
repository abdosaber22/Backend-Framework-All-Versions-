<?php

 /**
  * @method message
  * @param text What is your message
  * @param cssClass classes value
  * @return null
  */
  function message($text,  $cssClass = 'alert alert-primary') {
    echo "<div class='$cssClass'>$text</div>";
  }

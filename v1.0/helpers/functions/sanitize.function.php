<?php

  function defaultSantitze($target)
  {

    return htmlspecialchars(strip_tags($target));

  }

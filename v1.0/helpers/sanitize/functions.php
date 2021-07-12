<?php

  function filter($item)
  {
    return htmlspecialchars(strip_tags($item));
  }

<?php

  function reload($after = 200)
  {
    echo "<script>setTimeout(function () {  window.location.reload(); }, {$after});</script>";
  }

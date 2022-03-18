<?php

  $__data = '';

  function config($get, $edit = '')
  {
    global $__data;

    // Require Configurations file

    $__data = require(INITIAL_APP_CONFIGS);

    // Check if there's array inside $get var

    if (strpos($get, '::')):

      $get_index = explode("::", $get);
      // Get you back the value directly
      if (empty($edit)) {
        return $__data[$get_index[0]][$get_index[1]];
      } else { // Edit index in array inside configs
        $__data[$get_index[0]][$get_index[1]] = $edit;
        return $__data[$get_index[0]][$get_index[1]];
      }

    // If $get not an array
    else:
      if (empty($edit) && !empty($get)) {
        return $__data[$get];
      } elseif (!empty($get) && !empty($edit)) {
        $__data[$get] = $edit;
        return $__data[$get];
      }

    endif;


  }

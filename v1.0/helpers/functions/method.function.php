<?php

  class Method {

    public static function get($get_url = '', $value = '') {
      if ($get_url != '' && $value != '') {
        if ($_GET["$get_url"] == $value) {
          return true;
        } else { return false; }
      } elseif ($get_url != '' && $value == '') {
        if (isset($_GET["$get_url"])) {
          return true;
        } else { return false; }
      }
    }

    public static function post($method = '') {
      if (empty($method)) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          return true;
        }
      }
      if (!empty($method)) {
        if (isset($_POST[$method])) {
          return true;
        } else { return false; }
      }
    }

  }

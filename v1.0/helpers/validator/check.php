<?php

  class Check {

    public static function is_email($email) {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
      } else { return false; }
    }

    public static function is_int($int) {
      if (filter_var($int, FILTER_VALIDATE_INT)) {
        return true;
      } else { return false; }
    }

    public static function is_url($url) {
      if (filter_var($url, FILTER_VALIDATE_URL)) {
        return true;
      } else { return false; }
    }

    public static function is_bool($bool) {
      if (filter_var($bool, FILTER_VALIDATE_BOOLEAN)) {
        return true;
      } else { return false; }
    }

    public static function is_equal($str1, $str2) {
      if ($str1 === $str2) {
        return true;
      } else { return false; }
    }

    public static function max($str, $max_val) {
      if (strlen($str) >= $max_val && !empty($str)) {
        return true;
      } else { return false; }
    }

    public static function min($str, $min_val) {
      if (strlen($str) <= $min_val && !empty($str)) {
        return true;
      } else { return false; }
    }

  }

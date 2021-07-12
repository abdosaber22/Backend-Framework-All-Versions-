<?php

  class Sanitize {

    public static function sanitizeS($string, $spe = FILTER_SANITIZE_FULL_SPECIAL_CHARS) {
      return filter_var(clean($string), $spe);
    }

    public static function sanitize_string($string) {
      return filter_var($string, FILTER_SANITIZE_STRING);
    }

    public static function sanitize_email($email) {
      return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public static function sanitize_int($int) {
      return filter_var($int, FILTER_SANITIZE_NUMBER_INT);
    }

    public static function sanitize_url($url) {
      return filter_var($url, FILTER_SANITIZE_URL);
    }

    public static function sanitize_special($string) {
      return filter_var($string, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
  }

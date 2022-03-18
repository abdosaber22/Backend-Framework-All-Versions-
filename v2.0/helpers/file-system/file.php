<?php

 /**
  * @package File
  *
  */
  class File {
    public static function showDirectories($path) {
      return array_filter(glob($path), 'is_dir');
    }

    public static function createFile($filename, $data = '') {
      return file_put_contents($filename, $data, FILE_APPEND | LOCK_EX);
    }

  }

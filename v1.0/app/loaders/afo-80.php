<?php

namespace Application;

 /**
  * @package AFO80_Loader
  * Require project files using scandir() function
  */
  class AFO80_Loader
  {
    private $files;

   /**
    * @method constructor
    * @param files ===> Main Files Of Framework
    * @return array
    */
    function __construct($files)
    {
      $this->files = $files;
      return $files;
    }

   /**
    * @method constructor
    * @param depth ===> Sub Dirs
    * @return null
    */
    public function render($depth = 0)
    {
      foreach ($this->files as $main_file) {
        $dirhandle = @opendir($main_file);
        if ($dirhandle === false) return;
        while (($file = readdir($dirhandle)) !== false) {
          if ($file !== '.' && $file !== '..') {
            $fullfile = $main_file . '/' . $file;
            if (is_dir($fullfile)) {
              _require_all($fullfile, $depth+1);
            } else if (strlen($fullfile)>4 && substr($fullfile,-4) == '.php') {
              require $fullfile;
            }
          }
        }
        closedir($dirhandle);
      }
    }

  }

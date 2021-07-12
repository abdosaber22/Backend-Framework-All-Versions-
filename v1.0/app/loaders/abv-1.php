<?php

namespace Application;

 /**
  * @package Loader (abv-1) Version 1
  * This class is responsible for requiring All Framework Files
  * You Have to pass $configs['FRAMEWORK_FILES'] when you create instance of this class
  * @author Abdulrahman Saber <abdulrahmansaber120@gmail.com>
  */

  class LoaderABV_1
  {
    private $__files = [];

   /**
    * @return bool
    * @param files responsible for framework files
    */
    public function __construct($files)
    {
      $this->__files = $files;
      return true;
    }

    /**
     * @return bool || including files
     * @method render
     * You have to call this Method to require framework files
     */
    public function render()
    {
      $many_files = $this->__files;
      if (is_array($many_files)):
        foreach ($many_files as $files):
          foreach ($files as $file) {
            include $file;
          }
        endforeach;
      else:
        return false;
      endif;
    }
  }

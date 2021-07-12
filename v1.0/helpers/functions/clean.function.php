<?php

 /**
  * @method clean
  * @param __string the item you want to filter
  * @return string
  * Removes all special chars 
  */
  function clean($__string) {
     $__string = str_replace(' ', '', $__string);
     return preg_replace('/[^A-Za-z0-9\-]/', '', $__string);
  }

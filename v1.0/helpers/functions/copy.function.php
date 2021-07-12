<?php

 /**
  * @method CopyFolder
	* @param src ==> Folder you want to copy
	* @param dst ==> Where you want to put your copied folder
	* @return null
	*/
	function CopyFolder($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while ( $file = readdir($dir) ):
    	if (( $file != '.' ) && ( $file != '..' )) {
        if (is_dir($src . '/' . $file)):
          custom_copy($src . '/' . $file, $dst . '/' . $file);
       	else:
          copy($src . '/' . $file, $dst . '/' . $file);
        endif;
      }
		endwhile;
  	closedir($dir);
	}

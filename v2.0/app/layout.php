<?php
/**
 * @author Abdulrahman <abdulrahmansaber120@gmail.com>
 * @package Loader
 * Loading Front-end files
 */
class Loader {

  /**
   * Render all css files of layout folder
   */
  public static function load_css()
  {
    $files = glob(config('LAYOUT_CSS') . '*.css');
    foreach ($files as $file) {
      echo "\t<link rel='stylesheet' href='$file'>\n";
    }
  }
  /**
   * Render all js files of layout folder
   */
  public static function load_js()
  {
    $files = glob(config('LAYOUT_JS') . '*.js');
    foreach ($files as $file) {
      echo "\t<script src='$file'></script>\n";
    }
  }

  /**
   * Render all framework files
   * helpers/[all]
   */
  public static function render()
  {
    foreach (config('FRAMEWORK_FILES') as $data => $files) {
      foreach ($files as $key => $file) {
        include $file;
      }
    }
  }

  /**
   * @param $which ['HEADER', 'NAVBAR', 'FOOTER']
   * require structure files
   */
  public static function structure($which)
  {
    include config($which);
  }

  /**
   * @param string $type css || js
   * Require Front-End packages
   */
  public static function package_frontEnd(string $type)
  {
    switch($type):
      // CSS files of packages
      case 'css':
        foreach (glob(config('FRONTEND_PACKAGES') . '*.css') as $css_file) {
          echo "\t<link rel='stylesheet' href='$css_file'>\n";
        }
      break;
      // JS files of packages
      case 'js':
        foreach (glob(config('FRONTEND_PACKAGES') . '*.js') as $js_file) {
          echo "\t<script src='$js_file'></script>\n";
        }
      break;
    endswitch;
  }

  /**
   * @param string $type css || js
   * Require theme files
   * Css & Js files must be in folders like this or change it:
   * packages/themes/default/css/[files]
   * packages/themes/default/js/[files]
   */
  public static function use_theme(string $type)
  {
    switch($type):
      // CSS files of theme
      case 'css':
        foreach (glob(config('USE_THEME') . 'css/*.css') as $css_file) {
          echo "\t<link rel='stylesheet' href='$css_file'>\n";
        }
        break;
      // JS files of theme
      case 'js':
        foreach (glob(config('USE_THEME') . 'js/*.js') as $js_file) {
          echo "\t<script src='$js_file'></script>\n";
        }
        break;
    endswitch;
  }

}
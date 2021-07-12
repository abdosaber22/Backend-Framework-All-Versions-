<?php

namespace Application;

  class LoadingStyle
  {
    private $layout_path;
    private $theme;
    private $packages;
    public $defPackages;

    public function __construct($layout_path, $theme, $packages)
    {
      $this->layout_path = $layout_path;
      $this->theme = $theme;
      $this->packages = $packages;
    }

    public function loadDefaultPackages($type)
    {
      switch($type) {

        case 'css':
          foreach ($this->defPackages as $packName => $itsPath) {
            foreach (glob($itsPath . 'css/*.css') as $cssFile) {
              echo "\t<link rel='stylesheet' href='$cssFile'>\n";
            }
          }
        break;

        case 'js':
          foreach ($this->defPackages as $packName => $itsPath) {
            foreach (glob($itsPath . 'js/*.js') as $jsFile) {
              echo "\t<script type='module' src='$jsFile'></script>\n";
            }
          }
        break;

      }
    }

    public function loadAllPackages($type)
    {

      $allPackages = array_diff(scandir($this->packages), ['.', '..']);
      switch($type):
        case 'css':
          foreach ($allPackages as $package) {
            foreach (glob($this->packages . "$package/css/*.css") as $p) {
              echo "\t<link rel='stylesheet' href='$p'>\n";
            }
          }
        break;
        case 'js':
          foreach ($allPackages as $package) {
            foreach (glob($this->packages . "$package/js/*.js") as $p) {
              echo "\t<script type='module' src='$p'></script>\n";
            }
          }
        break;
      endswitch;
    }

    public function defaultLayout($type)
    {
      switch ($type):
        case 'css':
          foreach (glob($this->layout_path . 'css/*.css') as $file):
            echo "\t<link rel='stylesheet' href='$file'>\n";
          endforeach;
        break;

        case 'js':
          foreach (glob($this->layout_path . 'js/*.js') as $file):
            echo "\t<script type='module' src='$file'></script>\n";
          endforeach;
        break;
      endswitch;

    }

    public function useTheme($name, $type = 'css')
    {
      $name = $this->theme . $name;
      if (is_dir($name)) {
        switch ($type) {
          case 'css':
            foreach (glob($name . '/css/*.css') as $css_file) {
              echo "<link rel='stylesheet' href='$css_file'>";
            }
          break;
          case 'js':
            foreach (glob($name . '/js/*.js') as $js_file) {
              echo "<script type='module' src='$js_file'></script>";
            }
          break;
        }

      } else {
        return false;
      }
    }



  }

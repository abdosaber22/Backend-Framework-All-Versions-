<?php

// SELECT * FROM navigation WHERE navigation.nav_id NOT IN(SELECT nav_belongto FROM sub_nav)
  class Navigation extends PDO {

    private $tbl_name;
    private $sub_table;

    function __construct($table, $sub) {
      $this->tbl_name = $table;
      $this->sub_table = $sub;
      parent::__construct(DB_DSN, DB_USERNAME, DB_PASSWORD);
    }

    public function Navigations($id = 1) {
      $table_main = $this->tbl_name;
      $load = $this->prepare("SELECT * FROM `$table_main` WHERE `per` = $id");
      $load->execute();
      return $load->fetchAll();
    }

    public function getSubLinks() {
      $table_main = $this->tbl_name;
      $sub_table  = $this->sub_table;
      $statment = "SELECT * FROM `$table_main` INNER JOIN `$sub_table` ON `$table_main`.nav_id = `$sub_table`.nav_belongto";
      $ex = $this->prepare("$statment");
      $ex->execute();
      return $ex->fetchAll();
    }


    public function getAll() {
      $table_main = $this->tbl_name;
      $sub_table  = $this->sub_table;
      $statment = "SELECT * FROM `$table_main` INNER JOIN `$sub_table`";
      $ex = $this->prepare("$statment");
      $ex->execute();
      return $ex->fetchAll();
    }

    public function selectedSub($subid) {
      $table_main = $this->tbl_name;
      $sub_table  = $this->sub_table;
      $ex = $this->prepare("SELECT * FROM sub_nav WHERE nav_belongto = $subid");
      $ex->execute();
      return $ex->fetchAll();
    }


  }

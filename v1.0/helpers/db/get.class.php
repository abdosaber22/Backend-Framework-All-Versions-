<?php

  class GetStats extends PDO {

    public function __construct() {
      parent::__construct(DB_DSN, DB_USERNAME, DB_PASSWORD);
      return true;
    }

    public function getTableData($tbl) {
      $stmt = $this->query("SELECT * FROM $tbl");
      return $stmt;
    }

    public function getLast($tbl) {
      $stmt = $this->query("SELECT * FROM $tbl ORDER BY id DESC LIMIT 1");
      foreach ($stmt as $col_val) {
        return $col_val;
      }
    }

    public function getFirst($tbl) {
      $stmt = $this->query("SELECT * FROM $tbl ORDER BY id ASC LIMIT 1");
      foreach ($stmt as $col_val) {
        return $col_val;
      }
    }

  }

<?php

  class Update extends PDO {

    /**
     * This function for not getting errors about connection after creating new object of Class Table
     * @return bool
     */
    public function __construct()
    {
      parent::__construct(DB_DSN, DB_USERNAME, DB_PASSWORD);
      return true;
    }

    public function update($tbl, $col, $value, $where, $eq)
    {
      $up = $this->prepare("UPDATE {$tbl} SET {$col} = {$value} WHERE {$where} = {$eq}");
      $up->execute();
      if ($up->rowCount())
      {
        return true;
      } else { return false; }
    }

  }

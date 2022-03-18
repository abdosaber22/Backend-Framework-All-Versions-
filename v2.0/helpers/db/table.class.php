<?php

  /**
   * @author Abdulrahman
   * This class responsible for modifing tables
   * Add Cols
   * Modify Cols
   * Delete Cols
   * Getting Table Information
   */
  class Table extends PDO
  {

    /**
     * This function for not getting errors about connection after creating new object of Class Table
     * @return bool
     */
    public function __construct()
    {
      parent::__construct(DB_DSN, DB_USERNAME, DB_PASSWORD);
      return true;
    }

    /**
     * Drop Table [ One Column ] Or [ Many cols ]
     * @param $tbl = Table name
     * @param $cols = Columns name
     * @return int | NULL
     * If return 1 so the process succeeded else nothing has changed
     */
    public function dropCol($tbl, $cols)
    {
      if (!is_array($cols)):
        $stmt = $this->prepare("ALTER TABLE `$tbl` DROP COLUMN `$cols`");
        return $stmt->execute();
      endif;
    }

    /**
     * Getting table columns
     * @param $tbl = Table name
     * @return array
     */
    public function getTableInfo($tbl)
    {
      $stmt = $this->prepare("SHOW COLUMNS FROM `$tbl`;");
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /**
     * Add Cols To Table
     * @param $tbl = Table name
     * @param $col = Column name
     * @param $afterWhat = To add the column after other column
     * @return int
     */
    public function addCol($tbl, $col, $afterWhat = '')
    {
      $stmt = $this->prepare("ALTER TABLE `$tbl` ADD $col AFTER $afterWhat");
      return $stmt->execute();
    }

  }

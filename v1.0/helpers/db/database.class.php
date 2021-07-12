<?php

  /** Delete ( Table | Database )
   * $type         ==> What do you want to delete?
   * $name         ==> Name of table or database
   * $permission   ==> Is the one who tries an admin or what
   * @author Doba.
   * Do not change anything in __construct()
   */

  class Database extends PDO {

    // Relation of connection
    public function __construct() {
      parent::__construct(DB_DSN, DB_USERNAME, DB_PASSWORD);
      return true;
    }

    // Creating database function
    public function createDB($n) {
      if (!empty($n)) {
        $runstatment = $this->prepare("CREATE DATABASE IF NOT EXISTS $n");
        return $runstatment->execute();
      }
    }

    // Function is used for deleting
    public function delete($type, $name, $permission = 0) {
      if (!empty($type) && !empty($name) && $permission == 1):
        switch($type):
          case 'database':
            $rundb = $this->prepare("DROP DATABASE IF EXISTS $name;");
            return $rundb->execute();
          break;
          case 'table':
            $runTbl = $this->prepare("use " . DB_NAME .";DROP TABLE IF EXISTS $name;");
            return $runTbl->execute();
          break;
          default:
            die('Please.. Revise our docs of that function');
        endswitch;
      endif;
    }

    public function run($statment) {
      $st = $this->prepare($statment);
      $q  = $st->execute();
      return $q->rowCount();
    }

  }

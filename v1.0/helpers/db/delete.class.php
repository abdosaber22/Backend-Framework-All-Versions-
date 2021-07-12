<?php

  /**
   *
   */
  class Delete
  {
    private $connected_by;

    function __construct($connector)
    {
      $this->connected_by = $connector;
    }

    public function delete($tbl, $col, $equal)
    {
      $delete = $this->connected_by->prepare("DELETE FROM {$tbl} WHERE {$col} = {$equal}");
      $delete->execute();
      if ($delete->rowCount()) {
        return true;
      } else {
        return false;
      }
    }
  }

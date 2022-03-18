<?php

 /**
  * @package SessionLog
  * Responsible for Saving Sessions to Database
  * Delete Log
  * Add new log
  */
  class SessionLog extends PDO {


   /**
    * @method __construct
    * @param connector ==> $connect var which it was connected by
    * @return object
    */
    public function __construct()
    {
      parent::__construct(DB_DSN, DB_USERNAME, DB_PASSWORD);
    }

   /**
    * @method add_new_log
    * @param session_name ==> session name
    * @param session_value ==> session value
    * @return bool
    * Save Session to database
    */
    public function add_new_log($session_name, $session_value)
    {
      $get_session = $this->prepare("SELECT session_name FROM sessions WHERE session_name = '$session_name'");
      $get_session->execute();
      if ($get_session->rowCount()) {
        return false;
      } else {
        $hs_val = sha1($session_value);
        $add = $this->prepare("INSERT INTO sessions(`session_name`, `session_value`) VALUES('{$session_name}', '{$hs_val}')");
        $add->execute();
        return $add->rowCount();
      }
    }

   /**
    * @method edit_session_log
    * @param new_name ==> new session name
    * @param new_value ==> new session value
    * @return bool
    * Editing Session log
    */
    public function edit_session_log($id, $new_name, $new_value)
    {
      $hs_val = sha1($new_value);
      $edit = $this->prepare("UPDATE sessions SET `session_name` = '{$new_name}', `session_value` = '{$hs_val}', `last_updated_at` = CURRENT_TIMESTAMP WHERE `session_id` = {$id}");
      $edit->execute();
      return $edit->rowCount();
    }

   /**
    * @method delete_session_log
    * @param id
    * @return bool
    * Deleted wanted session with id
    */
    public function delete_session_log($id)
    {
      $del = $this->prepare("DELETE FROM sessions WHERE `session_id` = {$id}");
      $del->execute();
      return $del->rowCount();
    }

   /**
    * @method delete All
    * @return bool
    * Deleted wanted session with id
    */
    public function delete_log()
    {
      $del = $this->prepare("DELETE FROM sessions");
      $del->execute();
      return $del->rowCount();
    }

   /**
    * @method reset_autoincreament
    * @param to ==> Start auto_increament at?
    * @return bool
    */
    public function reset_autoincreament($to = 1)
    {
      $re = $this->prepare("ALTER TABLE sessions AUTO_INCREMENT = {$to};");
      $re->execute();
      return $re->rowCount();
    }

  }

<?php

 /**
  * @package SessionLog
  * Responsible for Saving Sessions to Database
  * Delete Log
  * Add new log
  */
  class CookieLog extends PDO {


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
    * @param cookie_name ==> cookie name
    * @param cookie_value ==> cookie value
    * @return bool
    * Save cookie to database
    */
    public function add_new_log($cookie_name, $cookie_value)
    {
      $get_cookie = $this->prepare("SELECT cookie_name FROM cookies WHERE cookie_name = '$cookie_name'");
      $get_cookie->execute();
      if ($get_cookie->rowCount()) {
        return false;
      } else {
        $hs_val = sha1($cookie_value);
        $add = $this->prepare("INSERT INTO cookies(`cookie_name`, `cookie_value`) VALUES('{$cookie_name}', '{$hs_val}')");
        $add->execute();
        return $add->rowCount();
      }
    }

   /**
    * @method edit_cookie_log
    * @param new_name ==> new cookie name
    * @param new_value ==> new cookie value
    * @return bool
    * Editing cookie log
    */
    public function edit_cookie_log($id, $new_name, $new_value)
    {
      $hs_val = sha1($new_value);
      $edit = $this->prepare("UPDATE cookies SET `cookie_name` = '{$new_name}', `cookie_value` = '{$hs_val}', `last_updated_at` = CURRENT_TIMESTAMP WHERE `session_id` = {$id}");
      $edit->execute();
      return $edit->rowCount();
    }

   /**
    * @method delete_cookie_log
    * @param id
    * @return bool
    * Deleted wanted cookie with id
    */
    public function delete_cookie_log($id)
    {
      $del = $this->prepare("DELETE FROM cookies WHERE `cookie_id` = {$id}");
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
      $del = $this->prepare("DELETE FROM cookies");
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
      $re = $this->prepare("ALTER TABLE cookies AUTO_INCREMENT = {$to};");
      $re->execute();
      return $re->rowCount();
    }

  }

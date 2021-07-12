<?php

 /**
  * @package User
  * Responsible for user actions
  */
  class User extends PDO
  {

   /**
    * @method constructor
    * @return null
    */
    function __construct()
    {
      parent::__construct(DB_DSN, DB_USERNAME, DB_PASSWORD);
    }

   /**
    * @method select
    * @return array if user was existed
    * @return false if user not exists
    */
    public function select()
    {
      if (!isset($_SESSION['username']) && isset($_COOKIE['username'])) {
        $_SESSION['username'] = $_COOKIE['username'];
      }
      $username = $_SESSION['username'];
      $getUser = $this->prepare("SELECT * FROM users WHERE id = '{$username}'");
      $getUser->execute();
      if ($getUser->rowCount()) {
        return $getUser->fetch();
      } else {
        return false;
      }
    }

   /**
    * @method view
    * @param d    ==> Column Name to view
    * @param reu  ==> Viewing what?
    * @return array if $reu = ':return'
    * @return string if $reu = ':view'
    */
    public function view($d, $reu = ':view') {
      if ($reu == ':view') {
        return $this->select()[$d];
      } elseif ($reu == ':return') {
        return $this->select();
      }
    }

   /**
    * @method logout
    * @return true
    * Logout from user panel
    */
    public function logout($to = './')
    {
      session_start();
      session_unset();
      session_destory();
      unset($_COOKIE['username']);
      redirect($to, 0);
      return true;
    }
  }

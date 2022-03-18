<?php

 /**
  * @package Sessions
  * Responsible for Sessions / Cookies processes
  * Add new Session / Cookie
  * Delete Session / Cookie
  * Logout
  */
  class Sessions {

   /**
    * @method save
    * @param session what session name
    * @param value the value of your session
    * @return string
    * Creating new session
    */
    public static function save($session, $value) {
      $_SESSION[$session] = $value;
      $new_log = new SessionLog();
      $new_log->add_new_log($session, $value);
      return $value;
    }

   /**
    * @method save_cookie
    * @param session what session+cookie name
    * @param value the value of your session+cookie
    * @return string
    * Creating new session / Cookie
    */
    public static function save_cookie($session, $value, $time = 10, $path = '/') {
      $_SESSION[$session] = $value;
      $new_log_Sess = new SessionLog();
      $new_log_Sess->add_new_log($session, $value);
      $new_log_coo = new CookieLog();
      $new_log_coo->add_new_log($session, $value);
      setcookie($session, $value, time() + (86400 * $time));
      return $value;
    }

   /**
    * @method delete_all_sessions
    * @return bool
    * Delete all sessions
    */
    public static function delete_all_sessions()
    {
      $log_del = new SessionLog();
      $log_del->delete_log();
      session_destroy();
      session_unset();
      return true;
    }

   /**
    * @method delete_all_sessions
    * @return bool
    * Delete all
    */
    public static function delete_all_cookies()
    {
      $log_del = new CookieLog();
      $log_del->delete_log();
      if (isset($_SERVER['HTTP_COOKIE'])):
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach($cookies as $cookie):
          $parts = explode('=', $cookie);
          $name = trim($parts[0]);
          setcookie($name, '', time()- (1000  * 4000));
          setcookie($name, '', time()- (1000  * 4000), '/');
        endforeach;
      endif;
    }

   /**
    * @method unset_session
    * @param sess_name ==> Session Name
    * @return bool
    * Unset One Session by Name
    */
    public static function unset_session($sess_name)
    {
      if (isset($_SESSION[$sess_name])) {
        unset($_SESSION[$sess_name]);
        $unset_session = new SessionLog();
        $search = $unset_session->prepare("SELECT session_name, session_id FROM admin_sessions WHERE session_name = '{$session_name}'");
        $search->execute();
        $data = $search->fetch();
        if ($search->rowCount()) {
          $unset_session->delete_session_log($data['session_id']);
          return true;
        }
      } else {
        return false;
      }
    }

   /**
    * @method unset_session
    * @param cook ==> Cookie Name
    * @return bool
    * Unset One Cookie by its name
    */
    public static function unset_cookie($cook_name)
    {

      if (isset($_COOKIE[$cook_name])) {
        setcookie($cook_name, '', time()- (1000  * 4000));
        $unset_cook = new CookieLog();
        $search = $unset_cook->prepare("SELECT cookie_name, cookie_id FROM admin_cookies WHERE cookie_name = '{$cook_name}'");
        $search->execute();
        $data = $search->fetch();
        if ($search->rowCount()) {
          $unset_cook->delete_cookie_log($data['cookie_id']);
          return true;
        }
      } else {
        return false;
      }
    }

  }

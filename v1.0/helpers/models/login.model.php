<?php

 /**
  * class Login
  * @author Abdulrahman Saber <abdulrahmansaber120@gmail.com>
  * This class responsible for user log in
  */

  class Login extends PDO {

    private $field_one;
    private $field_two;
    private $remember = 'rem';
    public $errors = [];

   /**
    * @param f1 = setting the first field of login form
    * @param f2 = setting the first field of login form
    * @return null
    */
    public function __construct($f1, $f2, $remember)
    {
      parent::__construct(DB_DSN, DB_USERNAME, DB_PASSWORD);
      $this->remember = $remember;
      $this->field_one = $f1;
      $this->field_two = $f2;
    }

   /**
    * @package checkValidate()
    * @return null
    * Check if fields empty or not
    */
    public function checkValidate()
    {
      if (empty($this->field_one))
      {
        $this->errors[] = "Please, Enter your account username to login";
      }
      if (empty($this->field_two))
      {
        $this->errors[] = "Please, Enter Your Account Password";
      }
    }

   /**
    * @package displayErrors()
    * @return null
    * Display users error
    */
    public function displayErrors()
    {
      foreach ($this->errors as $error):
        message("<i class='fas fa-exclamation-circle'></i>" . $error, 'alert alert-error');
      endforeach;
    }

   /**
    * @package success()
    * @return string || bool
    * Getting User data and check if exists
    */
    public function success()
    {
      $username = $this->field_one;
      $hashedPassword = sha1($this->field_two);
      if (empty($this->errors)) {
        $getUser = $this->prepare("SELECT * FROM users WHERE username = '{$username}' OR email = '{$username}' AND password = '{$hashedPassword}'");
        $getUser->execute();
        if ($getUser->rowCount()) {
          return $getUser->fetch();
        } else {
          return false;
        }
      }
    }

   /**
    * @package setUser
    * @return null
    * Setting cookies and sessions is user clicked remember me.
    * Then redirect user to profile after 3 seconds
    */
    public function setUser()
    {
      $data = $this->success();
      if (isset($_POST[$this->remember])) {
        $_SESSION['username'] = $data['id'];
        setcookie('username', $data['id'], time() + (86400 * 10), '/');
        defSwal('Welcome, ' . ucfirst($data['firstname']), 'success', 'You will be redirected...');
        redirect('profile.php', 1500);
      } else {
        $_SESSION['username'] = $data['id'];
        defSwal('Welcome, ' . ucfirst($data['firstname']), 'success', 'You will be redirected...');
        redirect('profile.php', 1500);
      }
    }

  }

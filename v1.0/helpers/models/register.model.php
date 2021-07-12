<?php

 /**
  * @package [Register]
  * Creating New Account By this class
  */
  class Register
  {
    private $connect;
    private $status = true;
    public $errors = [];
    private $fields = [];

   /**
    * @method constructor
    * @param fields ==> Form of registeration
    * @param conn   ==> PDO Object
    * @return object
    */
    function __construct($fields, $conn)
    {
      $this->connect = $conn;
      $this->fields = $fields;
      return $conn;
    }

   /**
    * @method user_exists
    * @param col1 ==> {{ Username }}
    * @param col2 ==> {{ Email Address }}
    * @param col3 ==> {{ Secondary email address }}
    * @return bool
    * Check if user exists or not before creating user
    */
    public function user_exists($col1, $col2, $col3)
    {
      $search_user = $this->connect->prepare("SELECT * FROM users WHERE username = '{$col1}' OR email = '{$col2}' or second_email = '{$col3}'");
      $search_user->execute();
      if ($search_user->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    }

   /**
    * @method validate
    * @return null
    * Validate form fields
    */
    public function validate()
    {
      foreach ($this->fields as $fields):
        if (empty($fields['value'])):
          $this->errors[] = $fields['empty_error'];
        elseif (!empty($fields['value']) and Check::max($fields['value'], $fields['max_len'])):
          $this->errors[] = $fields['max_len_error'];
        elseif (!empty($fields['value']) and Check::min($fields['value'], $fields['min_len'])):
          $this->errors[] = $fields['min_len_error'];
        endif;

        if (!empty($fields['value']) && !empty($fields['check'])):

          if ($fields['check'] == 'email') {
            if (!Check::is_email($fields['value'])) {
              $this->errors[] = $fields['check_error'];
            }
          } elseif ($fields['check'] == 'number') {
            if (!Check::is_int($fields['value'])) {
              $this->errors[] = $fields['check_error'];
            }
          } elseif ($fields['check'] == 'url') {
            if (!Check::is_url($fields['value'])) {
              $this->errors[] = $fields['check_error'];
            }
          }
        endif;
      endforeach;
    }

   /**
    * @method display_errors
    * @return null
    * Displaying errors of validation process
    */
    public function display_errors()
    {
      foreach ($this->errors as $error):
        message("<i class='fas fa-exclamation-circle'></i>" . $error, 'alert alert-error alert-sm');
      endforeach;
    }

   /**
    * @method success
    * @return bool
    * Check if validation proccess was succeeded or not
    */
    public function success()
    {
      if (empty($this->errors)) {
        return $this->status;
      }
    }

  }

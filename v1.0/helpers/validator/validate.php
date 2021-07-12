<?php

  class Validator
  {
    private $fields = [];
    private $status = true;

    public $errors = [];

    function __construct($fields)
    {
      $this->fields = $fields;
      return $fields;
    }

    public function validate() {

      $manyFields = $this->fields;
      $status = $this->status;
      foreach ($manyFields as $fields):

        if (empty($fields['value'])):
          $this->errors[] = $fields['empty_error'];
        endif;

      if (!empty($fields['maxlen_error'])) {
        if (Check::max($fields['value'], @$fields['max_length']) && !empty($fields['value'])) {
          $this->errors[] = @$fields['maxlen_error'];
        }
      }

      if (!empty($fields['minlen_error'])) {
        if (Check::min($fields['value'], @$fields['min_length']) && !empty($fields['value'])) {
          $this->errors[] = @$fields['minlen_error'];
        }
      }

      endforeach;
    }

    public function success() {
      if (empty($this->errors)) {
        return $this->status;
      }
    }

    public function display() {
      return $this->errors;
    }

  }

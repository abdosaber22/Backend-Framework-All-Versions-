<?php

  class Validator
  {
    private array $errors;
    private array $fields;
    private bool $status = true;

    public function __construct($form)
    {
      $this->fields = $form;
      return $this;
    }

    public function validate()
    {
      foreach ($this->fields as $field):

        if (!empty($field['value'])):

          if (Check::max($field['value'], $field['max_length'])):
            $this->errors[] = $field['max_length_error'];
          endif;
          if (Check::min($field['value'], $field['min_length'])):
            $this->errors[] = $field['min_length_error'];
          endif;

          // Check Type Error
          switch ($field['type']):
            case 'string':
              return is_string($field['value']) ? true : $this->errors[] = $field['type_error'];
            break;
            case 'email':
              return Check::is_email($field['value']) ? true : $this->errors[] = $field['type_error'];
            break;
            case 'url':
              return Check::is_url($field['value']) ? true : $this->errors[] = $field['type_error'];
            break;
            case 'number':
              return Check::is_int($field['value']) ? true : $this->errors[] = $field['type_error'];
            break;
            case 'bool':
              return Check::is_bool($field['value']) ? true : $this->errors[] = $field['type_error'];
            break;
            default:
              $this->errors[] = "Undefined type: " . $field['type'];
          endswitch;

        else:
          $this->errors[] = $field['empty_error'];
        endif;

      endforeach;
    }

    public function show_errors()
    {
      if (!empty($this->errors)) {
        return $this->errors;
      }
    }

    public function success()
    {
      return empty($this->errors) ? $this->status : false;
    }

  }

<?php

 /**
  * @package [RequestProduct]
  * Responsible for creating new request for the finished products
  */
  class RequestProduct {

    private $connect;

   /**
    * @method constructor
    * @return object
    * Setting the PDO Methods to this class by $connect variable of creating connection
    */
    function __construct($conn)
    {
      $this->connect = $conn;
      return $conn;
    }

   /**
    * @method new_request
    * @param for which product
    * @return bool
    * Creating the request
    */
    public function new_request($for)
    {
      $new = $this->connect->prepare("INSERT INTO requests(`request_for`) VALUES({$for})");
      $new->execute();
      return $new->rowCount();
    }

  }

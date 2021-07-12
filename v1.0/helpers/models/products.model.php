<?php

 /**
  * @package [products]
  * This class is responsible for controling products and its categories
  */
  class Products
  {
    private $connect;

   /**
    * @method constructor
    * @param connected_by for connection object
    * @return object
    * Responsible for using PDO Class
    */
    public function __construct($connected_by)
    {
      $this->connect = $connected_by;
      return $this->connect;
    }

   /**
    * @method get_limited_products
    * @param how_many how many recorders you want to get
    * @return array
    * Getting limited products from the end
    */
    public function get_limited_products($how_many)
    {
      $get_items = $this->connect->prepare("SELECT * FROM products ORDER BY id DESC LIMIT {$how_many}");
      $get_items->execute();
      return $get_items->fetchAll();
    }

   /**
    * @method data
    * @param id Product id to get data
    * @return array
    * Getting data of product
    */
    public function data($id)
    {
      $se = $this->connect->prepare("SELECT * FROM products WHERE id = {$id} AND visible = 1");
      $se->execute();
      return $se->fetch();
    }

   /**
    * @method exists
    * @param byID Product id to check if exist or not
    * @return bool
    * Checking if product exists or not
    */
    public function exists($byID = '')
    {
      $se = $this->connect->prepare("SELECT * FROM products WHERE id = {$byID}");
      $se->execute();
      return $se->rowCount();
    }

   /**
    * @method get_pictures
    * @param id Product id to get product pictures
    * @return array
    * Getting all pictures of product + product data
    */
    public function get_pictures($id)
    {
      $pics = $this->connect->prepare("SELECT * FROM products INNER JOIN product_pics ON products.Product_ID = product_pics.picture_for WHERE products.Product_ID = {$id}");
      $pics->execute();
      return $pics->fetchAll();
    }

   /**
    * @method getOnlyPics
    * @param id Product id to get product pictures only
    * @return array
    * Getting all pictures of product
    */
    public function getOnlyPics($id)
    {
      $pics = $this->connect->prepare("SELECT * FROM products_pictures WHERE belong_to = {$id}");
      $pics->execute();
      return $pics->fetchAll();
    }

   /**
    * @method get_products_of_category
    * @param byID Select categories product
    * @return array
    * Getting products of selected category
    */
    public function get_products_of_category($byID)
    {
      $prods = $this->connect->prepare("SELECT * FROM products WHERE belong_cate = {$byID} AND visible = 1 AND pieces != 0");
      $prods->execute();
      return $prods->fetchAll();
    }

  /**
   * @method join_products
   * @param byID Select categories product
   * @return array
   * Getting products of selected category
   */

    public function join_products($nums)
    {
      $data = $this->connect->prepare("SELECT * FROM products INNER JOIN categories ON products.id = categories.cate_id ORDER BY products.id ASC limit {$nums}");
      $data->execute();
      return $data->fetchAll();
    }

   /**
    * @method update_stock
    * @param for id of product
    * @return bool
    * Decrease pieces of the choosen product
    */
    public function update_stock($for)
    {
      $update = $this->connect->prepare("UPDATE products SET pieces = pieces - 1 WHERE id = {$for}");
      $update->execute();
      return $update->rowCount();
    }

   /**
    * @method get_all
    * @return array
    * Select all products
    */
    public function get_all()
    {
      $prods = $this->connect->prepare("SELECT * FROM products ORDER BY id ASC");
      $prods->execute();
      return $prods->fetchAll();
    }

  }

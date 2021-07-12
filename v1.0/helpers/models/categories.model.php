<?php

  /**
   * @package Categories
   * Responsible for getting categories and displaying them in app.
   */
  class Categories
  {
    private $connector;

   /**
    * @method constructor
    * @param connector is the variable which connected with database
    * @return object
    */
    function __construct($connector)
    {
      $this->connector = $connector;
      return $connector;
    }

   /**
    * @method get
    * @param orderBY which way that you want to order by?
    * @return array
    * Getting all categories which was added by admin
    */
    public function get($orderBY = 'ASC')
    {
      $cats = $this->connector->prepare("SELECT * FROM categories WHERE category_visible = 1 ORDER BY ordering {$orderBY}");
      $cats->execute();
      return $cats->fetchAll();
    }

   /**
    * @method sub_categories
    * @return array
    * Gettting sub categories data with main categories data
    */
    public function sub_categories()
    {
      $return = $this->connector->prepare("SELECT * FROM sub_cates INNER JOIN categories ON sub_cates.for_cate = categories.cate_id ORDER BY sub_cates.sub_cate_id DESC");
      $return->execute();
      return $return->fetchAll();
    }

   /**
    * @method category_exists
    * @param id refers to category id
    * @return int
    * check if category exists or not
    */
    public function category_exists($id)
    {
      $check_category = $this->connector->prepare("SELECT cate_id FROM categories WHERE cate_id = {$id}");
      $check_category->execute();
      return $check_category->rowCount();
    }

  }

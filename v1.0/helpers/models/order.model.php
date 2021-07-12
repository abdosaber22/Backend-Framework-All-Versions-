<?php


 /**
  * @package [order]
  * This class responsible for controling orders of selected products
  */
  class Order {

    private $connect;

   /**
    * @method constructor
    * @param connector This refers to the variable of main connection
    * @return object
    * Set The Connector to use PDO class methods
    */
    public function __construct($connector)
    {
      $this->connect = $connector;
      return $connector;
    }

   /**
    * @method new_order()
    * @param for_product Product_ID
    * @param for_user User_ID
    * @param color ProductColor
    * @return bool
    * Creating New Order
    */
    public function new_order($for_product, $for_user, $color)
    {
      $new = $this->connect->prepare("INSERT INTO orders(`order_for`, `order_user`,`order_color`) VALUES('{$for_product}', {$for_user},'{$color}')");
      $new->execute();
      return $new->rowCount();
    }

   /**
    * @method new_order()
    * @param for_product Product_ID
    * @param for_user User_ID
    * @param color ProductColor
    * @return bool
    * Check if order exists or not
    */
    public function order_exists($user_id, $product_id)
    {
      $get_order = $this->connect->prepare("SELECT order_for, order_user FROM orders WHERE order_user = {$user_id} AND order_for = {$product_id}");
      $get_order->execute();
      return $get_order->rowCount();
    }

   /**
    * @method delete_all_orders()
    * @return bool
    * Deleting All Orders
    */
    public function delete_all_orders()
    {
      $user = new User();
      $data = $user->select();
      if ($data['permissions'] == 2) {
        $del = $this->connect->prepare("DELETE FROM orders");
        $del->execute();
        return $del->rowCount();
      }
    }

   /**
    * @method order_all()
    * @param user_id
    * @return array
    * Getting All orders of user with product information
    */
    public function view_all($user_id)
    {
      $get_all_orders = $this->connect->prepare("SELECT * FROM orders INNER JOIN products ON orders.order_for = products.id WHERE orders.order_user = {$user_id}");
      $get_all_orders->execute();
      return $get_all_orders->fetchAll();
    }

   /**
    * @method get_order_data()
    * @param id
    * @return array
    */
    public function get_order_data($id)
    {
      $get = $this->connect->prepare("SELECT * FROM orders INNER JOIN products ON orders.order_for = products.id WHERE orders.order_user = {$id}");
      $get->execute();
      return $get->fetch();
    }

   /**
    * @method get_order_data()
    * @param id
    * @return bool
    * Change order status to disbale status
    */
    public function disable($id)
    {
      $dis = $this->connect->prepare("UPDATE orders SET status = 1 WHERE order_id = {$id}");
      $dis->execute();
      return $dis->rowCount();
    }

   /**
    * @method get_order_data()
    * @param id
    * @return bool
    * Change order status to undisbaled status
    */
    public function undisable($id)
    {
      $dis = $this->connect->prepare("UPDATE orders SET status = 0 WHERE order_id = {$id}");
      $dis->execute();
      return $dis->rowCount();
    }

   /**
    * @method how_many()
    * @return int
    * Get How many orders does user have
    */
    public function how_many()
    {
      $user = new User();
      $data = $user->select();
      $howMany = $this->connect->prepare("SELECT COUNT(*) as counted FROM orders WHERE order_user = {$data['id']}");
      $howMany->execute();
      foreach ($howMany->fetch() as $one) {
        return $one;
      }
    }

    public function delete($id, $user_id)
    {
      $order = $this->connect->prepare("DELETE FROM orders WHERE order_id = {$id} AND order_user = {$user_id}");
      $order->execute();
      return $order->rowCount();
    }
}

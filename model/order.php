<?php
class Order{
public $id;
public $food;
public $price;
public $quantity;
public $order_date;
public $customer_name;
public $customer_contact;



public function __construct($id=null,$food=null,$price=null,$quantity=null,$order_date=null, $customer_name=null,$customer_contact=null){
      $this->id=$id;
      $this->food=$food;
      $this->price=$price;
      $this->quantity=$quantity;
      $this->order_date=$order_date;
      $this->customer_name=$customer_name;
      $this->customer_contact=$customer_contact;
  
}

 #kom sa bazom,fja prikazi sve, GETALL

 public static function getAll(mysqli $conn)
 {
     $query = "SELECT * FROM order_food";
     return $conn->query($query);
 }


 #fja GETBYID

 public static function getById($id, mysqli $conn){
    $query = "SELECT * FROM order_food WHERE id=$id";

    $myObj = array();
    //mogu i prvo da inicijalizujem pa da prosledim msqlObj
    //a mogu i ovako gde odmah inic i proveravam da li je resul prazan
    if($msqlObj = $conn->query($query)){
        while($red = $msqlObj->fetch_array(1)){
            $myObj[]= $red;
        }
    }

    return $myObj;

}

      #fja DELETEBYID

   public function deleteById(mysqli $conn)
   {
       $query = "DELETE FROM order_food WHERE id=$this->id";
       return $conn->query($query);
   }
   
       #fja UPDATE
    public function update($id, mysqli $conn)
    {
        $query = "UPDATE order_food set food = $this->food,price = $this->price,quantity = $this->quantity,order_date = $this->order_date,customer_name = $this->customer_name,customer_contact = $this->customer_contact WHERE id=$id";
        return $conn->query($query);
    }

       #fja INSERT/ADD
       public static function add(Order $order, mysqli $conn)
       {
           $query = "INSERT INTO order_food(food, price, quantity, order_date, customer_name, customer_contact ) VALUES('$order->food','$order->price','$order->quantity','$order->order_date','$order->customer_name','$order->customer_contact')";
           return $conn->query($query);
       }



}


?>
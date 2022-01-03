<?php

require "../dbBroker.php";
require "../model/order.php";

if(isset($_POST['food']) && isset($_POST['price']) 
&& isset($_POST['quantity']) && isset($_POST['total']) && isset($_POST['order_date']) && isset($_POST['customer_name']) && isset($_POST['customer_contact'])){
    $order = new Order(null,$_POST['food'],$_POST['price'],$_POST['quantity'],$_POST['total'],$_POST['order_date'],$_POST['customer_name'],$_POST['customer_contact']);
    $status = Order::add($order, $conn);

    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo "Failed";
    }
}


?>
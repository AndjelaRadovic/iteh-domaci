<?php

require "../dbBroker.php";
require "../model/order.php";

if(isset($_POST['id'])){
    $myArray = Order::getById($_POST['id'], $conn);
    echo json_encode($myArray);
}

?>
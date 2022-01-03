<?php

require "dbBroker.php";
require "model/order.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$podaci = Order::getAll($conn);
if (!$podaci) {
    echo "Nastala je greška pri preuzimanju podataka";
    die();
}

if ($podaci->num_rows == 0) {
    echo "Nema narudžbina";
    die();
} else {


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order food</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
  
   <section class="navbar">
       <div class="container">
          <div class="food-logo">
             <img class="logo" src="images/logo.jpg" alt="Food Logo">
          </div>
          
          <div class="clearfix"></div>

        </div>
     
   </section> 
















   <section class="food-search text-center">
         <div class="container">
           
        </div>
   </section> 

   <section class="food-menu">
   <div class="container">
       
           <h2 class="text-center">Explore foods</h2>

               <div class="food-menu-box">
                  <div class="food-menu-img">
                      <img src="images/pizza.jpg" alt="Mexicana Pizza" class="img-responsive img-curve">
                  </div> 
                  <div class="food-menu-desc">
                      <h4>Pizza Mexicana</h4>
                        <p class="food-price">249 din</p>
                      
                       <br>
                     
                    </div>
                   

          
                </div>
              

                <div class="food-menu-box">
                  <div class="food-menu-img">
                      <img src="images/burger.jpg" alt="Mexicana Pizza" class="img-responsive img-curve">
                  </div> 
                  <div class="food-menu-desc">
                      <h4>Burger</h4>
                        <p class="food-price">229 din</p>
                       
                       <br>
                      
                    </div>
                   

          
                </div>
              

                <div class="food-menu-box">
                  <div class="food-menu-img">
                      <img src="images/fries.jpg" alt="Mexicana Pizza" class="img-responsive img-curve">
                  </div> 
                  <div class="food-menu-desc">
                      <h4>Pasta Carbonara</h4>
                        <p class="food-price">319 din</p>
                      
                       <br>
                       
                    </div>
                    

          
                </div>
              

                <div class="food-menu-box">
                  <div class="food-menu-img">
                      <img src="images/chicken-nuggets.jpg" alt="Mexicana Pizza" class="img-responsive img-curve">
                  </div> 
                  <div class="food-menu-desc">
                      <h4>Chicken nuggets</h4>
                        <p class="food-price">350 din</p>
                       
                       <br>
                       
                    </div>
                   

          
                </div>

                <div class="clearfix"></div>
              
                <div class="food-menu-box">
                  <div class="food-menu-img">
                      <img src="images/pizza.jpg" alt="Mexicana Pizza" class="img-responsive img-curve">
                  </div> 
                  <div class="food-menu-desc">
                      <h4>Pizza Mexicana</h4>
                        <p class="food-price">249 din</p>
                      
                       <br>
                       
                    </div>
                   

          
                </div>

                <div class="food-menu-box">
                  <div class="food-menu-img">
                      <img src="images/pizza.jpg" alt="Mexicana Pizza" class="img-responsive img-curve">
                  </div> 
                  <div class="food-menu-desc">
                      <h4>Pizza Mexicana</h4>
                        <p class="food-price">249 din</p>
                      
                       <br>
                      
                    </div>
                   

          
                </div>
               

                <div class="clearfix"></div>


        </div>
   </section> 


   <div class="row1">
        <div class="col-md-4">
            <button id="btn" class="btn btn-info btn-block" style="background-color: dimgrey; border: 2px solid #D37506; height:50px; font-size: 18px; border-radius: 28px; "> Show food!</button>
        </div>
        <div class="col-md-4">
            <button id="btn-dodaj" type="button" class="btn btn-success btn-block" style="background-color: dimgrey; border: 2px solid #D37506; height:50px; font-size: 18px; border-radius: 28px;" data-toggle="modal" data-target="#myModal"> Order food!</button>

        </div>
        <div class="col-md-4">
            <button id="btn-pretraga" class="btn btn-warning btn-block" style="background-color:  dimgrey; border: 2px solid #D37506; height:50px; font-size: 18px; border-radius: 28px;"> Search orders...</button>
            <input type="text" id="myInput" onkeyup="funkcijaZaPretragu()" placeholder="Search ordered food..." hidden>
        </div>
    </div>

    <div id="pregled" class="panel" style="margin-top: 10%; ">

        <div class="panel-body">
            <table id="myTable" class="table" style=" background-color: #ffbb54; border: 2px solid black;">
                <thead class="thead">
                    <tr>
                        <th scope="col">Food</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Order date</th>
                        <th scope="col">Customer name</th>
                        <th scope="col">Customer contact</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <?php
                    while ($red = $podaci->fetch_array()) :
                    ?>
                        <tr>
                            <td><?php echo $red["food"]?></td>
                            <td><?php echo $red["price"] ?></td>
                            <td><?php echo $red["quantity"] ?></td>
                            <td><?php echo $red["order_date"] ?></td>
                            <td><?php echo $red["customer_name"] ?></td>
                            <td><?php echo $red["customer_contact"] ?></td>
                            <td>
                                <label class="custom-radio-btn">
                                    <input type="radio" name="checked-donut" value=<?php echo $red["id"] ?>>
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                        </tr>
                <?php
                    endwhile;
                }
                ?>

                </tbody>
            </table>
            
            <div class="row">
                <div class="col-md-1">
                    <button id="btn-izmeni" class="btn btn-warning" data-toggle="modal" data-target="#izmeniModal">Change an order</button>

                </div>

                <div class="col-md-12">
                    <button id="btn-obrisi" formmethod="post" class="btn btn-danger" style="background-color: #242424; border: 3px solid #D37506;">Delete</button>
                </div>

                <div class="col-md-2">
                    <button id="btn-sortiraj" class="btn btn-normal" onclick="sortTable()">Sort the table</button>
                </div>

            </div>
        </div>
   </div>

   <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content" style="background-clip: revert; width:1000px; height:700px; box-shadow: 50px 50px 50px 50px rgba(0,0,0,.5); border: 5px black">
                <div class="modal-header" style="padding:5px; border-bottom:0px" >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container prijava-form">
                        <form action="#" method="post" id="dodajForm">
                            <h3 style="color: black; text-align: left; font-size: 55px; font-weight: bold">Fill an order:</h3>
                            <div class="row">
                                <div class="col-md-11" style="font-size: 25px; color: black">
                                    <div class="form-group">
                                        <label for=""style="background-color:#7EABC5">Food:</label>
                                        <input type="text" style="border: 2px solid black; height: 45px; " name="food" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="background-color:#7EABC5">Price:</label>
                                        <input type="text" style="border: 2px solid black ; height: 45px;" name="price" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="background-color:#7EABC5">Quantity:</label>
                                        <input type="text" style="border: 2px solid black ; height: 45px;" name="quantity" class="form-control" />
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="" style="margin-left: -15px; background-color:#7EABC5" >Date:</label>
                                            <input type="date" style="border: 2px solid black ; height: 45px; margin-left: -15px; width: 105%;" name="order_date" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="background-color:#7EABC5">Customer name:</label>
                                        <input type="text" style="border: 2px solid black ; height: 45px;" name="customer_name" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="background-color:#7EABC5">Customer contact:</label>
                                        <input type="text" style="border: 2px solid black ; height: 45px;" name="customer_contact" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <button id="btnDodaj" type="submit" class="btn btn-success btn-block" tyle="background-color: orange; border: 1px solid black;">Zakazi</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>



    </div>






   
       <div class="modal fade" id="izmeniModal" role="dialog">
        <div class="modal-dialog">

 
            <div class="modal-content" style="width: 1000px; height: 700px; box-shadow: 50px 50px 50px 50px rgba(0,0,0,.5); border: 5px black;">
                <div class="modal-header" style="padding: 5px; border-bottom: 0px" >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container prijava-form">
                        <form action="#" method="post" id="izmeniForm">
                            <h3 style="color: black; text-align: left; font-size: 55px; font-weight: bold">Change order:</h3>
                            <div class="row">
                                <div class="col-md-12" style="font-size: 25px; color: black">
                                    <div class="form-group">
                                        <input id="id" type="text" style="font-size: 20px; border: 2px solid black; height: 50px; " name="id" class="form-control" placeholder="Id *" value="" readonly />
                                    </div>
                                    <div class="form-group">
                                        <input id="food" type="text" style="font-size: 20px; border: 2px solid black; height: 50px; " name="food" class="form-control" placeholder="Food *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input id="price" type="text" style="font-size: 20px; border: 2px solid black; height: 45px; " name="price" class="form-control" placeholder="Price *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input id="quantity" type="text" style="font-size: 20px; border: 2px solid black; height: 45px; " name="quantity" class="form-control" placeholder="Quantity *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input id="order_date" type="date" style="font-size: 20px; border: 2px solid black; height: 45px; " name="order_date" class="form-control" placeholder="Order date *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input id="customer_name" type="text" style="font-size: 20px; border: 2px solid black; height: 45px; " name="customer_name" class="form-control" placeholder="Customer name *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input id="customer_contact" type="text" style="font-size: 20px; border: 2px solid black; height: 45px; " name="customer_contact" class="form-control" placeholder="Customer contact *" value="" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <button id="btnIzmeni" type="submit" class="btn btn-success btn-block" style="background-color: orange; border: 1px solid black;"> Change!
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>  
                </div>
                <div class="modal-footer" style="border: 0px">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="font-family: -webkit-pictograph; color: white; font-weight: bold; padding: 1px 5px; font-size: 25px; letter-spacing: 2px; width: 30%; margin-left: 230px; margin-top: 15px; background-color: black">Close</button>
                </div>
            </div>
        </div>
    </div>

       <script>
           function funkcijaZaPretragu() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
          }
     

         function sortTable() { 
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;

            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[1];
                    y = rows[i + 1].getElementsByTagName("TD")[1];
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
          }

        </script>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>



    
</body>
</html>
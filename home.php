<?php

require "dbBroker.php";


session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order food</title>

    <link rel="stylesheet" href="css/home.css">
</head>
<body>
   <section class="navbar">
       <div class="container">
          <div class="food-logo">
             <img class="logo" src="images/logo.jpg" alt="Food Logo">
          </div>
          <div class="menu text-right">
              <ul>
               <li><a href="">Home</a></li>
               <li><a href="">About</a></li>
               <li><a href="">Foods</a></li>
               <li><a href="">Contact</a></li>



              </ul>

          </div>
          <div class="clearfix"></div>

        </div>
     
   </section> 

   <section class="food-search text-center">
         <div class="container">
             <input type="search" name="search" placeholder="Search for food...">
             <input type="submit" name="submit" value="Search" class="btn btn-primary">
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
                       <p class="food-details">pelat, gauda, svježi </p>
                       <br>
                       <a href="a" class="btn btn-primary">Order Now</a>
                    </div>
                   

          
                </div>
              

                <div class="food-menu-box">
                  <div class="food-menu-img">
                      <img src="images/burger.jpg" alt="Mexicana Pizza" class="img-responsive img-curve">
                  </div> 
                  <div class="food-menu-desc">
                      <h4>Burger</h4>
                        <p class="food-price">229 din</p>
                       <p class="food-details">Sa ka;kavaljem i slaninom</p>
                       <br>
                       <a href="a" class="btn btn-primary">Order Now</a>
                    </div>
                   

          
                </div>
              

                <div class="food-menu-box">
                  <div class="food-menu-img">
                      <img src="images/creamy-bacon-carbonara.jpg" alt="Mexicana Pizza" class="img-responsive img-curve">
                  </div> 
                  <div class="food-menu-desc">
                      <h4>Pasta Carbonara</h4>
                        <p class="food-price">319 din</p>
                       <p class="food-details">Sa ka;kavaljem i slaninom</p>
                       <br>
                       <a href="a" class="btn btn-primary">Order Now</a>
                    </div>
                    

          
                </div>
              

                <div class="food-menu-box">
                  <div class="food-menu-img">
                      <img src="images/chicken-nuggets.jpg" alt="Mexicana Pizza" class="img-responsive img-curve">
                  </div> 
                  <div class="food-menu-desc">
                      <h4>Pohovani pileći komadići</h4>
                        <p class="food-price">350 din</p>
                       <p class="food-details">Sa ka;kavaljem i slaninom</p>
                       <br>
                       <a href="a" class="btn btn-primary">Order Now</a>
                    </div>
                   

          
                </div>
              

                <div class="food-menu-box">
                  <div class="food-menu-img">
                      <img src="images/sandwich.jpg" alt="Mexicana Pizza" class="img-responsive img-curve">
                  </div> 
                  <div class="food-menu-desc">
                      <h4>Sendvič</h4>
                        <p class="food-price">199 din</p>
                       <p class="food-details">Sa ka;kavaljem i slaninom</p>
                       <br>
                       <a href="a" class="btn btn-primary">Order Now</a>
                    </div>
                   

          
                </div>
              

                <div class="food-menu-box">
                  <div class="food-menu-img">
                      <img src="images/fries.jpg" alt="Mexicana Pizza" class="img-responsive img-curve">
                  </div> 
                  <div class="food-menu-desc">
                      <h4>Pomfrit</h4>
                        <p class="food-price">219 din</p>
                       <p class="food-details">Sa ka;kavaljem i slaninom</p>
                       <br>
                       <a href="a" class="btn btn-primary">Order Now</a>
                    </div>
                    

          
                </div>
              
     
             <div class="clearfix"></div>

        </div>
   </section> 


   <section class="social">
         <div class="container text-center">
           <ul>
             <li><a href=""><img src="https://img.icons8.com/fluency/48/000000/facebook-new.png"/></a></li>
             <li><a href=""><img src="https://img.icons8.com/fluency/48/000000/instagram-new.png"/></a></li>
             <li><a href=""><img src="https://img.icons8.com/fluency/48/000000/twitter.png"/></a></li>

           </ul>
        </div>
   </section> 


   <section class="footer">
       <div class="container">   
            <p>All rights deserved.</p>
        </div>

    </section> 
</body>
</html>
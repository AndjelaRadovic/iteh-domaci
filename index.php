
  <?php

require "dbBroker.php";
require "model/user.php";

session_start();
if(isset($_POST['username']) && isset($_POST['password'])){
    $uname = $_POST['username'];
    $upass = $_POST['password'];

    // $conn = new mysqli() /// pregazena konekcija iz dbBrokera;
    $korisnik = new User(4, $uname, $upass);
    // $odg = $korisnik->logInUser($uname, $upass, $conn);
    $odg = User::logInUser($korisnik, $conn); //pristup statickim funkcijama preko klase

    if($odg->num_rows==1){
        echo  `
        <script>
        console.log( "Uspešno ste se prijavili");
        </script>
        `;
        $_SESSION['user_id'] = $korisnik->id;
        header('Location: home.php');
        exit();
    }else{
        echo `
        <script>
        console.log( "Niste se prijavili!");
        </script>
        `;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Login</title>
</head>
<body>
<div class="wrapper">
  <div class="form">
    <div class="title">
      Prijavi se i naruči omiljenu hranu
    </div>
    <form method="POST" action="#">
      <div class="input_wrap">
        <label for="input_text">Korisničko ime:</label>
        <div class="input_field">
          <input type="text" name="username" class="input" id="input_text" required>
          </div>
         </div>
          <div class="input_wrap">
            <label for="input_password">Lozinka:</label>
            <div class="input_field">
            <input type="password" name="password" class="input" id="input_password" required>
           </div>
          </div>
            <div class="input_wrap">
        <button type="submit" class="btn btn-primary" name="submit">Prijavi se</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>
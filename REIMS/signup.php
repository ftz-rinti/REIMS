<?php
  //starting the session 
  session_start();
  if(isset($_SESSION['user'])){
    header('location: index.php');
  }
  $error_message="";
  if(isset($_POST['submit'])){
    include('database/add.php');

    $username= mysqli_real_escape_string($conn,$_POST['username']);
    $password= mysqli_real_escape_string($conn,$_POST['password']);

    $query1= "SELECT * FROM user WHERE user.username='.$username.' ";
    $query= mysqli_query($conn,$query1);
    $user_ct= mysqli_num_rows($query);
    if($user_ct>0){
      echo 'Username is taken';
    }else{
      $insert= "INSERT INTO user(user.username, user.password) VALUES ( '$username', '$password')";
      $iquery= mysqli_query($conn,$insert);
      if($iquery){
        header('location: index.php');
      }else{
        echo 'Unsuccessful';
      }
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>REIMS Login - Inventory Management System</title>
    <link rel="stylesheet" type="text/css" href="css/signup.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Roboto:wght@300;400;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body id="loginBody">
    <div class="container">
      <div class="loginHeader">
        <!-- <h1>REIMS</h1>
        <p>RUET Equipment Inventory Management System</p> -->
      </div>
      <div class="loginBody">
        <form action="" method="POST">
          <div class="loginInputsContainer">
            <label for="">Username</label>
            <input placeholder="username" name="username" type="text" required/>
          </div>
          <div class="loginInputsContainer">
            <label for="">Password</label>
            <input placeholder="password" name="password" type="password" required/>
          </div>
          <div class="loginButtonContainer">
            <button type="submit" name="submit">Sign up</button>
          </div>
          <p id="signPrompt">Already have an account? <a href="login.php">Login</a></p>
        </form>
      </div>
    </div>
  </body>
</html>

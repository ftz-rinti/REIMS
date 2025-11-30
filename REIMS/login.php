<?php
  //starting the session 
  session_start();
  if(isset($_SESSION['user'])){
    header('location: index.php');
  }
  $error_message="";
  if($_POST){
    include('database/connection.php');

    $username= $_POST['username'];
    $password= $_POST['password'];

    $query= 'SELECT * FROM user WHERE user.username="'.$username.'" AND user.password="'.$password.'";';
    $stmt= $conn->prepare($query);
    $stmt->execute();
    if($stmt->rowCount()>0){
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $user = $stmt->fetchAll()[0];
      $_SESSION['user']= $user;
      
      header('Location:index.php');
    }else{
      $error_message='Wrong username or password';
    }
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <title>REIMS Login - Inventory Management System</title>
    <link rel="stylesheet" type="text/css" href="css/login.css" />
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
        <!-- <h1>REIMS</h1> -->
        <!-- <p>RUET Equipment Inventory Management System</p> -->
        
      </div>
      <div class="loginBody">
        <form action=login.php method="POST">
          <div class="loginInputsContainer">
            <label for="">Username</label>
            <input placeholder="username" name="username" type="text" />
          </div>
          <div class="loginInputsContainer">
            <label for="">Password</label>
            <input placeholder="password" name="password" type="password" />
          </div>
          <div class="loginButtonContainer">
            <button class="log">login</button>
          </div>
          <p id="signPrompt">Don't have an account? <a href="signup.php">Sign Up</a></p>
        </form>
        <?php if(!empty($error_message)){?>
          <div>
            <p id="errorMessage">Error: <?=$error_message?></p>
          </div>
        <?php }?>
        
      </div>
    </div>
  </body>
</html>

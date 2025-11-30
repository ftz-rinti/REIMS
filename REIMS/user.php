<?php
  //starting the session 
  session_start();
  if(!isset($_SESSION['user'])){
    header('location: login.php');
  }
  $user= $_SESSION['user'];
  
  // var_dump($user);
  // die;
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="./css/style.css" />

    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />

    <title>Admin Dashboard Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Roboto:wght@300;400;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
   <?php include('sidebar.php'); ?>

    <section class="dashboard">
      <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>


        <!--<img src="images/profile.jpg" alt="">-->
      </div>
    </section>

    <script src="script.js"></script>
  </body>
</html>

<?php
  //starting the session 
  session_start();
  if(!isset($_SESSION['user'])){
    header('location: homepage.php');
  }
  $user= $_SESSION['user'];
  
  $cat= include('database/show_in_index.php');
  
  // var_dump($user);
  // die;
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
<!-- 
        <div class="search-box">
          <i class="uil uil-search"></i>
          <a href="search.php"><input type="text" placeholder="Search here..." /></a>
        </div> -->

        <!--<img src="images/profile.jpg" alt="">-->
      </div>

      <div class="dash-content">
        <div class="overview">
          <div class="title">
            <!-- <i class="uil uil-tachometer-fast-alt"></i> -->
            <span class="text">Dashboard</span>
          </div>

          <div class="boxes">
            <div class="box box1">
              <!-- <i class="uil uil-thumbs-up"></i> -->
              <span class="text">Total Equipments</span>
              <span class="number">57</span>
            </div>
            <div class="box box2">
              <!-- <i class="uil uil-comments"></i> -->
              <span class="text">Total Users</span>
              <span class="number">4</span>
            </div>
            <div class="box box3">
              <!-- <i class="uil uil-share"></i> -->
              <span class="text">Total Catagory</span>
              <span class="number">10</span>
            </div>
          </div>
        </div>

        <div class="activity">
          <div class="title">
            <!-- <i class="uil uil-clock-three"></i> -->
            <span class="text">Recent Activity</span>
          </div>

          <table class="table" style="margin: 10px 0 50px">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="row">Category</th>
                <th scope="row">Department</th>
                <th scope="row">No_equipment</th>
                <th scope="row">Currently_Available</th>
                <th scope="row">Date of Entry</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $cat as $index=>$cate) {?>
                <tr class="table-light">
                <td><?=$index + 1?></td>
                <td><?=$cate['Category']?></td>
                <td><?=$cate['Department']?></td>
                <td><?=$cate['No_equipment']?></td>
                <td><?=$cate['Currently_Available']?></td>
                <td><?=$cate['Date']?></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
      </div>
    </section>

    <script src="script.js"></script>
  </body>
</html>

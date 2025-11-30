<?php
  //starting the session 
  session_start();
  if(!isset($_SESSION['user'])){
    header('location: homepage.php');
  }
  $user= $_SESSION['user'];
  $_SESSION['table']="eq";
  $cat= include('database/show_eq_list.php');
//   var_dump($cat);
//   die;
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Admin Dashboard Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Roboto:wght@300;400;500;700&display=swap"
      rel="stylesheet"
    />
    
    <link rel="stylesheet" href="./css/category.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/equipment.css" />
    <style>
      body{
        font-family: 'Roboto', sans-serif;
      }
    </style>
  </head>
  <body>
   <?php include('sidebar.php'); ?>

    <section class="dashboard">
      <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>


        <!--<img src="images/profile.jpg" alt="">-->
      </div>
      <form action="database/add_e_list.php" method="POST">
          <span class="text">Add New Equipment</span>
                <div class="form-row">
                  <div class="col eq">
                  <label for="formGroupExampleInput">Category</label>
                    <input type="text" name="Category" class="form-control" placeholder="Category">
                  </div>
                  <div class="col eq">
                  <label for="formGroupExampleInput">Department</label>
                    <input type="text" name="Department" class="form-control" placeholder="Department">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col eq">
                  <label for="formGroupExampleInput">No_equipment</label>
                    <input type="number" name="No_equipment" class="form-control" placeholder="No_equipment">
                  </div>
                  <div class="col eq">
                  <label for="formGroupExampleInput">Currently_Available</label>
                    <input type="number" name="Currently_Available" class="form-control" placeholder="Currently_Available">
                  </div>
                </div>
                <div class="form-row ">
                  <div class="col eq">
                  <label for="formGroupExampleInput">Date</label>
                    <input type="date" name="Date" class="form-control" placeholder="Date">
                  </div>
                </div>
                <!-- <input type="hidden" name="table" value="category"> -->
                <button type="submit" class="btn btn-secondary" style="margin: 5px 0 50px">
                <i class="uil uil-check"></i> Add </button>
            </form>
            <table class="table table-hover" style="margin: 10px 0 50px">
            <span class="text">Equipments</span>
            <thead >
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
                <tr class="table">
                <td><?=$index + 1?></td>
                <td><?=$cate['Category']?></td>
                <td><?=$cate['Department']?></td>
                <td><?=$cate['No_equipment']?></td>
                <td><?=$cate['Currently_Available']?></td>
                <td><?=$cate['Date']?></td>
                <td><a href=""><i class="uil uil-trash-alt"></i></a></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
            
            
    </section>
   
    <script src="script.js"></script>
  </body>
</html>

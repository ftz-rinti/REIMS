<?php
  //starting the session 
  session_start();
  if(!isset($_SESSION['user'])){
    header('location: homepage.php');
  }
  $user= $_SESSION['user'];
  $_SESSION['table']="category";
  $cat= include('database/show_cat.php');
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
      href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Roboto:wght@300;400;700&display=swap"
      rel="stylesheet"
    />
    
    <link rel="stylesheet" href="./css/category.css" />
    <link rel="stylesheet" href="./css/style.css" />
  </head>
  <body>
   <?php include('sidebar.php'); ?>

    <section class="dashboard">
      <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>

        <!--<img src="images/profile.jpg" alt="">-->
      </div>
      <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col" colspan="2">Category</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $cat as $index=>$cate) {?>
                <tr class="table-light">
                <th scope="row"><?=$index + 1?></th>
                <td><?=$cate['Category_name']?></td>
                <td><a href=""><i class="uil uil-trash-alt"></i></a></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
            <form action="database/add_category.php" method="POST">
                <input class="form-control" type="text" name="Add" placeholder="Add new catagory" style="margin: 50px 0 10px">
                <!-- <input type="hidden" name="table" value="category"> -->
                <button type="submit" class="btn btn-secondary">
                <i class="uil uil-plus"></i> Add New</button>
            </form>
            
    </section>
   
    <script src="script.js"></script>
  </body>
</html>

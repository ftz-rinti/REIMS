<?php
  //starting the session 
  session_start();
  if(!isset($_SESSION['user'])){
    header('location: homepage.php');
  }
  $user= $_SESSION['user'];
  include('database/search_f.php');
//   var_dump($cat);
//   die;
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
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
      <div class="container">
      <form action="" method="GET">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Filter Items
                        <button type="submit" class="btn btn-dark btn-sm float-end">Search</button>
                        </h4>
                    </div>
                </div>
            </div>

            <!-- Brand List  -->
            <div class="col-md-5">
                
                    <div class="card shadow mt-3">
                        <div class="card-header">
                            <h5>Filter </h5>
                        </div>
                        <div class="card-body">
                            <h6>Category List</h6>
                            <hr>
                            
                            <?php
                              include('database/connection.php');

                                $query = "SELECT * FROM category;";
                                $stmt= $conn->prepare($query);
                                $stmt->execute();
                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                $brand_query_run  = $stmt->fetchAll();

                                // if(($brand_query_run-> rowCount()) > 0)
                                // {
                                    foreach($brand_query_run as $brandlist)
                                    {
                                        $checked = [];
                                        if(isset($_GET['brands']))
                                        {
                                            $checked = $_GET['brands'];
                                        }
                                        ?>
                                            <div>
                                                <input type="checkbox" name="brands[]" value="<?= $brandlist['Category_name']; ?>" 
                                            
                                            />
                                                <?= $brandlist['Category_name']; ?>
                                            </div>
                                        <?php
                                    }
                                // }
                                // else
                                // {
                                //     echo "No Brands Found";
                                // }
                            ?>
                        </div>
                    </div>
                
            </div>
            <div class="col-md-3">
                <form action="" method="GET">
                    <div class="card shadow mt-3">
                        <div class="card-header">
                            <h5>Filter 
                                
                            </h5>
                        </div>
                        <div class="card-body">
                            <h6>Department List</h6>
                            <hr>
                            
                            <?php
                              // include('database/connection.php');

                                $query = "SELECT * FROM department;";
                                $stmt= $conn->prepare($query);
                                $stmt->execute();
                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                $brand_query_run  = $stmt->fetchAll();

                                // if(($brand_query_run-> rowCount()) > 0)
                                // {
                                    foreach($brand_query_run as $brandlist)
                                    {
                                        $checked = [];
                                        if(isset($_GET['dep']))
                                        {
                                            $checked = $_GET['dep'];
                                        }
                                        ?>
                                            <div>
                                                <input type="checkbox" name="dep[]" value="<?= $brandlist['Dept']; ?>" 
                                            
                                            />
                                                <?= $brandlist['Dept']; ?>
                                            </div>
                                        <?php
                                    }
                                // }
                                // else
                                // {
                                //     echo "No Brands Found";
                                // }
                            ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <form action="" method="GET">
                    <div class="card shadow mt-3">
                        <div class="card-header">
                            <h5>Filter </h5>
                            </div>
                            <div class="card-body">
                                <h6>Date</h6>
                                <hr>
                                <input type="date" name="Date1">
                                <br>
                                <input type="date" name="Date2">
                                <!-- <br><br>
                                <input type="radio"  name="Before" value="Before"> Before This Date<br>
                                <input type="radio"  name="After" value="After"> After This Date<br>
                                <input type="radio"  name="Exact" value="Exact" checked="checked"> Only This Date -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Brand Items - Products -->
            <div class="col-md-9 mt-3">
                <div class="card ">
                    <div class="card-body row">
                        <?php
                        
                            $query="";
                            $catchecked=[];
                            if(isset($_GET['brands'])){
                                $catchecked= $_GET['brands'];
                            }else{
                                $query1 = "SELECT * FROM equipment";
                                $stmt= $conn->prepare($query1);
                                $stmt->execute();
                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                $categoryname= $stmt->fetchAll();
                                $catchecked = array_column($categoryname, 'Category');
                            }

                            $depchecked=[];
                            if(isset($_GET['dep'])){
                                $depchecked= $_GET['dep'];
                            }else{
                                $query2 = "SELECT * FROM Department";
                                $stmt= $conn->prepare($query2);
                                $stmt->execute();
                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                $departmentNames= $stmt->fetchAll();
                                $depchecked = array_column($departmentNames, 'Dept');
                            }
                            //echo $depchecked;
                            if(1){
                                $datechecked1= $_GET['Date1'];
                                $datechecked2= $_GET['Date2'];
                                $catcheckedStr = implode("','", $catchecked);
                                $depcheckedStr = implode("','", $depchecked);
                                $query=" SELECT * FROM equipment WHERE category IN ('$catcheckedStr') 
                                AND equipment.Department IN ('$depcheckedStr') AND 
                                equipment.Date BETWEEN '$datechecked1' AND '$datechecked2'";
                                echo $query;
                               
                            }else{
                                $catcheckedStr = implode("','", $catchecked);
                                $depcheckedStr = implode("','", $depchecked);
                                
                                $query=" SELECT * FROM equipment WHERE category IN ('$catcheckedStr') 
                                AND equipment.Department IN ('$depcheckedStr')";
                                echo $query;
                                
                            }
                        //    echo $query;
                                $stmt= $conn->prepare($query);
                                    $stmt->execute();
                                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                    $brand_query_run  = $stmt->fetchAll();
                                    $ct=0;
                                    if($brand_query_run)
                                    {?>
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
                                                <?php foreach( $brand_query_run as $cate) {
                                                $ct++;?>
                                                <tr class="table">
                                                <td><?=$ct?></td>
                                                <td><?=$cate['Category']?></td>
                                                <td><?=$cate['Department']?></td>
                                                <td><?=$cate['No_equipment']?></td>
                                                <td><?=$cate['Currently_Available']?></td>
                                                <td><?=$cate['Date']?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <?php
                                    }
                                    else
                                    {
                                        echo "No Items Found";
                                    }
                           
                        ?>
                    </div>
                </div>
            </div>
        </div>
      </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

      
      
            
    </section>
   
    <script src="script.js"></script>
  </body>
</html>

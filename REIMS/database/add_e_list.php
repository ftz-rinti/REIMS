<?php 
    session_start();
    include('connection.php');
    // $table_name= $_SESSION['table'];

    $category= $_POST['Category'];
    $dept= $_POST['Department']; 
    $No= $_POST['No_equipment'];
    $curr= $_POST['Currently_Available']; 
    $date= $_POST['Date'];
    
    
    try{
        $insert= "INSERT INTO equipment(Category,Department,No_equipment,Currently_Available,Date)
         VALUES ('".$category."','".$dept."',".$No.",".$curr.",'".$date."')";
    
        $stmt= $conn->prepare($insert);
        
        $stmt->execute();
        // var_dump($stmt);
        // die;
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    header("location: ../equipment_list.php");
?>
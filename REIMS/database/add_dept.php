<?php 
    session_start();
    include('connection.php');
    $table_name= $_SESSION['table'];

    $cate= $_POST['Add'];
    
    try{
        $insert= "INSERT INTO $table_name(Dept) VALUES ('".$cate."')";
    // var_dump($insert);
    // die;
        $stmt= $conn->prepare($insert);
        $stmt->execute();
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    header("location: ../dept.php");
?>
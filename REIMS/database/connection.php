<?php
    $survername='localhost';
    $username='root';
    $password='';

    //connecting to database
    try{
        $conn= new PDO("mysql:host=$survername;dbname=project_3100",$username,$password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(\Exception $e){
        $error_message = $e->getMessage();
        // echo'$error_message';
    }
?>
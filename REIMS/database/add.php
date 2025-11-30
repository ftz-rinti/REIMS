<?php
    $survername='localhost';
    $username='root';
    $password='';
    $db= 'project_3100';

    $conn= mysqli_connect($survername,$username,$password,$db);
    //connecting to database
    if($conn){
        ?>
        <script>
            alert('Success');
        </script>
        <?php
    }else{
        ?>
        <script>
            alert('No Success');
        </script>
        <?php
    }
?>
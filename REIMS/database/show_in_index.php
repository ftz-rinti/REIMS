<?php 
    include('connection.php');;
    $query= "SELECT * from equipment 
    ORDER BY date
    LIMIT 10";
    
        $stmt= $conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //     var_dump($stmt->fetchAll());
    // die;
        return $stmt->fetchAll();
?>
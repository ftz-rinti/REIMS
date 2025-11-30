<?php 
    include('connection.php');

    if(isset($_POST['search'])){
        $key= $_POST['keyword'];
        var_dump($key);
        die;
        $query= "SELECT * from category where category like %$key% OR
        Department like %$key% OR Date like %$key%";
        $stmt= $conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        $cat= $stmt->fetchAll();
        ?>
        <table class="table table-hover" style="margin: 10px 0 50px">
      <label for="formGroupExampleInput"><strong>List of all Equipments:</strong></label>
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
                <tr>
                <th scope="row"><?=$index + 1?></th>
                <th scope="row"><?=$cate['Category']?></th>
                <th scope="row"><?=$cate['Department']?></th>
                <th scope="row"><?=$cate['No_equipment']?></th>
                <th scope="row"><?=$cate['Currently_Available']?></th>
                <td><?=$cate['Date']?></td>
                <td><a href=""><i class="uil uil-trash-alt"></i></a></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
            <?php }else{

    }
    
        
?>
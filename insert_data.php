<?php
if(isset($_POST['add_students'])){
    
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $add = $_POST['add'];
    $idNum = $_POST['idNum'];

    if(empty($fName)){  
        header('location:index.php?message=You need to fill in the First Name!');
        exit(); 
    }
}
?>

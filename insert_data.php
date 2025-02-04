<?php

$connection = mysqli_connect("localhost", "root", "", "db_crud");


if(!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['add_students'])){
    
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $add = $_POST['add'];
    $idNum = $_POST['idNum'];

    if(empty($fName)){  
        header('location:index.php?message=You need to fill in the First Name!');
        exit(); 
    } else {
        $query = "INSERT INTO `students`(`firstNmae`, `lastName`, `address`, `idNumber`) VALUES ('$fName', '$lName', '$add', '$idNum')";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query Failed: " . mysqli_error($connection));
        } else {
            header('location:index.php?insert_msg=Your data has been added successfully!');
        }
    }
}

// Close the connection
mysqli_close($connection);
?>

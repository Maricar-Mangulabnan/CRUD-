<?php include('dbcon.php'); ?>
<?php include('header.php'); ?>

<?php
$id = ''; 


if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];

  
    $query = "SELECT * FROM students WHERE id = ?";
    
    if ($stmt = mysqli_prepare($connection, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "No student found with this ID.";
            exit();
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing query: " . mysqli_error($connection);
        exit();
    }
}


if(isset($_POST['update_students'])){
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $address = $_POST['add'];
    $idnumber = $_POST['idNum'];


    $query = "UPDATE students SET firstNmae = ?, lastName = ?, address = ?, idNumber = ? WHERE id = ?";
    
    if ($stmt = mysqli_prepare($connection, $query)) {
        mysqli_stmt_bind_param($stmt, "ssssi", $fname, $lname, $address, $idnumber, $id);
        mysqli_stmt_execute($stmt);
        
        if(mysqli_stmt_affected_rows($stmt) > 0) {
            header('Location: index.php?update_msg=You have successfully updated the data!');
            exit();
        } else {
            echo "Update failed or no changes made.";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing update query: " . mysqli_error($connection);
    }
}
?>

<div class="container mt-5">
    <form action="update_page.php?id=<?php echo htmlspecialchars($id); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

        <div class="form-group">
            <label for="fName">First Name</label>
            <input type="text" name="fName" class="form-control" value="<?php echo isset($row['firstName']) ? htmlspecialchars($row['firstName']) : ''; ?>" required>
        </div> 
        <div class="form-group">
            <label for="lName">Last Name</label>
            <input type="text" name="lName" class="form-control" value="<?php echo isset($row['lastName']) ? htmlspecialchars($row['lastName']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="add">Address</label>
            <input type="text" name="add" class="form-control" value="<?php echo isset($row['address']) ? htmlspecialchars($row['address']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="idNum">ID Number</label>
            <input type="text" name="idNum" class="form-control" value="<?php echo isset($row['idNumber']) ? htmlspecialchars($row['idNumber']) : ''; ?>" required>
        </div>
        <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
    </form>
</div>

<?php include('footer.php'); ?>
<?php include('dbcon.php'); ?>
<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container mt-5">
        <h2>BSCS 3-A</h2>
        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Student</button>
        </div>
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>ID Number</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM `students`";
                    $result = mysqli_query($connection, $query);
                    if(!$result){
                        die("Query Failed".mysqli_error($connection));
                    }
                    else{
                        while($row= mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstNmae']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['idNumber']; ?></td>
                    <td><a href="update_page.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>

                </tr>
                            <?php
                        }
                    }
                ?>
            </tbody>
        </table>

    <?php if(isset($_GET['message'])) { ?>
            <h6><?php echo $_GET['message']; ?></h6>
     <?php } ?>

     <?php if(isset($_GET['insert_msg'])) { ?>
            <h6><?php echo $_GET['insert_msg']; ?></h6>
     <?php } ?>

     <?php if(isset($_GET['update_msg'])) { ?>
            <h6><?php echo $_GET['update_msg']; ?></h6>
     <?php } ?>

     <?php if(isset($_GET['delete_msg'])) { ?>
            <h6><?php echo $_GET['delete_msg']; ?></h6>
     <?php } ?>

        </div>
        <!-- Modal -->
        <form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
            <div class="form-group">
                <label for="fName">First Name</label>
                <input type="text" name="fName" class="form-control">
            </div> 
            <div class="form-group">
                <label for="lName">Last Name</label>
                <input type="text" name="lName" class="form-control">
            </div>
             <div class="form-group">
                <label for="add">Address</label>
                <input type="text" name="add" class="form-control">
            </div>
            <div class="form-group">
                <label for="idNum">ID Number</label>
                <input type="text" name="idNum" class="form-control">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD">
      </div>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>
        
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<br><br>
<div class="container">
  <h2>Records of the User</h2> <br><br> 
  
  <?php
     $conn = mysqli_connect('localhost', 'root', 'nayana@6694', 'details');
     if(isset($_GET['del']))
     {
         $del_id = $_GET['del'];
         $delete = "DELETE FROM users WHERE user_id='$del_id'";
         $run_delete = mysqli_query($conn, $delete);
         if($run_delete == true)
         {
             echo "Record has been deleted";
         }
         else
         {
             "Failed";
         }
     }
  ?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>  
        <th>Name</th>
        <th>Emailid</th>
        <th>Password</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>

    <?php
  $conn = mysqli_connect('localhost', 'root', 'nayana@6694', 'details');
    
    $select = "SELECT * FROM users";
    $run = mysqli_query($conn, $select);
    while ($row_user = mysqli_fetch_array($run))
     {
         $user_id= $row_user['user_id'];
         $user_name= $row_user['user_name'];
         $user_email= $row_user['user_email'];
         $user_password =$row_user['user_password'];

    ?>
      <tr>
          <td>
              <?php echo $user_id; ?>
          </td>
          <td>
              <?php echo $user_name; ?>
          </td>
          <td>
              <?php echo $user_email;?>
          </td> 
          <td>
              <?php echo $user_password;?>
          </td> 
          <td>
              <a class ="btn btn-success" href ="edit.php?edit=<?php echo $user_id; ?>">Edit</a>
          </td> 
          <td>
              <a class ="btn btn-warning" href ="view.php?del=<?php echo $user_id; ?>">Delete</a>
          </td> 
          
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>

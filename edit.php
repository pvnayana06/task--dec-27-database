<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit User Details</title>
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
  <h2>Edit User Form</h2><br><br>

  <?php
      $conn = mysqli_connect('localhost', 'root', 'nayana@6994', 'details');

      if(isset($_GET['edit']))
      {
          $edit_id = $_GET['edit'];
          $select ="SELECT * FROM users WHERE user_id='$edit_id'";

          $run = mysqli_query($conn, $select);
          $row_user = mysqli_fetch_array ($run);
    
          $name = $row_user['user_name'];
          $email = $row_user['user_email'];
          $password =$row_user['user_password'];
      }
  ?>
  <form action =" " method="post">

    <label for  ="name">Name:</label>
    <input type ="text" class="form-control"  value= "<?php echo $name;?>" name="user_name"  ><br>

    <label for="email">Email:</label>
    <input type="email" class="form-control"  name="user_email" value="<?php echo $email;?>"><br>

    <label for="password">Password:</label>
    <input type="password" class="form-control" name="user_password" value="<?php echo $password;?>"><br>

    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary"  name="submit">Submit</button><br><br>
  </form>

<?php
      $conn = mysqli_connect('localhost', 'root', 'nayana@6694', 'details');
       
    if(isset($_POST['submit']))
    {
        $euser_name = $_POST['user_name'];
        $euser_email = $_POST['user_email'];
        $euser_password = $_POST['user_password'];

        $update = "UPDATE users SET user_name='$euser_name', user_email='$euser_email', user_password='$euser_password' WHERE user_id='$edit_id'";

        $run_update = mysqli_query($conn, $update);
        if($run_update == true)
        {
            echo "Data has been updated";
        }
        else
        {
            echo "Error, Try Again!";
        }
    }
?>
<a class= "btn btn-primary" href="view.php">View user</a>

</div>

</body>
</html>
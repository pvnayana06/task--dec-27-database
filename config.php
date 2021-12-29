<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Details</title>
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
  <h2>User Form</h2><br><br>
  <form action =" " method="post">

    <label for  ="name">Name:</label>
    <input type ="text" class="form-control" id="name"  name="user_name"><br>

    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email"  name="user_email"><br>

    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password"  name="user_password"><br>

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
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        $insert = "INSERT INTO users(user_name, user_email, user_password) VALUES('$user_name', '$user_email', '$user_password')";

        $run_insert = mysqli_query($conn, $insert);
        if($run_insert == true)
        {
            echo "Data has been inserted";
        }
        else
        {
            echo "Error, Try Again!";
        }
    }
?>
</div>

</body>
</html>
    
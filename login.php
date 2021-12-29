<?php 
    session_start();
?>
<! DOCTYPE html>  
<html lang="en" >  
<head>  
  <meta charset="UTF-8">  
  <title> login form
 </title>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">  
</head>  
<style>  
.container 
{  
    height: 100%;  
    display: flex;  
    align-items: center;  
    justify-content: center;  
    background-color: #f5f5f5;  
}  
form 
{  
    padding-top: 10px;  
    font-size: 14px;  
    margin-top: 30px;  
}  
.card-title 
{   
font-weight: 300;  
 }  
.btn 
{  
    font-size: 14px;  
    margin-top: 20px;  
}  
.login-form 
{   
    width: 330px;  
    margin: 20px;  
}  
  
  
</style>  
<body>  
<div class="pt-5">  
  <div class="container">  
    <div class="card login-form">  
    <div class="card-body">  
        <h3 class="card-title text-center"> Login</h3>  
        <div class="card-text">  
            <form>  
                <div class="form-group">  
                    <label for="email1"> Enter Email address </label>  
                    <input type="email" class="form-control form-control-sm" id="email1" name="email">  
                </div>  
                <div class="form-group">  
                    <label for="password1">Enter Password </label>  
                    <a href="#" style="float:right;font-size:12px;"> Forgot password? </a>  
                    <input type="password" class="form-control form-control-sm" id="password1" name="password">  
                </div>  
                <button type="submit" class="btn btn-primary btn-block" name="login-btn"> Sign in </button>   
            </form>
            
            <?php
                 $conn = mysqli_connect('localhost', 'root', 'nayana@6994', 'details');
                 if(isset($_POST['login_btn']))
                 {
                     $email = $_POST['email'];
                     $password = $_POST['password'];
                     $select = "SELECT * FROM users WHERE user_email='$email'";
                     $run = mysqli_query($conn, $select);
                     $row_user = mysqli_fetch_array($run);

                     $db_email = $row_user['user_email'];
                     $db_password = $row_user['user_password'];

                     if($email == $db_email && $password == $db_password)
                     {
                         echo "<script>window.open('index.php','_self');</script>";
                         $_SESSION['email'] = $db_email;
                     }
                     else
                     {
                         echo "Incorrect details";
                     }

                 }
            ?>

        </div>  
    </div>  
</div>  
</div>  
</body>  
</html>  
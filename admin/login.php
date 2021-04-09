<?php

require_once ('../config.php');
require_once (baseLink.'functions/validate.php');
require_once (baseLink.'functions/database.php');
?>
<?php
session_start();
if (isset($_SESSION['admin_name'])){
    header('location:'.baseAdminUrl.'index.php');
}
?>
                    
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
                                  "bootstrap links direct"
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  --> 
    <link rel="stylesheet" href="<?php echo baseAssetsUrl; ?>/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo baseAssetsUrl; ?>/css/style.css" >

    <title>Dashboard | Login</title>
  </head>
  <body>

  <?php 
  if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (checkEmpty($email) and checkEmpty($password)){
        if (checkEmail($email)){
            $check = getRow('admins','admin_email',$email);
            $checkPassword = password_verify($password ,$check['admin_pass']);

            if ($checkPassword){
                session_start();
                $_SESSION['admin_name'] = $check['admin_name'];
                $_SESSION['admin_email'] = $check['admin_email'];
                $_SESSION['admin_id'] = $check['admin_id'];

                header('location:'.baseAdminUrl.'index.php');
            }
            else {
                $error_message = 'wrong password';
            }
        }
        else {
            $error_message = 'wrong email';
        }
    }
    else{
        $error_message ='please fill the form ';
    }


  }

  ?>


        <div class="cont-login d-flex align-items-center justify-content-around">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="border p-5" >
                <div class="row">
                <?php  require baseLink.'functions/messages.php'; //to be included inside the form ?>

                    
                    <div class="col-sm-12  ">
                        <h3 class="text-center p-3 text-white">Login</h3>
                    </div>
                    <div class="col-sm-6 offset-sm-3 ">
                        <div class="form-group">
                            <label >Email </label>
                            <input type="email" name="email" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label >Password </label>
                            <input type="password" name="password" class="form-control" >
                        </div>

                        <div class="form-group">
                           
                            <input type="submit" name="submit" class="form-control btn btn-success"   >
                        </div>
                    </div>
                </div>
                
            </form>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo ASSETS; ?>/js/jquery-3.4.1.min.js" ></script>
    <script src="<?php echo ASSETS; ?>/js/popper.min.js" ></script>
    <script src="<?php echo ASSETS; ?>/js/bootstrap.min.js" ></script>




  </body>
</html>
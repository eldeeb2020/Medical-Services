<?php
require_once ('../../config.php');
require_once (baseAdminLink.'inc/header.php');
require_once (baseLink.'functions/validate.php');
require_once (baseLink.'functions/database.php');
?>
<?php
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (checkEmpty($name) and checkEmpty($email) and checkEmpty($password)){
          if (checkEmail($email)){
              //$success_message = 'ok email is valid';
              $hashPassword = password_hash($password, PASSWORD_DEFAULT);

              $sql = "INSERT INTO admins (`admin_name`,`admin_email`,`admin_pass`)
                    VALUES ('$name','$email','$hashPassword') ";
              $success_message = insert($sql);
          }
          else {
              $error_message = 'your mail not valid';
          }
    }
    else{
        $error_message = 'please fill the form';
    }
    require_once (baseLink.'functions/messages.php');

    
    
};
?>


<div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white">Add New Admin</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label >Name </label>
                <input type="text" name="name" class="form-control" >
            </div>

            <div class="form-group">
                <label >Email </label>
                <input type="email" name="email" class="form-control" >
            </div>

            <div class="form-group">
                <label >Password </label>
                <input type="password" name="password" class="form-control" >
            </div>

            
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
       
    </div>


<?php
require_once (baseAdminLink.'inc/footer.php');
?>
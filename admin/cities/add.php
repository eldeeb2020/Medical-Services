<?php
require_once ('../../config.php');
require_once (baseAdminLink.'inc/header.php');
require_once (baseLink.'functions/validate.php');
require_once (baseLink.'functions/database.php');
?>

<?php
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    if (checkEmpty($name) and checkCity($name,3)) {
        $sql = "INSERT INTO cities (`city_name`)
                    VALUES ('$name') ";
        if (insert($sql)){
            $success_message = 'city added';
        }
    }
    else {
        $error_message = 'please enter the name of the city';
    }

    }

?>
<div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white">Add New City</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <?php  require baseLink.'functions/messages.php'; ?> 
            <div class="form-group">
            
                <label >Name Of City</label>
                <input type="text" name="name" class="form-control" >
            </div>
            
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
       
    </div>












<?php
require_once (baseAdminLink.'inc/footer.php');
?>
<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dataBaseName = "medical_data";

$conn = mysqli_connect($serverName,$userName,$password,$dataBaseName);

if (!$conn){
    die ("Error: ".mysqli_connect_error());
}

function insert($sql){
    global $conn;

    $result = mysqli_query($conn,$sql);
    
    if ($result){
        return true;
    }
    else{
        return false;
    }
}

function getRow($tableName, $field, $value){
    global $conn; //to connect to data base

    $sql = "SELECT * FROM `$tableName` WHERE `$field` = '$value'";
    $result = mysqli_query($conn,$sql);

    if($result){ 
        $rows = [];
        if (mysqli_num_rows($result)){// mean if there is a data
            $rows[] = mysqli_fetch_assoc($result);
            return $rows[0];

        }
        
    }
    return false;

}
function getRows($tableName){
    global $conn;
    $sql = "SELECT * FROM `$tableName`";
    $result = mysqli_query($conn,$sql);
    if ($result){
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
    }
    return $rows;
}


?>




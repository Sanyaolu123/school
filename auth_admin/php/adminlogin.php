<?php
session_start();
include_once "../../db.php"; 
$username = mysqli_real_escape_string($db, $_POST["username"]);
$password = mysqli_real_escape_string($db, $_POST["password"]);

if(empty($username)){
    echo "Username is required to login!";
}
else{
    if(empty($password)){
        echo "Password is required to login!";
    }else{
        $sql = "SELECT * FROM admin WHERE username = '".$username."'";
        $query = mysqli_query($db, $sql);

        if($adminRow = mysqli_fetch_assoc($query)){
            if($password == $adminRow["password"]){
                $_SESSION["admin_id"] = $adminRow["admin_id"];
                echo "success";
            }else{
                echo "Password is Incorrect!";
            }
        }
        else{
            echo "Username is Incorrect!";
        }
    }
}
?>
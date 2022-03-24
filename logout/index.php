<?php 
session_start();
unset($_SESSION["stud_id"]);
unset($_SESSION["t_id"]);
session_destroy();

if(isset($_GET["teacher"])){
    unset($_SESSION["t_id"]);
    unset($_SESSION["t_true"]);
    header("Location: ../auth-teachers/");
    exit();
}

if(isset($_GET["dashboard"])){
    if(isset($_SESSION["t_true"])){
        unset($_SESSION["t_true"]);
    }
    unset($_SESSION["s_true"]);

    header("Location: ../dashboard/");
    exit();
}

header("Location: ../");
exit();
?>
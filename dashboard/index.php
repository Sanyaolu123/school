<?php 
session_start();
include_once "../db.php";
if(!isset($_SESSION["r_u"])){
    header("Location: ../");
    exit();
}
if(isset($_SESSION["t_true"])){
    header("Location: ../classes/");
    exit();
}
if(isset($_SESSION["s_true"])){
    header("Location: ../classes/");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="../plugins/tailwind/tailwind.min.css">
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body class="bg-gray-200 h-screen w-100 md:flex">
    <?php 
    if(isset($_SESSION["t_id"])){
        $reg = $_SESSION["t_reg_no"];
        include_once "teacher_session.php";
    }else{
        if(isset($_SESSION["stud_id"])){
            include_once "student_session.php";
        }
    }
    ?>
</body>
</html>
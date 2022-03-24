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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
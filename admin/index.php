<?php 
session_start();
if(!isset($_SESSION["admin_id"])){
    header("Location: ../");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="../plugins/tailwind/tailwind.min.css">
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body class="h-screen bg-gray-200 flex">
    <div class="sidebar h-screen bg-gray-200 p-4 w-1/5">
        <div class="sidebar-show bg-yellow-400 fixed p-3 py-4 rounded-lg" style="height:95vh; width:250px;">
            <p class="text-xl  text-center font-medium text-white">LOGO</p>

            <ul class="mt-20">
                <!-- pages -->
                <li><a href="">Dashboard</a></li>
                <li class="text-white">Pages</li>
                <li><a href=""></a></li>
            </ul>
        </div>
    </div>
    <div class="main md:w-4/5 p-4 h-screen w-100">
        <div class="w-100 bg-white p-3 flex items-center justify-between">
            <div class="flex items-center space-x-5">
                <i class="fa fa-bars text-yellow-400" role="button"></i>
                <p>Welcome, Olayinka Judes</p>
            </div>
            <div class="flex space-x-2 items-center transition hover:text-red-500 duration-500" role="button" onclick = "document.location='../logout/'">
                <i class="fa fa-power-off"></i>
                <p>Logout</p>
            </div>
        </div>

        <!-- options -->
        <div class="w-100 bg-white rounded-lg mt-10 p-5 py-6 flex justify-center items-center space-y-5 md:space-y-0 md:space-x-10 md:flex-row flex-col">
            <div class="flex items-center justify-center text-white font-medium bg-red-500 p-12 rounded-lg" role="button" onclick="document.location='reg_student.php'">
                <p>Register Student</p>
            </div>
            <div class="flex items-center justify-center text-white font-medium bg-purple-500 p-12 rounded-lg" role="button" onclick="document.location='reg_teacher.php'">
                <p>Register Teacher</p>
            </div>
            <div class="flex items-center justify-center text-white font-medium bg-green-500 p-12 rounded-lg" role="button">
                <p>Edit Teacher Roles</p>
            </div>
            <div class="flex items-center justify-center text-white font-medium bg-blue-500 p-12 rounded-lg" role="button">
                <p>Edit Calendar</p>
            </div>
        </div>
        <!-- <div class="rounded-lg shadow-xl bg-yellow-400 h-40 w-80 text-center flex justify-center items-center flex-col transition hover:bg-blue-400 duration-500" style="cursor:pointer;" onclick="document.location = '../classes/createclass.php'"> 
            <p class="text-white text-xl">Create a Class</p>
            <i class="fa fa-plus-circle text-white"></i>
        </div> -->
    </div>
    <script src="js/custom.js"></script>
</body>
</html>
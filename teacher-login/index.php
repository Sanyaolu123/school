<?php 
session_start();
if(!isset($_SESSION["t_id"])){
    header("Location: ../auth-teachers/");
    exit();
}
if(isset($_SESSION["t_true"])){
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
    <title>Join Class</title>
    <link rel="stylesheet" href="../plugins/tailwind/tailwind.css">
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.css">
</head>
<body class="h-screen flex justify-center items-center bg-gray-200">
    <div class="wrappertr bg-white shadow-xl p-5 rounded" style="width:300px;">
        <div class="header text-center font-bold text-yellow-400">Join Class</div>

        <form action="" class="flex flex-col space-y-4 my-4" method="post">

            <div>
            <input type='text' name='reg_no' class='outline-none border-b-2 transition focus:border-yellow-400 p-2' style='width:100%' placeholder='Reg_no'/>
            </div>

            <div>
            <input type="password" name="password" class="outline-none border-b-2 border-gray-200 transition focus:border-yellow-500 p-2" style="width:100%" placeholder="Enter Class Password">
            </div>
            <a class="my-1 block w-100 text-center text-blue-500" href="../dashboard/">Go back to dashboard</a>
            <p class="text-center text-red-500 font-bold">***Note if you login the time starts and when it is over, all session expires!***</p>
            <button type="submit" class="bg-yellow-400 rounded text-white p-2 font-bold transition hover:bg-yellow-600 duration-500">Continue <i class="fa fa-arrow-right transition hover:ml-5 duration-500"></i></button>
            
        </form>
    </div>

    <script src="../js/t_rejoin.js"></script>
</body>
</html>
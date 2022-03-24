<?php 
session_start();
if(isset($_SESSION["t_true"])){
    header("Location: classes/");
    exit();
}
if(isset($_SESSION["s_true"])){
    header("Location: classes/");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body class="flex justify-center items-center h-screen" style="background-image:url('assets/images/auth/desola-lanre-ologun-zYgV-NGZtlA.jpg'); background-position:center left; background-repeat:no-repeat; background-size:cover;">
    
        <div class="wrapper_stul rounded border-2 border" style="width:300px;">
            <div class="my-2 -mx-0 text-center text-white text-2xl">Student Login</div>
            <form action="" class="flex flex-col p-2"> 
                <input type="text" name="matric_no" class="bg-gray-200 rounded p-1 m-2 border-b-2 transition focus:border-green-500 duration-500 outline-none placeholder-black" placeholder="Matric no" />
                <input type="password" name="password" class="bg-gray-200 rounded p-1 m-2 border-b-2 transition focus:border-green-500 duration-500 outline-none placeholder-black" placeholder="Password">
                <p class="mx-2 text-white">**Note your password is your surname in small letter**</p>
                <div class="text-center w-100 text-white font-bold my-2"><a href="auth-teachers/" class="hover:text-green-500 duration-500">Teacher</a> | <a href="auth_admin/" class="hover:text-green-500 duration-500">Admin</a></div>
                <button type="submit" class="bg-green-500 text-white text-xl m-2 rounded py-2">Login</button>
            </form>
        </div>


        
        <script src="js/stu_login.js"></script>
</body>
</html>
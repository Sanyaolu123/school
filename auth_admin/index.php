<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link rel="stylesheet" href="../plugins/tailwind/tailwind.min.css">
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.css">
    
</head>
<body class="flex justify-center items-center h-screen" style="background-image:url('../assets/images/auth/desola-lanre-ologun-zYgV-NGZtlA.jpg'); background-position:center left; background-repeat:no-repeat; background-size:cover;">
    
        <div class="wrapperadm rounded border-2 border" style="width:300px;">
            <div class="my-2 -mx-0 text-center text-white text-2xl">Admin Login</div>
            <form action="" method="post" class="flex flex-col p-2"> 
                <input type="text" name="username" class="bg-gray-200 rounded p-1 m-2 border-b-2 transition focus:border-green-500 duration-500 outline-none placeholder-black" placeholder="Username" />
                <input type="password" name="password" class="bg-gray-200 rounded p-1 m-2 border-b-2 transition focus:border-green-500 duration-500 outline-none placeholder-black" placeholder="Password">
                <div class="text-center w-100 text-white font-bold my-5"><a href="../" class="hover:text-green-500 duration-500">Student</a> | <a href="../auth-teachers/" class="hover:text-green-500 duration-500">Teacher</a></div>
                <button type="submit" class="bg-green-500 text-white text-xl m-2 rounded py-2">Login</button>
            </form>
        </div>
<script src="js/adminlogin.js"></script>
</body>
</html>
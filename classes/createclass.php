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
    <title>Create a Class</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="flex justify-center items-center h-screen bg-gray-400">
    <div class="py-3 pt-32">
    <div class="wrapperClass h-auto bg-white shadow-xl p-5 rounded-lg" style="width:300px;">
        <p class="text-center my-5">Create a Class</p>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="flex flex-col mb-2">
                <label for="class-course">Course<span class="text-red-500">*</span></label>
                <input type="text" name="course" id="class-course" class="w-100 outline-none border-b-2 border-gray-400 my-1 transition focus:border-yellow-400" placeholder="e.g science">
             </div>
            <div class="flex flex-col mb-2">
                <label for="class-topic">Topic<span class="text-red-500">*</span></label>
                <input type="text" name="topic" id="class-topic" class="w-100 outline-none border-b-2 border-gray-400 my-1 transition focus:border-yellow-400" placeholder="e.g Quantum Energy">
             </div>
             <div class="flex flex-col my-2">
                <label for="class-info">Class Info<span class="text-red-500">*</span></label>
                <textarea name="classInfo" id="class-info" cols="10" rows="10" placeholder="Put Class Information Here." class="border-yellow-400 border rounded h-20 p-1 outline-none"></textarea>
             </div>
             <div class="flex flex-col my-2">
                <label for="Streaming">Live Streaming<span class="text-red-500">*</span></label>
                <div class="flex items-center space-x-5">
                    <input type="radio" name="stream" id="yes" value="yes" checked>&nbsp;&nbsp;Yes
                    <input type="radio" name="stream" id="no" value="no">&nbsp;&nbsp;No
                </div>
             </div>
             <div class="flex flex-col my-2">
                 <label>Class Duration<span class="text-red-500">*</span></label>
                 <input type="text" name="timeDurate" class="w-100 outline-none border-b-2 border-gray-400 my-1 transition focus:border-yellow-400">
                 <div class="flex items-center space-x-5">
                     <input type="radio" name="time" id="seconds" value="seconds" checked> <label for="seconds">Seconds</label>
                     <input type="radio" name="time" id="minutes" value="minutes"> <label for="minutes">Minutes</label>
                 </div>
             </div>
             <div class="flex flex-col my-2">
                <label for="Course">Upload Course Notes<span class="text-red-500">*</span></label>
                <input type="file" name="file" id="Course">
                <p class="my-1 text-red-500">***You are advised to include every information needed by students in the uploaded file!***</p>
             </div>
             <a href="../dashboard/" class="w-100 block my-1 text-center text-blue-500">Go back to dashboard</a>
             <button class="my-2 w-100 text-center p-3 bg-yellow-400 rounded-lg shadow-xl hover:bg-yellow-600 transition duration-500 text-white font-bold" style="width:100%;" type="submit">CREATE <i class="fa fa-plus-circle"></i></button>
        </form>
    </div>
    </div>
    <script src="../js/createclass.js"></script>
</body>
</html>
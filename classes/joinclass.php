<?php 
session_start();
if(!isset($_SESSION["stud_id"])){
    header("Location: ../");
    exit();
}else{
    $course_ong = $_SESSION["stud_course"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Class</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="h-screen flex justify-center items-center bg-gray-200">
    <div class="wrapperjc bg-white shadow-xl p-5 rounded" style="width:300px;">
        <div class="header text-center font-bold text-yellow-400">Join Class</div>

        <form action="" class="flex flex-col space-y-4 my-4" method="post">
            <div clas="flex flex-col space-y-3">
            <select name="joinCourse" id="av-classes" style="width:100%;" class="outline-none border border-gray-500 rounded p-2">
            <option value="disabled">Available Classes</option>
                <?php 
                include_once "../oop-classes/classes.php";

                $checkclassfortheday = new StudentJoinClassCheckDepartment();

                echo $checkclassfortheday->checkActiveClassForTheDay();
                
                ?>
            </select>
            </div>

            <div>
            <input type='text' name="matric_no" class='outline-none border-b-2 transition focus:border-yellow-400 p-2' style='width:100%' placeholder='Matric_no'/>
            </div>

            <div>
            <input type="password" name="password" class="outline-none border-b-2 border-gray-200 transition focus:border-yellow-500 p-2" style="width:100%" placeholder="Enter Class Password">
            </div>

            <a href="../dashboard/" class="my-2 block text-center text-blue-500">Go back to dashboard</a>
            <button type="submit" class="bg-yellow-400 rounded text-white p-2 font-bold transition hover:bg-yellow-600 duration-500">Continue <i class="fa fa-arrow-right transition hover:ml-5 duration-500"></i></button>
            
        </form>
    </div>

    <script src="../js/auth-class.js"></script>
</body>
</html>
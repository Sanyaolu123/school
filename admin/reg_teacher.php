<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../plugins/tailwind/tailwind.css">
</head>
<body class="h-screen flex justify-center items-center bg-gray-300">
    <div class="wrapper teacher bg-white rounded-lg h-auto shadow-xl p-5" style="width:300px">
        <p class="text-center my-1">Register Teacher</p>
        <form action="" class="w-100" method="post">
            <input type="text" name="fname" placeholder="First Name" class="border-b-2 outline-none p-2 transition focus:border-yellow-400 my-2" style="width:100%;">
            <input type="text" name="mname" placeholder="Middle Name" class="border-b-2 outline-none p-2 transition focus:border-yellow-400 my-2" style="width:100%;">
            <input type="text" name="lname" placeholder="Last Name" class="border-b-2 outline-none p-2 transition focus:border-yellow-400 my-2" style="width:100%;">
            <input type="text" name="dob" placeholder="Date of Birth(m-d-y)" class="border-b-2 outline-none p-2 transition focus:border-yellow-400 my-2" style="width:100%;">
            <div class="flex space-x-5">
                <input type="radio" name="gender" value="male" checked> Male
                <input type="radio" name="gender" value="female"> Female
            </div>
            <select name="role" class="border border-gray-200 rounded p-2 my-2" style="width:100%;">
                <option value="disabled">Select Role</option>
                <option value="science">Science Teacher</option>
                <option value="commercial">Commercial Teacher</option>
                <option value="arts">Arts Teacher</option>
            </select>
            <a href="./"><p class="text-blue-500 text-center">Go back to dashboard</p></a>
            <button type="submit" class="bg-yellow-400 w-100 rounded-lg py-2 text-white font-medium transition hover:bg-yellow-500 mt-3" style="width:100%;">REGISTER</button>
        </form>
    </div>
</body>
<script src="js/reg_teacher.js"></script>
</html>
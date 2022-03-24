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
    <div class="wrapperstu bg-white rounded-lg h-auto shadow-xl p-5" style="width:300px">
        <p class="text-center my-1">Register Student</p>
        <form action="" class="w-100" method="post">
            <input type="text" name="fname" placeholder="First Name" class="border-b-2 outline-none p-2 transition focus:border-yellow-400 my-2" style="width:100%;">
            <input type="text" name="mname" placeholder="Middle Name" class="border-b-2 outline-none p-2 transition focus:border-yellow-400 my-2" style="width:100%;">
            <input type="text" name="lname" placeholder="Last Name" class="border-b-2 outline-none p-2 transition focus:border-yellow-400 my-2" style="width:100%;">
            <input type="text" name="dob" placeholder="Date of birth" class="border-b-2 outline-none p-2 transition focus:border-yellow-400 my-2" style="width:100%;">
            <select name="course" style="width:100%" class="p-2 transition rounded border-gray-300 my-2 border focus:border-yellow-400 duration-500">
                <option selected value="disabled">--Select Course--</option>
                <option value="science">Science</option>
                <option value="commercial">Commercial</option>
                <option value="arts">Arts</option>
            </select>
            
            <div>
                <label for="">Transfer Student <span class="text-red-500">*</span></label>
                <div class="flex space-x-3 items-center">
                    <input type="radio" name="transfer" id="" value="yes"> Yes
                    <input type="radio" name="transfer" id="" value="no" checked> No
                </div>
            </div>
            <div>
                <label for="">Gender <span class="text-red-500">*</span></label>
                <div class="flex space-x-3 items-center">
                    <input type="radio" name="gender" id="" value="male" checked> Male
                    <input type="radio" name="gender" id="" value="female"> Female
                </div>
            </div>
            <a href="./"><p class="text-blue-500 text-center">Go back to dashboard</p></a>
            <button type="submit" class="bg-yellow-400 w-100 rounded-lg py-2 text-white font-medium transition hover:bg-yellow-500 mt-3" style="width:100%;">REGISTER</button>
        </form>
    </div>
</body>
<script src="js/reg_student.js"></script>
</html>
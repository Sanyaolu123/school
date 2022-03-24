<div class="sidebar h-screen bg-gray-200 p-4 md:w-1/5 hidden md:block">
        <div class="sidebar-show bg-yellow-400 fixed p-3 py-4 rounded-lg" style="height:95vh; width:250px;">
            <p class="text-xl  text-center font-medium text-white">LOGO</p>

            <ul class="mt-20">
                <!-- pages -->
                <li><a href="">Dashboard</a></li>
                <li class="text-white">Pages</li>
                <li><a href=""></a></li>
                <li><a href="">Upload Students Results</a></li>
                <li><a href="">Write a Request</a></li>

            </ul>
        </div>
    </div>
    <div class="main md:w-4/5 p-4 h-screen w-100">
        <div class="w-100 bg-white p-3 flex items-center justify-between">
            <div class="flex items-center space-x-5">
                <i class="fa fa-bars text-yellow-400" role="button"></i>
                <p class="text-xs">Welcome, <?php echo $_SESSION["t_lname"]." ". $_SESSION["t_fname"] ?></p>
            </div>
            <div class="flex space-x-2 items-center transition hover:text-red-500 duration-500" role="button" onclick = "document.location='../logout/?teacher'">
                <i class="fa fa-power-off"></i>
                <p>Logout</p>
            </div>
        </div>

        <!-- options -->
        <div class="w-100 bg-white rounded-lg mt-10 p-5 py-6 flex justify-center items-center space-y-5 md:space-y-0 md:space-x-10 md:flex-row flex-col">
            <div class="flex items-center justify-center text-white font-medium bg-red-500 p-12 rounded-lg" role="button">
                <p>Take Attendance</p>
            </div>
            <div class="flex items-center justify-center text-white font-medium bg-purple-500 p-12 rounded-lg" role="button" onclick="document.location='../classes/createclass.php'">
                <p>Create a Class</p>
            </div>
            <div class="flex items-center justify-center text-white font-medium bg-green-500 p-12 rounded-lg" role="button">
                <p>Students Projects</p>
            </div>
            <div class="flex items-center justify-center text-white font-medium bg-blue-500 p-12 rounded-lg" role="button">
                <p>Letter of Complaint</p>
            </div>
        </div>

        <div class="w-100 bg-white p-5 mt-5 rounded">
            
            <p class="text-left font-bold my-3 text-yellow-400">Info <i class="fa fa-info-circle"></i></p>    
            <?php 
                
                    $sql = "SELECT * FROM classes_teachers WHERE status = 'pending' and teacher = \"$reg\"";
                    $query = mysqli_query($db, $sql);
                    if(mysqli_num_rows($query) > 0){
                        while($ochkuc = mysqli_fetch_array($query)){
                            $course = $ochkuc["course"];
                        $password = $ochkuc["password"];
                            echo "<div>The Class \"$course\" has been created. The Login Password for all participants is <span class='text-yellow-400 font-bold'>\"$password\"</span>.</div>
                    <div class=\"my-2\">Login to \"$course\" <span class=\"text-yellow-500\"><a href=\"../classes/t_class_login.php?class=$course\" class=\"hover:underline\">Here</a> </span>to activate the Class.</div>";
                        }
                    }
                    else{
                        $sql = "SELECT * FROM classes_teachers WHERE status = 'ongoing' and teacher = \"$reg\"";
                    $query = mysqli_query($db, $sql);
                    if(mysqli_num_rows($query) > 0){
                        while($ochkuc = mysqli_fetch_array($query)){
                            $course = $ochkuc["course"];
                        $password = $ochkuc["password"];
                            echo "<div>The Class \"$course\" is ongoing. The Login Password for all participants is <span class='text-yellow-400 font-bold'>\"$password\"</span>.</div>
                    <div class=\"my-2\">Log  in to \"$course\" <span class=\"text-yellow-500\"><a href=\"../teacher-login/\" class=\"hover:underline\">Here</a> </span>to join.</div>";

                    echo "<div><span class=\"underline font-bold\">Note:</span> Students can't login until you login.</div>";
                        }
                    }else{
                        echo "You have no class to attend";
                        echo "<p class=\"text-xs\">Refresh <a href=\"./\" class=\"text-yellow-500 transition hover:underline duration-500\">here <i class=\"fa fa-refresh\"></i></a></p>";
                    }
                    }
                    

            ?>
        </div>
        <p style="visibility:hidden">Lorem ipsum dolor sit amet.</p>
        <!-- <div class="rounded-lg shadow-xl bg-yellow-400 h-40 w-80 text-center flex justify-center items-center flex-col transition hover:bg-blue-400 duration-500" style="cursor:pointer;" onclick="document.location = '../classes/createclass.php'"> 
            <p class="text-white text-xl">Create a Class</p>
            <i class="fa fa-plus-circle text-white"></i>
        </div> -->
    </div>


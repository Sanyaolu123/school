<?php 
include_once "../db.php";
if(!isset($_SESSION["stud_id"])){
    header("Location: ../");
    exit();
}
$clS = $_SESSION["stud_course"];
?>

    <div class="sidebar h-screen bg-gray-200 p-4 md:block hidden w-1/5">
        <div class="sidebar-show bg-yellow-400 fixed p-3 py-4 rounded-lg" style="height:95vh; width:250px;">
            <p class="text-xl  text-center font-medium text-white">LOGO</p>

            <ul class="mt-20">
                <!-- pages -->
                <li><a href="">Dashboard</a></li>
            </ul>
        </div>
    </div>
    <div class="md:w-4/5 p-4 h-screen w-100 pb-10">
        <div class="w-100 bg-white p-3 flex items-center justify-between">
            <div class="flex items-center space-x-5">
                <i class="fa fa-bars text-yellow-400" role="button"></i>
                <p class="text-xs md:text-xl">Welcome, <?php echo ucfirst($_SESSION["stud_lname"])." ". ucfirst($_SESSION["stud_fname"]) ?></p>
            </div>
            <div class="flex space-x-2 items-center transition hover:text-red-500 duration-500" role="button" onclick = "document.location='../logout/'">
                <i class="fa fa-power-off"></i>
                <p>Logout</p>
            </div>
        </div>

        <!-- options -->
        <div class="w-100 bg-white rounded-lg mt-10 p-5 py-6 flex justify-center items-center space-y-5 md:space-y-0 md:space-x-10 md:flex-row flex-col"> 
        <div class="flex items-center justify-center text-white font-medium bg-red-500 w-auto p-12 rounded-lg" role="button">
                <p>View Results <i class="fa fa-address-book"></i></p>
            </div>
            <div class="flex items-center justify-center text-white font-medium bg-purple-500 w-auto p-12 rounded-lg" role="button" onclick="document.location='../classes/joinclass.php'">
                <p>Join a Class <i class="fa fa-group"></i></p>
            </div>
            <div class="flex items-center justify-center text-white font-medium bg-green-500 w-auto p-12 rounded-lg" role="button">
                <p>Payments <i class="fa fa-money"></i></p>
            </div>
            <div class="flex items-center justify-center text-white font-medium bg-blue-500 w-auto p-12 rounded-lg" role="button">
                <p>Make a Complaint <i class="fa fa-tablet"></i></p>
            </div>
        </div>

        <div class="w-100 bg-white p-5 mt-5 rounded-lg">
            <p class="text-left font-bold my-3 text-yellow-400">Info <i class="fa fa-info-circle"></i></p>    
            <?php 
                
                    
                        $sql = "SELECT * FROM classes WHERE status = 'ongoing' and teacher_login = 'no'";
                    $query = mysqli_query($db, $sql);
                    if(mysqli_num_rows($query) > 0){
                        if($ochkuc = mysqli_fetch_array($query)){
                            $sql = "SELECT * FROM classes_teachers where course = \"$clS\" and status = 'ongoing'";
                            $query = mysqli_query($db, $sql);

                            if($ochkucc = mysqli_fetch_assoc($query)){
                                $ochkuccP = $ochkucc["password"];
                                echo "<div>The Class \"$clS\" is ongoing but your teacher hasn't logged in yet. The Login Password for all participants is <span class='text-yellow-400 font-bold'>\"$ochkuccP\"</span>.</div>
                        <div class=\"my-2\">Wait for your teacher to login then Log  in to \"$clS\" <span class=\"text-yellow-500\"><a href=\"../classes/joinclass.php\" class=\"hover:underline\">Here</a> </span>to join.</div>";
                            }else{
                                echo "You have no class to attend!";
                            }
                            
                        }else{
                            echo "You have no class to attend!";
                            echo "<p class=\"text-xs\">Refresh <a href=\"./\" class=\"text-yellow-500 transition hover:underline duration-500\">here <i class=\"fa fa-refresh\"></i></a></p>";
                        }
                    }else{
                        $sql = "SELECT * FROM classes_teachers where course = \"$clS\" and status = 'ongoing'";
                            $query = mysqli_query($db, $sql);
                            if($row = mysqli_fetch_assoc($query)){
                                $ochkuccP = $row["password"];
                            echo "<div>The Class \"$clS\" is ongoing. The Login Password for all participants is <span class='text-yellow-400 font-bold'>\"$ochkuccP\"</span>.</div>
                            <div class=\"my-2\">Log  in to \"$clS\" <span class=\"text-yellow-500\"><a href=\"../classes/joinclass.php\" class=\"hover:underline\">Here</a> </span>to join.</div>";
                        }
                        else{
                            echo "You have no class to attend!";
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
    <?php 
            if(isset($_GET["t_handshake"])){
                echo "<script>
                    alert(\"Your teacher hasn't logged in yet!\");
                    
                    
                </script>";
            }
        ?>
